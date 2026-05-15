<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function createUser(Request $request){

        try{
            $validated =$request->validate([
                'first_name'=>'required|max:100',
                'last_name'=>'required|max:100',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);

            return redirect()->route('register')->with('success','User Created Successfully'); 
        }catch (Exception $e) {

            Log::error('User creation failed', [
                'message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->with('error', 'Something went wrong, Please try again');
        }
    }

    
    public function loginUser(Request $request){
        
    }
}
