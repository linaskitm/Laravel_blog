<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function users(){
        $students = [
            'Linas',
            'Lukas',
            'Urte'
        ];
        return view('users', compact('students'));
    }
}
