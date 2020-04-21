<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\House;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public  function  showformlogin(){
        return view('welcome');
    }
    public function login(Request $request)
    {
//        dd($request->all());
        $rules = [
            'email' =>'required',
            'password'=>'required'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

//        dd(Auth::attempt(['email' => $request['email'], 'password' =>$request['password']]));
//        dd($validator);
//        --------------------------------------------------------
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
//                dd(Auth::id());
               LoginHistory::insert(['id_user'=>Auth::id(),'log_time'=>date("Y/m/d h:i:s"),'device_login'=>$request->input('mac')]);
                if(Auth::check()==true){
//                    dd('đã đên đây');
                    return redirect()->route('list_home');
                }else{
//                    dd('đã đên đây rùi');
                    return redirect()->back();
                }
            } else {
//                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->with('errorlogin','Lỗi đăng nhập. Vui lòng thử lại');
//                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
    public function logout(){
        Auth::logout();
        return view('welcome');
    }

}
