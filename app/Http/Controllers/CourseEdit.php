<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\modules;
use App\Models\purchased;
use Illuminate\Support\Facades\Session;



use Illuminate\Http\Request;

class CourseEdit extends Controller
{
    public function newcourse()
    {

        return view('ProfessorHome.newcourse');
    }
    public function store(Request $request)
    {
        $course=new courses();

            $course->Course_name=$request->COURSEname;
            $course->Course_desc=$request->Description_box;
            $course->Professor_id=session('userdata.userid');
            $course->Course_group=1;
            $course->Price=$request->price;
            $course->Level='Beginner';

            $imagePath = time() . '-' . $request->name . '.' . $request->image->extension();


$destinationPath = public_path('images');
if (!file_exists($destinationPath)) {
    mkdir($destinationPath, 0755, true);
}


$request->image->move($destinationPath, $imagePath);


$course->Image = 'images/' . $imagePath;
$id=$course->Course_id;
$course->modules=count($request->modules);
$course->save();
//  dd($request->all());
$courses = courses::where('Course_name', $request->COURSEname)->first();
// dd(count($request->modules));
$count = 0;
$modules = count($request->modules);
// dd($modules);
foreach ($request->modules as $moduleData) {
    // Create a new Module instance with the data from the array
    $count++;
    $module = new modules();
    $module->Module_no = $count; // Replace 'column1' with your actual column names
    $module->Module_desc = $moduleData['name'];

    $module->Course_id=$courses->Course_id;
    $videoPath = time() . '-' . $moduleData['name'] . '.' . $moduleData['video']->extension();

//Specify the full path to the destination directory
$destinationPath = public_path('videos'); // You can change 'public' to your desired path

// Make sure the destination directory exists; if not, create it
if (!file_exists($destinationPath)) {
    mkdir($destinationPath, 0755, true);
}

// Move the uploaded video to the destination directory
$moduleData['video']->move($destinationPath, $videoPath);

// Store the video path in the database
$module->video_link = 'videos/' . $videoPath;


    // ...

    // Save the module to the database
    $module->save();
}
// courses::where('Course_id',$courses->Course_id)->update(['modules'=>$count]);


Session::flash('message', 'Course has been addedddd');
//  session()->flash('message', 'New course has been created successfully.');
//  session()->flash('alert-class', 'alert-success');
 return redirect('home');
}


    public function uuu($name)
    {

        $course = courses::with('Modules')->where('Course_id', $name)->first();
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
                        'videoUrl'=> $module->video_link
                        // Add more module attributes here if needed
                    ];
                }),
            ];
            return view('ProfessorHome.editcourse',['course' => $data]);
    }
    public function yyy($name,Request $request)
    {
        // dd($request->all(),$name);
        courses::where('Course_id',$name)->update(['Course_name' => $request->courseName,'Course_desc'=>$request->courseDescription,'price'=>$request->price,'level'=>$request->level]);
        if($request->hasFile('courseImage'))
        {
            $imagePath = time() . '-' . $request->courseName . '.' . $request->courseImage->extension();


                $destinationPath = public_path('images');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }


                $request->courseImage->move($destinationPath, $imagePath);


                $Image = 'images/' . $imagePath;
                courses::where('Course_id',$name)->update(['Image'=>$Image]);

        }
        return redirect(route('editcourse', ['name' => $name]));
    }
    public function zzz($name,$id,Request $request)
    {

        modules::where('Course_id', $name)
        ->where('Module_no', $id)
        ->update(['Module_desc' => $request->moduleName]);
        // dd($module,$name,$id);
        // $findmodule=modules::find($module->Module_no);
        // // Use first() to retrieve a single module
        //   $module->id=$module->Module_id;


                if ($request->filled('moduleName')) {
                    modules::where('Course_id', $name)
                     ->where('Module_no', $id)
                     ->update(['Module_desc' => $request->moduleName]);
                }

                if ($request->hasFile('moduleVideo')) {
                    $videoPath = time() . '-' . $request->moduleName . '.' . $request->file('moduleVideo')->extension();
                    $destinationPath = public_path('videos');

                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    $request->file('moduleVideo')->move($destinationPath, $videoPath);

                    $video_link = 'videos/' . $videoPath;

                    modules::where('Course_id', $name)
                     ->where('Module_no', $id)
                     ->update(['video_link' => $video_link]);
                }



                if ($request->input('deleteModule') === 'on') {
                    modules::where('Course_id', $name)
    ->where('Module_no', $id)
    ->delete();
    modules::where('module_no', '>', $id)
    ->decrement('module_no');
    courses::where('Course_id',$name)->decrement('modules');
                }
        //     }

            return redirect(route('editcourse', ['name' => $name]));

    }
    public function iii($name,Request $request)
    {

        $course = courses::where('Course_id', $name)->first();
        // dd($course);
        $modules=$course->modules+1;
        $course->modules=$modules;
        courses::where('Course_id',$name)->update(['modules'=>$modules]);
        $module=new modules();
        $module->Module_no=$modules;
        $module->Course_id=$name;
        $module->Module_desc=$request->moduleName;
        $videoPath = time() . '-' . $request->moduleName . '.' . $request->moduleVideo->extension();

//Specify the full path to the destination directory
$destinationPath = public_path('videos'); // You can change 'public' to your desired path

// Make sure the destination directory exists; if not, create it
if (!file_exists($destinationPath)) {
    mkdir($destinationPath, 0755, true);
}

// Move the uploaded video to the destination directory
$request->moduleVideo->move($destinationPath, $videoPath);

// Store the video path in the database
$module->video_link = 'videos/' . $videoPath;
$module->save();
return redirect(route('editcourse',['name'=>$name]));
    }
    public function destroy($id)
    {
        modules::where('Course_id',$id)->delete();
        purchased::where('Course_id',$id)->delete();
        courses::where('Course_id',$id)->delete();

        Session::flash('message', 'Course has been deleted');
 return redirect('home');
    }

    }

