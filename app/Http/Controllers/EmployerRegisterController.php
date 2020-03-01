<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Company;
use Hash;

class EmployerRegisterController extends Controller
{
    public function employerRegister(){

        $user = User::create([

            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type'=>request('user_type')

        ]);

        Company::create([

            'user_id'=>$user->id,
            'cname'=>request('cname'),
            'slug'=>Str::slug(request('cname'))

        ]);

        return redirect()->to('login')->with('message', 'Please verify your email by clicking the link sent to your email address.');

    }
}
