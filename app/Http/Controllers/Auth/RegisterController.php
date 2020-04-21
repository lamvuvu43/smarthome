<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
//        dd($request->all());
        $rules = [
            'username_register' => 'required|max:30', //unique:tenbang,tencot
            'email_register' => 'required|unique:users,email|max:60',
            'phone_register' => 'required|unique:users,sdt|max:12',
            'address_register' => 'required|max:60',
            'pass_register' => 'required|min:8',
        ];
        $messages = [
            'username_register.required' => 'Họ tên không được trống',
            'email.unique' => 'Email đã tồn tại',
            'username_register.max' => 'Độ dài tối đa là 255',
            'email_register.required' => 'Email không được rỗng',
            'email_register.max' => 'Độ dài tối đa là 255',
            'email_register.unique' => 'Email đã tồn tại',
            'phone_register.required' => 'Vui lòng nhập số điện thoại',
            'phone_register.unique' => 'Số điện thoại đã tồn tại',
            'address_register.required' => 'Địa chỉ không được trống',
            'pass_register.required' => 'Vui lòng nhập mật khẩu',
            'pass_register.min' => 'Mật khẩu có độ dài tối thiệu 8 kí tự',
        ];
//        $this->validate($request,$rules,$messages);
        return Validator::make($request, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $request
     * @return \App\User
     */
    public function create(Request $request)
    {
//        dd($request->all());
        $rules = [
            'username_register' => 'required|max:30', //unique:tenbang,tencot
            'email_register' => 'required|unique:users,email|max:60',
            'phone_register' => 'required|unique:users,phone|max:10',
            'address_register' => 'required|max:60',
            'pass_register' => 'required|min:8',
        ];
        $messages = [
            'email.unique' => 'Email đã tồn tại',
            'username_register.max' => 'Độ dài tối đa là 255',
            'email_register.required' => 'Email không được rỗng',
            'email_register.max' => 'Độ dài tối đa là 255',
            'email_register.unique' => 'Email đã tồn tại',
            'phone_register.required' => 'Vui lòng nhập số điện thoại',
            'phone_register.unique' => 'Số điện thoại đã tồn tại',
            'address_register.required' => 'Địa chỉ không được trống',
            'pass_register.required' => 'Vui lòng nhập mật khẩu',
            'pass_register.min' => 'Mật khẩu có độ dài tối thiệu 8 kí tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
//            dd($request->all());
            User::insert([
                'email' => $request['email_register'],
                'password' => bcrypt($request['pass_register']),
                'phone' => $request['phone_register'],
                'full_name' => $request['username_register'],
                'address' => $request['address_register']
            ]);
//            Auth::attempt(['email' => $request->input('email_register'), 'password' => $request->input('pass_register')]);
            return redirect()->back()->with('register_successful', 'Bạn đã đăng kí thành công');
        }

    }

}
