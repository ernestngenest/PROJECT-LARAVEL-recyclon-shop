<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function login(){
        return view('users.login');
    }
    public function create_register(Request $request){
        // dd($request->all());
        $formfields = $request->validate([
            'name' =>['required','min:3'],
            'email' =>['required',Rule::unique('users','email')],
            'password' =>['required','min:6','confirmed'],
        ]);
        $formfields['password'] = Hash::make($formfields['password']);
        // dd($formfields);
        $user = User::create($formfields);
        Auth()->login($user);
        return redirect('/');
   }
   public function logout(Request $request){
    // dd($request->all());
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
   }

    public function create_login(Request $request){
        // dd($request->all());
        $formfields = $request->validate([
            'email' =>['required','email'],
            'password' =>['required'],
        ]);
        // dd($formfields);
        if(Auth::attempt($formfields)==true){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'email'=> 'email/password tidak ditemukan'
        ])->onlyInput('email');
    }

    public function edit_profile(User $user){
        // dd($user);
        return view('users.edit_profile',compact('user'));
    }
    public function update_profile(Request $request,User $user){
        $formfields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],Rule::unique('users','email'),
        ]);
        $data_user = User::find($user->id);
        $data_user->name = $formfields['name'];
        $data_user->email = $formfields['email'];
        $data_user->save();
        return redirect('/');
    }

    public function edit_password(User $user){
        return view ('users.change_password',['user' => $user]);
    }

    public function update_password(Request $request,User $user){
        $formfields= $request->validate([
            'old_password' => ['required'],
            'password' =>['required','min:6','confirmed'],
        ]);
        // dd(auth()->user());
        if (Hash::check($request->old_password,auth()->user()->password)){
            $data = User::find(auth()->user()->id);
            $formfields['password'] = Hash::make($formfields['password']);
            $data->password = $formfields['password'];
            $data->save();
            return redirect('/');
        }
        throw ValidationException::withMessages([
            'old_password'=>'password does not match with our record'
        ]);
    }
}
