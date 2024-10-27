<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function index($values = null)
    {
        $params['title'] = 'Error';
        $this->render('error/error404', $params, 'error');
    }
}
