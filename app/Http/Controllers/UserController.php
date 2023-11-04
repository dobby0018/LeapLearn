<?php

namespace App\Http\Controllers;
use App\Models\users;
use App\Models\professors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function validation(Request $request)
    {
        $inputfields=$request->validate(
            ['userType'=>'required',
            'username'=>'required',
            'password'=>'required',
            ]
        );
        if ($request->userType=='Student')
        {
                    $user=users::where('username','=',$request->username)->first();
                    if($user&&$request->password==$user->password)
                        {
                            // Auth::login($user); // Log in the user
                            $data = [
                                'userid'=>$user->user_id,
                                'username' => $request->username,
                                'email' => $user->email,
                                'name' => $user->first_name,
                                'userType'=>$request->userType
                            ];
                            session(['userdata'=>$data]);
                            return redirect('home');

                        }
                    else
                        {
                            return view('auth.login')->with('error', 'invalid user details');
                        }
        }
        else
        {
                $user=professors::where('username','=',$request->username)->first();
                if($user&&$request->password==$user->password)
                {
                    $data = [
                        'userid'=>$user->Professor_id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'name' => $user->first_name,
                        'userType'=>$request->userType
                    ];
                    session(['userdata'=>$data]);// Log in the user

                    return redirect('home');
                }

                    else
                {
                    return view('auth.login')->with('error', 'invalid user details');
                }
        }



}
public function signup()
{
    return view('auth.signup');
}
    public function registration(Request $request)
    {
        $request->validate(
            ['firstname' => 'required',
            'lastname' => 'required',
                'userType'=>'required']
        );
        if($request['userType']=='Student')
        {
            $request->validate(
                [
                'email' => 'required|email|unique:users,email',
                'username' => 'required|alpha_num|unique:users,username',
                'password' => 'required|min:8|confirmed',
                ]
            );
        }
        else
        {
            $request->validate(
                [
                'email' => 'required|email|unique:professors,email',
                'username' => 'required|alpha_num|unique:professors,username',
                'password' => 'required|min:8|confirmed',
                 ]
            );
        }
        //unique:users,username
        //unique:users,email
        session([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
            'firstname' => $request['firstname'],
            'userType'=>$request['userType'],
            'lastname' => $request['lastname'],


        ]);

        return $this->sendOtpEmail();

    }


    public function otp()
    {
        return view('auth.otp');
    }
    public function sendOtpEmail()
    {
        // Generate and store OTP
        $otp = strval(random_int(100000, 999999));
        session(['otp' => $otp]);

        // Send OTP via email
        $email = session('email');
        $maildata=['otp'=>$otp,
        ];

         Mail::to($email)->send(new ContactMail($maildata));


        // Redirect to a page where the user can enter the OTP
        return redirect('otp');
    }
    public function otp_verify(Request $request){
        $number=$request['k1']*100000+$request['k2']*10000+$request['k3']*1000+$request['k4']*100+$request['k5']*10+$request['k6'];
        $otp=session('otp');
        // print_r($number);
        if($number==$otp)
        {

        if(session('userType')=='Student')
            {
                $user=new users;
                $user->first_name=session('firstname');
                $user->last_name=session('lastname');
                $user->email=session('email');
                $user->username=session('username');
                $user->password=session('password');
                $user->save();
                session()->flush();
                    return redirect('/login');
            }
        else{
            $user=new professors();

            $first_name=session('firstname');
            $last_name=session('lastname');
            $user->Professor_name=$first_name .' '. $last_name;
            $user->email=session('email');
            $user->username=session('username');
            $user->password=session('password');
            $user->save();
            session()->flush();
                return redirect('/login');
        }
    }



        else
        return back()->with('error', 'Invalid OTP. Please try again.');



    }
}
