<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view(name: 'custom_view');
    }

    public function getUsers(): string
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->findAll();
        return view(name: 'user_list' data: ['users'=> $users]);
    }
}
