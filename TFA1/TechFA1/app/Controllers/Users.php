<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin', 'full_name' => 'Alex Dela Cruz', 'role' => 'Administrator'],
            ['username' => 'manager01', 'full_name' => 'Bianca Flores', 'role' => 'Manager'],
            ['username' => 'cashier01', 'full_name' => 'Carlo Ramos', 'role' => 'Cashier'],
            ['username' => 'cashier02', 'full_name' => 'Diana Lim', 'role' => 'Cashier'],
            ['username' => 'stock01', 'full_name' => 'Enzo Navarro', 'role' => 'Inventory Clerk'],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $users,
        ]);
    }
}
