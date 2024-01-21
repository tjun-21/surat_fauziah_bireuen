<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user; 

class RegisterController extends Controller
{
    public function index()
    {
        return view ('register.index',[
            'title'=>'register',
            'active'=> 'Register'
        ]);
    }

    public function store(Request $request )
    {  
        $validateData = $request->validate([
            'nik'      => ['required'],
            'name'     => ['required'],
            'email'    => ['required','email'],
            'password'     => ['required']

        ]);

        $validateData['password'] =bcrypt($validateData['password']);

        user::create($validateData);   

        return redirect('/login')-> with('sukses', 'Registrasi Berhasil! please login'); 
       


    }

    public function pns()
    {
        return view ('register.pns',[
            'title'=>'pns',
            'active'=> 'pns'
        ]);
    }

    public function kontrak()
    {
        return view ('register.kontrak',[
            'title'=>'kontrak',
            'active'=> 'kontrak'
        ]);
    }

    public function p3k()
    {
        return view ('register.p3k',[
            'title'=>'p3k',
            'active'=> 'p3k'
        ]);
    }
}
