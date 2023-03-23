<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Ad;
use App\Repositories\Interfaces\AdRepositoryInterface;

class AdRepository implements AdRepositoryInterface
{

    public function allAds()
    {
        return Ad::latest()->with('user')->paginate(5);
    }

    public function createAd($data)
    {
        return Ad::create($data);
    }

    public function findAd($id)
    {
        return Ad::find($id);
    }

    public function updateAd($data)
    {
        $ad = Ad::where('id', $data['id'])->first();
        $ad->title = $data['title'];
        $ad->description = $data['description'];
        $ad->save();
    }

    public function deleteAd($id)
    {
        $ad = Ad::find($id);
        $ad->delete();
    }
}
