<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $username = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $this->userService->register($username,$email,$password);
        return redirect('/login')->with('success','Account Registered');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($this->userService->login($email,$password)) {
            return redirect()->intended('/products');
        }
        return back()->with('error','Email / Password is incorrect');
       
    }

    public function profile()
    {
        $userId = $this->userService->profile();
        return view('profile.index',[
            'profile'=>User::find($userId),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/login');
    }

    public function edit(User $user)
    {
        return view('profile.edit',[
            'data' => $user
        ]);
    }

    public function update(User $user,Request $request)
    {
        $userId =$user->id;
        $name = $request->name;
        $email = $request->email;
     
        $this->userService->profileEdit($userId,$name,$email);
        return redirect('/profile');
        
    }
}
