<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class RolController extends BaseController
{
    public function index(): string
    {
        return view(name: 'index');
    }

}
