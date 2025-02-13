<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Hash;
use App\Shop\Entity\User;

class UserAuthController extends Controller
{
   
    public function signupPage()
    {
        $binding= [
            'title' => '註冊',
            'note' => '使用者註冊葉面'
        ]; 
        return view('auth.signup', $binding);
    }
    public function SignUpProcess()
    {
        $input = request()->all();
        print_r($input);

        if ($input['nickname'] == '') {
            print('暱稱不得為空');
            return redirect('/user/auth/signup')
                ->withErrors(['暱稱不得為空', '重新輸入'])
                ->withInput();
        }  else if ($input['password'] == '') {
            print('密碼不得為空');
            return redirect('/user/auth/signup')
                ->withErrors(['密碼不得為空', '請重新輸入'])
                ->withInput();
        } else {
            $input['password'] = Hash::make($input['password']);
            print_r($input);
            User::create($input);
        }
    }

}

