<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company; 


class CompanyController extends Controller
{
    public function index($id, Company $name){

        return view('company.index', compact('name'));

    }
}
