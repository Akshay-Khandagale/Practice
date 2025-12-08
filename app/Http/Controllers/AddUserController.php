<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class AddUserController extends Controller
{
    //
    public function addUser()
    {
        return view('AddUser');
    }


    public function userReport()
    {
        return view('UserReport');   // No need to pass data
    }

    public function getData()
    {
        $users = Client::select(['id','name','email','role'])->get();
        return response()->json([
            'data' => $users
        ]);
    }
}