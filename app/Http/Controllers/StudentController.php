<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function index()
    {
        return view('Student/addStudent');
    }

    public function login()
    {
        return view('Student/loginStudents');
    }




}
