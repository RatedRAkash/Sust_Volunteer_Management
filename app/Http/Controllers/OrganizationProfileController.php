<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Organization;
use App\User;

class OrganizationProfileController extends Controller
{

    public function store()
    {
        $user= User::create([
            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);
        
        Organization::create([
            'user_id'=>$user->id,
            'o_name'=> request('name')
        ]);
        //return $user;
        return redirect()->to('home');
    }
    
}
