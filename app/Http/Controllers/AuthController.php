<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPUnit\Event\Test\Failed;

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
    // Remove try-catch temporarily to see real error
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if(Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('home')->with('success','Login Successfull');
    };
    
    return redirect()->back()->with('error','Invalid Email or Password');
}

    public function logoutUser(){
        Auth::logout();

        return redirect()->route('user-login')->with('success','Logged out Successfully');
    }
}
