<?php

namespace App\Http\Controllers;
use App\Models\modules;
use App\Models\courses;
use App\Models\purchased;


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
        elseif($coursetype=='purchased')
        {
            $courseIds = purchased::where('User_id', session('userdata.userid'))->pluck('Course_id')->toArray();
            $purchaseIds = purchased::where('User_id', session('userdata.userid'))->pluck('Purchase_no')->toArray();
// Convert to indexed array

            $courses = courses::whereIn('Course_id', $courseIds)->get();
            foreach ($courses as $course)
            {
                $Course[] = [
                    'id'=>$course['Course_id'],
                    'title' => $course['Course_name'],
                    'description' => $course['Course_desc'],
                    'level' => $course['Level'],
                    'imageUrl' => $course['Image'],
                    'price'=>$course['Price'],
                    'url' => route('purcourse', ['name' => $course['Course_id']]),

                ];
            //  echo"<pre>";print_r($courses);echo"</pre>";
        }
        return view('homepage.allcourse',['course' => $Course,'name'=>'Purchased']);
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
                'id'=>$course->Course_id,
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
                public function purchase(Request $request)
                {
                    // $courseId = $request->input('course_id');
                    // $data=courses::where('Course_id',$courseId)->get();
                    // // echo"<pre>";print_r($data);echo"</pre>";
                    // $newData = new purchased();
                    // $newData->Course_id = $courseId;
                    // $newData->User_id= session('userdata.userid');
                    // $newData->Course_name= $data['Course_name'];
                    // $newData->save();
                    $courseId = $request->input('course_id');
            $data = courses::where('Course_id', $courseId)->first(); // Use 'first' instead of 'get' to get a single model

            if ($data) {
                $newData = new purchased();
                $newData->Course_id = $courseId;
                $newData->User_id = session('userdata.userid');
                $newData->Course_name = $data->Course_name; // Access 'Course_name' attribute directly
                $newData->save();
                return redirect('home');
            }
                }

            public function particularcourse(Request $request)
            {
                $course = courses::with('Modules')->where('Course_id', $request->name)->first();
        $data = [
                'courseId' => 1,
                'id'=>$course->Course_id,
                'title' => $course->Course_name,
                'description' => $course->Course_desc,
                'level'=>$course->Level,
                'imageUrl'=>$course->Image,
                'price' => $course->Price,
                'time'=>"2sws",
                'modules' => $course->Modules->map(function ($module) {
                    return [
                        'title' => "Module $module->Module_no",
                        'description' => $module->Module_desc,
                        'videoUrl'=> "hell.mp4"
                        // Add more module attributes here if needed
                    ];
                }),
            ];
            // echo "<pre>";
            // print_r(($data));
            // echo "</pre>";
             return view('homepage.afterpurchase',['course' => $data]);
            }
}
