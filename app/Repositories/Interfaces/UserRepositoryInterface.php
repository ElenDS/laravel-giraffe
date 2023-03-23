<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function createUser($data);
    public function findUser($id);

    public function updateUser($data);
}
