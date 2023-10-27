<?php

namespace App\Http\Controllers;
use App\Models\modules;
use App\Models\courses;

use Illuminate\Http\Request;


class CourseController extends Controller
{
    // public function finance()
    // {
    //     $courses=courses::where('Course_group',3)->get();
    //     foreach ($courses as $course) {
    //         $Course[] = [
    //             'title' => $course['Course_name'],
    //             'description' => $course['Course_desc'],
    //             'level' => $course['Level'],
    //             'imageUrl' => $course['Image'],
    //             'price'=>$course['Price']
    //         ];
    // }
    // return view('homepage.finance',['course' => $Course]);
    // }
    // public function development()
    // {
    //     $courses=courses::whereIn('Course_group',[1,4])->get();
    //     foreach ($courses as $course) {
    //         $Course[] = [
    //             'title' => $course['Course_name'],
    //             'description' => $course['Course_desc'],
    //             'level' => $course['Level'],
    //             'imageUrl' => $course['Image'],
    //             'price'=>$course['Price']
    //         ];
    // }
    // return view('homepage.development',['course' => $Course]);
    // }
    // public function literature()
    // {
    //     $courses=courses::where('Course_group',2)->get();
    //     foreach ($courses as $course) {
    //         $Course[] = [
    //             'title' => $course['Course_name'],
    //             'description' => $course['Course_desc'],
    //             'level' => $course['Level'],
    //             'imageUrl' => $course['Image'],
    //             'price'=>$course['Price']
    //         ];
    // }
    // return view('homepage.literature',['course' => $Course]);
    // }
    public function coursetype($coursetype)
    {
        if ($coursetype=='finance')
        {
            $courses=courses::where('Course_group',3)->get();
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
    return view('homepage.allcourse',['course' => $Course,'name'=>'Finance']);
        }elseif($coursetype=='development')
        {
            $courses=courses::whereIn('Course_group',[1,4])->get();
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
        return view('homepage.allcourse',['course' => $Course,'name'=>'Development']);
        }
        elseif($coursetype=='literature')
        {
            $courses=courses::where('Course_group',2)->get();
        foreach ($courses as $course) {
            $Course[] = [
                'id'=>$course['Course_id'],
                'title' => $course['Course_name'],
                'description' => $course['Course_desc'],
                'level' => $course['Level'],
                'imageUrl' => $course['Image'],
                'price'=>$course['Price'],
                'url' => route('indicourse', ['id' => $course['Course_id']]),

            ];
    }
    return view('homepage.allcourse',['course' => $Course,'name'=>'Literature']);
        }
        else
        {
            return redirect('home');
        }

    }
    public function course($id)
    {


        $course = courses::with('Modules')->where('Course_id', $id)->first();
        $data = [
                'courseId' => 1,
                'title' => $course->Course_name,
                'description' => $course->Course_desc,
                'level'=>$course->Level,
                'price' => $course->Price,
                'time'=>"2sws",
                'modules' => $course->Modules->map(function ($module) {
                    return [
                        'title' => "Module $module->Module_no",
                        'description' => $module->Module_desc,
                        // Add more module attributes here if needed
                    ];
                }),
            ];
            // echo "<pre>";
            // print_r(($data));
            // echo "</pre>";
             return view('homepage.beforePurchase',['course' => $data]);
    }

    public function search(Request $request)
    {
        
        $Course=[];
        $searchquery = $request->input('query');

        $results = courses::where('Course_name', 'LIKE', '%'.$searchquery.'%')->get();
        // $results = courses::all();
        foreach ($results as $course) {
            $Course[] = [
                'id'=>$course['Course_id'],
                'title' => $course['Course_name'],
                'description' => $course['Course_desc'],
                'level' => $course['Level'],
                'imageUrl' => $course['Image'],
                'price'=>$course['Price'],
                'url' => route('indicourse', ['id' => $course['Course_id']]),

            ];

    }
    return view('homepage.search',['course' => $Course,'name'=>'Search Result']);
}
}
