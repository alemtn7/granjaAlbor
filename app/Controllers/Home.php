<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

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
        return view(name: 'user_list', data: ['users'=> $users]);
    }

    public function create(): RedirectResponse|string
    {
        helper(filenames: ['form']);

        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'name' => 'required|min_lenght[3]|max_lenght[100]',
                'email' => 'required|valid_email|is_unique[users.email]'
            ];

            $messages = [
                'name' => [
                    'required' => 'El campo Nombre es obligatorio.',
                    'min_lenght' => 'El Nombre debe tener al menos 3 caracteres.',
                    'max_lenght' => 'El Nombre no puede exceder los 100 caracteres.',
                ],
                'email' => [
                    'required' => 'El campo Correo Electrónico es obligatorio.',
                    'valid_email' => 'El Correo Electrónico no tiene un formato válido.',
                    'is_unique' => 'El Correo Electrónico ya está registrado.',
                ]
            ];
        
            if (!$this->validate(rules: $rules, messages: $messages)) {
                return view(name: 'create_user', data: [
                    'validation' => $this->validator,
                ]);
            } else {
                $userModel = new \App\Models\UserModel();
                $userModel ->save(row: [
                    'name' => $this->request->getPost(index: 'name'),
                    'email' => $this->request->getPost(index: 'email'),
                ]);

                return redirect()->to(uri: '/home');
            }
        }

        return view(name: 'create_user');
    }
}

