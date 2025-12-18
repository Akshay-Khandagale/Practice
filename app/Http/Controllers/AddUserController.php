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

    public function saveLink(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'role'    => 'required',
            'address' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->role = $request->role;
        $client->link = $request->address;
        $client->save();
        
    
        // Save logic here
    
        return response()->json([
            'status' => true,
            'message' => 'User added successfully'
        ]);
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