<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
    public function Login()
    {
        return 123;
    }

    public function search($user_id){
        return "你輸入值:$user_id";
    }
    public function SignUp()
    {
        $binding= [
            'title' => '註冊',
            'note' => '使用者註冊葉面'
        ]; 
        return view('auth.signup', $binding);
    }

}

