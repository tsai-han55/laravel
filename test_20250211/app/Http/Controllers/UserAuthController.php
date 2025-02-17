<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Hash;
use App\Shop\Entity\User;
use Illuminate\Support\Facades\Mail;

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
         } else if (User::where('email', $input['email'])->count() > 0) {
                    return redirect('/user/auth/signup')
                        ->withErrors(['帳號已經被註冊', '請重新輸入'])
                        ->withInput();  
        } else {
            $input['password'] = Hash::make($input['password']);
            print_r($input);
            User::create($input);

            Mail::send('email.signup', 
                        ['nickname' => $input['nickname']], 
                        function($message) use ($input) {
                      $message->to($input['email'], $input['nickname'])
                      ->from('aoao00005@gmail.com')
                      ->subject('恭喜恭喜恭喜恭喜');
                    }
                );

            print('over');
                
        }
        
    }
    public function SignInPage()
    {
        $binding = [
            'title' => '登入',
            'note' => '使用者登入頁面'
        ];
        return view('auth.signin', $binding);
    }
    public function SignInProcess()
    {
        $input = request()->all();
        print_r($input);
        //  將登入邏輯寫進去
        // 1. 判斷資料庫裏面有沒有該帳號
        // 2. 若有該帳號則判斷密碼加密後是否一致
    }

}

