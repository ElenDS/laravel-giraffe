<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassResetRequest;
use App\Http\Requests\SendEmailRequest;
use App\Jobs\SendEmailJob;
use App\Models\Reset;
use App\Models\User;

class PasswordResetController
{
    public function userEmail()
    {
        return view('pages.send-email');
    }

    public function sendResetLinkEmail(SendEmailRequest $request)
    {
        $uniqId = uniqid('reset-password/');
        $user = User::where(['email' => $request->input('email')])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email address not found']);
        }

        $reset = new Reset();
        $reset->email = $request->input('email');
        $reset->uniqid = $uniqId;
        $reset->save();

        $link = 'http://' . $request->getHttpHost() . '/' . $request->input('email') . '/' . $uniqId;
        SendEmailJob::dispatch($link, $request->input('email'));

        return redirect('/')->with('message', 'We have emailed your password reset link!');
    }

    public function newPassword(string $email, string $uniqid)
    {
        $reset = Reset::where([
            'uniqid' => 'reset-password/' . $uniqid,
            'email' => $email
        ])->first();
        if (!$reset) {
            return redirect('/')->with('message', 'Invalid link!');
        }

        return view('pages.reset-password', ['email' => $email]);
    }

    public function resetPassword(PassResetRequest $request)
    {
        $user = User::where(['email' => $request->input('email')])->first();
        $user->password = $request->input('password');
        $user->save();

        $reset = Reset::where(['email' => $request->email])->first();
        $reset->delete();

        return redirect('/')->with('message', 'Please login with a new password');
    }
}
