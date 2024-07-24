<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    function index()
    {

        // $user = new User();
        // $user->name = "abc3";
        // $user->email = "abc3@mail.com";
        // $user->password = "abc3";
        // $user->save();

        $user = User::create([
            "name" => "abc6 efg bnm",
            "email" => "abc11@mail.com",
            "password" => "abc6"
        ]);

        dd($user,$user->name);

        dd(User::all());
    }
}
