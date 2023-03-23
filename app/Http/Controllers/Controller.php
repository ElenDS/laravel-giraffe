<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Ad;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Mail\Mail as Test;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show(): View
    {

         SendEmailJob::dispatch('dolena0308@gmail.com', '1');
        $ads = Ad::with(['user'])->get();
        return view('pages.registration');
    }
}
