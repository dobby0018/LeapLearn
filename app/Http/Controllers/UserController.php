<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function validation(Request $request)
    {
        $request->validate(
            ['userType'=>'required',
            'username'=>'required',
            'password'=>'required']
        );
        //  print_r($request->all());
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
            'email' => 'required|email|unique:users,email',
            'username' => 'required|alpha_num|unique:users,username',
            'password' => 'required|min:8|confirmed', ]
        );
        session([
            'username' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],

        ]);
        // $user=new users;
        // $user->first_name=$request['firstname'];
        // $user->last_name=$request['lastname'];
        // $user->email=$request['email'];
        // $user->username=$request['username'];
        // $user->password=$request['password'];
        // $user->save();
        //   $maildata=[
        //     'title'=>'hcbshbcb',
        //     'body'=>'vehbgfeb'
        // ];
        // $email=$request['email'];
        // Mail::to($email)->send(new ContactMail($maildata));
        // print_r($request->all());
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
        return redirect('auth.otp');
    }
    public function otp_verify(Request $request){
        $number=$request['k1']*100000+$request['k2']*10000+$request['k3']*1000+$request['k4']*100+$request['k5']*10+$request['k6'];
        $otp=session('otp');
        // print_r($number);
        if($number==$otp)
        { $user=new users;
         $user->first_name=$request['firstname'];
         $user->last_name=$request['lastname'];
         $user->email=$request['email'];
         $user->username=$request['username'];
         $user->password=$request['password'];
        $user->save();
            return redirect('login')->with('success','New User Account created');}

        else
        return back()->with('error', 'Invalid OTP. Please try again.');



    }
}
