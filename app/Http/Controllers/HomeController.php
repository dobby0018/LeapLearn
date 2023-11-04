<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\courses;
use App\Models\purchased;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function Home()
    {//homepage view of student
        if(session('userdata.userType')=='Student')
        {
        $courseIds = purchased::where('User_id', session('userdata.userid'))->pluck('Course_id')->toArray();
            $courses1=courses::whereIn('Course_group',[1,4])->get();
            if (!empty($courseIds)) {
                $courses1 = $courses1->reject(function ($course) use ($courseIds) {
                    return in_array($course->Course_id, $courseIds);
                });
            }
            foreach ($courses1 as $course) {
                $Course1[] = [
                    'title' => $course['Course_name'],
                    'description' => $course['Course_desc'],
                    'level' => $course['Level'],
                    'imageUrl' => $course['Image'],
                    'price'=>$course['Price'],
                    'url' => route('indicourse', ['id' => $course['Course_id']]),
                ];

        }

            $courses2 = courses::where('Course_group', 3)->get();
            if (!empty($courseIds)) {
                $courses2 = $courses2->reject(function ($course) use ($courseIds) {
                    return in_array($course->Course_id, $courseIds);
                });
            }
            foreach ($courses2 as $course) {
                $Course2[] = [
                    'title' => $course['Course_name'],
                    'description' => $course['Course_desc'],
                    'level' => $course['Level'],
                    'imageUrl' => $course['Image'],
                    'price'=>$course['Price'],
                    'url' => route('indicourse', ['id' => $course['Course_id']]),
                ];

        }
            $courses3=courses::where('Course_group',2)->get();
            if (!empty($courseIds)) {
                $courses3 = $courses3->reject(function ($course) use ($courseIds) {
                    return in_array($course->Course_id, $courseIds);
                });
            }
            foreach ($courses3 as $course) {
                $Course3[] = [
                    'title' => $course['Course_name'],
                    'description' => $course['Course_desc'],
                    'level' => $course['Level'],
                    'imageUrl' => $course['Image'],
                    'price'=>$course['Price'],
                    'url' => route('indicourse', ['id' => $course['Course_id']]),
                ];

        }

        $courses=courses::where('Price',0)->get();

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
    return view('StudentHome.home',['course1' => $Course1,'course2' => $Course2,'course3' => $Course3]);
    }//from here the view of professor in homepage begins
    else{

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
