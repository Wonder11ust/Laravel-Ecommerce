<?php 
namespace App\Services;

use Illuminate\Support\Facades\Request;

interface UserService{
    public function register(string $username,string $email,string $password);
    public function login(string $email,string $password);
    public function profile();
    public function profileEdit($userId,$userName,$userEmail);
}
?>