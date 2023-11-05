<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\modules;



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

            $course->Course_name=$request->name;
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

//  dd($request->all());
$count = 0;
$modules = $request->modules;
// dd($modules);
foreach ($modules as $moduleData) {
    // Create a new Module instance with the data from the array
    $count++;
    $module = new modules();
    $module->Module_no = $count; // Replace 'column1' with your actual column names
    $module->Module_desc = $moduleData['name'];

    $module->Course_id=33;
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
$course->modules=$count;
$course->save();
session()->flash('message', 'New course has been created successfully.');
session()->flash('alert-class', 'alert-success');
return redirect('home');
    }
}
