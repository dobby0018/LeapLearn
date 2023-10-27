<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function contact()
    // {
    //     $maildata=[
    //         'title'=>'hcbshbcb',
    //         'body'=>'vehbgfeb'
    //     ];
    //     Mail::to('lotlikarabhinav@gmail.com')->send(new ContactMail($maildata));

    // }
    public function finance()
    {
        return view('homepage.finance');
    }
    public function Home()
    {
        $courses=courses::where('Price',0)->get();
        // echo"<pre>";
        // print_r($courses->toArray());
        // echo"</pre>";
        foreach ($courses as $course) {
            $Course[] = [
                'title' => $course['Course_name'],
                'description' => $course['Course_desc'],
                'level' => $course['Level'],
                'imageUrl' => $course['Image'],
                'price'=>$course['Price'],
                'url' => route('indicourse', ['id' => $course['Course_id']]),
            ];

    }
    return view('homepage.home',['course' => $Course]);
    }



    public function homee()
    {
        if (session()->has('userdata'))
        {
            print_r("yesss");
        }
        else{
            print_r("noo");

        }
    }
    public function logout()
{
    // Perform logout actions

    // Regenerate the session ID to end the current session

    session()->flush();

    return redirect('login'); // Redirect the user to the login page
}
}
