<?php 
namespace App\Services\Implementation;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserServiceImpl implements UserService
{
    
    public function register(string $username, string $email, string $password)
    {
       $hashedPassword = Hash::make($password);
        $user = User::create([
            'name'=>$username,
            'email'=>$email,
            'password'=> $hashedPassword
        ]);
        return $user;
    }

    public function login(string $email,string $password)
    {
      $credentials = Request::only('email','password');

      if(Auth::attempt(['email'=>$email,'password'=>$password]))
      {
        Request::session()->regenerate();
        return true;
      }
      return false;
    }

    public function profile()
    {
      $user = Auth::user()->id;
      return $user;
    }

    public function profileEdit($userId,$userName,$userEmail)
    {
      $user = User::find($userId);;
   
  
     $user->update([
      'name' => $userName,
      'email'=>$userEmail,
    
    ]);

      return $user;
   

      
    }
}
?>