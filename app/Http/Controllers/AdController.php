<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Repositories\Interfaces\AdRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdController extends Controller
{
    public function __construct(readonly private AdRepositoryInterface $adRepository)
    {
    }

    public function show(): View
    {
        $ads = $this->adRepository->allAds();

        return view('pages.index', ['ads' => $ads]);
    }

    public function newAd(): View
    {
        return view('pages.create-ad');
    }

    public function create(AdRequest $request): RedirectResponse
    {
        $adData = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->user()->id,
        ];
        $this->adRepository->createAd($adData);

        return redirect('/')->with('message', 'Advertisement Created Successfully');
    }

    public function editAd(Ad $ad): View
    {
        return view('pages.update-ad', ['ad' => $ad]);
    }

    public function update(AdRequest $request): RedirectResponse
    {
        $adData = [
            'id' => $request->input('id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->user()->id,
        ];
        $this->adRepository->updateAd($adData);

        return redirect('/' . $request->input('id'))->with('message', 'Advertisement Updated Successfully');
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(Ad $ad): RedirectResponse
    {
        $this->authorize('delete', $ad);
        $this->adRepository->deleteAd($ad->id);

        return redirect('/')->with('message', 'Advertisement Deleted Successfully');
    }

    public function pageAd(Ad $ad): View
    {
        return view('pages.advt', ['ad' => $ad]);
    }

}
