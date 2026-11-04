<?php

namespace App\Http\Services;

use App\Models\User;

class SiteService
{
    public function index(): string
    {
        return 'Hell yeah!';
    }

    public function registerUser(array $data): User
    {
        return User::create($data);
    }
}
