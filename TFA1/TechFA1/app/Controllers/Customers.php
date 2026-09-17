<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Ana Reyes', 'email' => 'ana.reyes@example.com', 'phone' => '0917-123-4501'],
            ['full_name' => 'Ben Santos', 'email' => 'ben.santos@example.com', 'phone' => '0917-123-4502'],
            ['full_name' => 'Carla Mendoza', 'email' => 'carla.mendoza@example.com', 'phone' => '0917-123-4503'],
            ['full_name' => 'Diego Cruz', 'email' => 'diego.cruz@example.com', 'phone' => '0917-123-4504'],
            ['full_name' => 'Ella Garcia', 'email' => 'ella.garcia@example.com', 'phone' => '0917-123-4505'],
        ];

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $customers,
        ]);
    }
}
