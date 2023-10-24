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
        if ($request->userType=='Student'){
        $user=users::where('username','=',$request->username)->first();
        if($user&&$request->password==$user->password){
            Auth::login($user); // Log in the user
            return redirect('home');

        }else
        {
            return "userdoesnt easit";
        }}
        else{
            $user=professors::where('username','=',$request->username)->first();
        if($user&&$request->password==$user->password){
            Auth::login($user); // Log in the user

            return redirect('home');
        }

            else
        {
            return "userdoesnt easit";
        }
        }
        //  print_r($request->all());
    //     $credentials = $request->validate([
    //         'userType' => 'required',
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $userType = $credentials['userType'];
    //     $modelname=['users','professors'];
    //     if($userType=='Student')
    //     {
    //         $usernameField=$modelname[0] .'username';
    //         $usernameField=$modelname[0] .'password';
    //     }
    //     else{
    //         $usernameField=$modelname[1] .'username';
    //         $usernameField=$modelname[1] .'password';
    //     }

    //     if (Auth::attempt([
    //         $usernameField => $credentials['username'],
    //         'password' => $credentials['password'],
    //     ])) {
    //         // Authentication passed, check the user's role and redirect accordingly
    //         $user = Auth::user();
    //         if ( $userType === 'Student') {
    //             return redirect()->view('stud');
    //         } elseif ( $userType === 'teacher') {
    //             return redirect()->view('prof');
    //         }
    // }  return back()->withErrors(['login' => 'Invalid credentials']);
//     if ($inputfields['userType']=='Student'){
//     if (auth()->attempt(['username' => $inputfields['username'], 'password' => $inputfields['password'],])) {
//         // User is logged in
//         // You can add your logic for user login here
//         return view('stud'); // Redirect to the user dashboard, for example
//     }
//     else{
//         return back()->withErrors(['login' => 'invalid usertabel']);
//     }
// }else{
//     if (auth()->attempt(['username' => $inputfields['username'], 'password' => $inputfields['password']])) {
//         // Admin is logged in
//         // You can add your logic for admin login here
//         return view('prof'); // Redirect to the admin dashboard, for example
//     }
//     else{
//         return back()->withErrors(['login' => 'invalid profffftable']);
//     }
// }
// 'password' => $inputfields['password']

//             return back()->withErrors(['login' => 'outsidedee']);

    // if (auth()->attempt(['username' => $inputfields['username'],'password' => $inputfields['password'] ])) {
    //     // Student is logged in
    //     return view('stud');
    // } else {
    //     print_r($inputfields['username']);
    //     return back()->withErrors(['login' => 'Invalid student credentials']);
    // }



}
    public function signup()
    {
        return view('auth.signup');
    }
    public function registration(Request $request)
    {
        $incoming_fields=$request->validate(
            ['firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|alpha_num|unique:users,username',
            'password' => 'required|min:8|confirmed', ]
        );
        session([
            'username' => $request['username'],
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
        return redirect('otp');
    }
    public function otp_verify(Request $request){
        $number=$request['k1']*100000+$request['k2']*10000+$request['k3']*1000+$request['k4']*100+$request['k5']*10+$request['k6'];
        $otp=session('otp');
        // print_r($number);
        if($number==$otp)
        { $user=new users;
         $user->first_name=session('firstname');
         $user->last_name=session('lastname');
         $user->email=session('email');
         $user->username=session('username');
         $user->password=session('password');
        $user->save();
        session()->flush();
            return view('auth.login')->with('success','New User Account created');}

        else
        return back()->with('error', 'Invalid OTP. Please try again.');



    }
}
