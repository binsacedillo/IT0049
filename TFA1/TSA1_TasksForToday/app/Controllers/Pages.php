<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $today = date('Y-m-d');
        $tasks = (new TaskModel())->forDate($today);

        return view('welcome', [
            'pageTitle' => 'Welcome',
            'today'     => $today,
            'tasks'     => $tasks,
            'summary'   => [
                'total'     => count($tasks),
                'pending'   => count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'pending')),
                'completed' => count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'completed')),
            ],
        ]);
    }

    public function about(): string
    {
        return view('about', ['pageTitle' => 'About']);
    }
}
