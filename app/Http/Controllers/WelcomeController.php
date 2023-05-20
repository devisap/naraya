<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function VKaryawan()
    {
        $data = [
        	'title'  => 'Employee Data - AK Global',
        	'navbar'  => 'Employee Data'
        ];
        return view('admin/VKaryawan', $data);
    }

    public function VGaji()
    {
        $data = [
        	'title'  => 'Salary Data - AK Global',
        	'navbar'  => 'Salary Data'
        ];
        return view('admin/VGaji', $data);
    }
    
    public function VLogin()
    {
        $data = [
        	'title'  => 'Login - AK Global'
        ];
        return view('admin/VLogin', $data);
    }
}
