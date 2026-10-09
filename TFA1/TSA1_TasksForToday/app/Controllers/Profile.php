<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index(): string
    {
        return view('profile', [
            'pageTitle' => 'Profile',
            'user'      => (new UserModel())->first(),
        ]);
    }
}
