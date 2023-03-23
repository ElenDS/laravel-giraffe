<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface AdRepositoryInterface
{
    public function allAds();

    public function createAd($data);

    public function findAd($id);

    public function updateAd($data);

    public function deleteAd($id);
}
