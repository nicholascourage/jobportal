<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company; 


class CompanyController extends Controller
{
    public function index($id, Company $company){

        return view('company.index', compact('company'));

    }

    public function create(){

        return view('company.create');

    }

    public function store(Request $request){

        /*$this->validate($request, [

            'address'=>'required',
            'bio'=>'required|min:20',
            'experience'=>'required|min:20',
            'phone_number'=>'required|min:10|numeric'

        ]);*/

        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([

            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description')

        ]);

        return redirect()->back()->with('message', 'Company Profile Successfully Updated.');


    }

    public function coverPhoto(Request $request){

        $user_id = auth()->user()->id;
        
        if($request->hasfile('cover_photo')){

            $file = $request->file('cover_photo');

            $ext = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ext;

            $file->move('uploads/coverphoto/', $filename);

            Company::where('user_id', $user_id)->update([

                'cover_photo'=>$filename

            ]);

            return redirect()->back()->with('message', 'Cover Photo Successfully Updated.');

        }



    }
}