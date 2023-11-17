@extends('ProfessorHome.layouts.main')

@section('main-section')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Course Edit</title>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap');

* {
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
 }

body {
  font-family: 'Montserrat', sans-serif;
  font-size: 16px;
  line-height: 1.5;
  color: #333;
  }

.wrapper {
   margin: 10px;
   }

    .wrapper .top_navbar {
      width: calc(100% - 20px);
      height: 60px;
      display: flex;
      position: fixed;
      top: 10px;
    }

    .wrapper .top_navbar .indiv {
      width: 200px;
      height: 100%;
      background: #38d39f;
      padding: 11px 9px;
      border-top-left-radius: 20px;
      cursor: pointer;
      border-right: 130px solid #38d39f;
      transition: all 0.5s ease;
    }

    .wrapper.collapse .indiv {
      border-right: 131px solid #ffffff;
      transition: all 0.5s ease;
    }

    .wrapper .top_navbar .indiv div {
      width: 35px;
      height: 4px;
      margin: 5px 0;
      border-radius: 5px;
      background: #38d39f;
    }

    .wrapper .top_navbar .top_menu {
      width: calc(100% - 70px);
      height: 100%;
      background: #fff;
      border-top-right-radius: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-left: 130px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    .wrapper .top_navbar .top_menu {
      color: #38d39f;
      font-size: 20px;
      font-weight: 700;
      letter-spacing: 3px;
    }

    .sidebar-collapse {
      background-color: #000000;
    }

    .logo {
      width: 60px;
      height: 50px;
      overflow: hidden;
    }

    .wrapper .top_navbar .top_menu ul {
      display: flex;
    }

    .wrapper .top_navbar .top_menu ul li a {
      display: block;
      margin: 0 10px;
      width: 35px;
      height: 35px;
      line-height: 35px;
      text-align: center;
      border: 1px solid #38d39f;
      border-radius: 50%;
      color: #38d39f;
    }

    .wrapper .top_navbar .top_menu ul li a:hover {
      background: #38d39f;
      color: #fff;
    }

    .wrapper .top_navbar .top_menu ul li a:hover i {
      color: #fff;
    }

    .wrapper .sidebar {
      position: fixed;
      top: 70px;
      left: 10px;
      background: #38d39f;
      width: 200px;
      height: calc(100% - 80px);
      border-bottom-left-radius: 20px;
      transition: all 0.3s ease;
    }

    .wrapper .sidebar ul li a {
      display: block;
      padding: 20px;
      color: #fff;
      position: relative;
      margin-bottom: 1px;
      color: #2a2828;
      white-space: nowrap;
    }

    .settings {
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    .wrapper .sidebar ul li a:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 3px;
      height: 100%;
      background: #2a2828;
      display: none;
    }

    .wrapper .sidebar ul li a span.icon {
      margin-right: 10px;
      display: inline-block;
    }

    .wrapper .sidebar ul li a span.title {
      display: inline-block;
    }

    .wrapper .sidebar ul li a:hover,
    .wrapper .sidebar ul li a.active {
      background: #38d39f;
      color: #fff;
    }

    .wrapper .sidebar ul li a:hover:before,
    .wrapper .sidebar ul li a.active:before {
      display: block;
    }

    .wrapper .main_container {
      width: calc(100% - 200px);
      margin-top: 70px;
      margin-left: 200px;
      padding: 15px;
      padding-bottom: 70px;
      transition: all 0.3s ease;
    }

    .wrapper .main_container .item {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    .wrapper.collapse .sidebar {
      width: 70px;
    }

    .wrapper.collapse .sidebar ul li a {
      text-align: center;
    }

    .wrapper.collapse .sidebar ul li a span.icon {
      margin: 0;
    }

    .wrapper.collapse .sidebar ul li a span.title {
      display: none;
    }

    .wrapper.collapse .main_container {
      margin-left: 200px;
    }

    .search {
      position: relative;
      height: 40px;
      width: calc(100% - 240px);
      margin-left: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search input {
      height: 100%;
      width: calc(100% - 40px);
      border: 1px solid #38d39f;
      border-radius: 20px;
      padding: 0 40px 0 20px;
      outline: none;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .search i {
      position: absolute;
      right: 30px;
      color: #999;
      transition: all 0.3s ease;
    }

    .wrapper .top_navbar .top_menu ul li a i {
      font-size: 18px;
      margin-right: 0;
    }

    footer {
      display: flex;
      justify-content: space-around;
      padding: 20px;
      background-color: #38d39f;
      color: #fff;
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 80px;
      text-align: left;
      margin-left: 200px;
      margin-bottom: 10px;
    }

    footer .box {
      flex: 1;
    }

    footer .box h3 {
      margin-bottom: 10px;
    }

    footer .box a {
      color: #000000;
      text-decoration: none;
      display: block;
      margin-bottom: 5px;
    }

    footer .box a:hover {
      text-decoration: underline;
    }

    .main_container {
      margin-bottom: 80px;
    }

    .course_name {
      font-size: 30px;
      font-weight: 700;
      margin: 20px 0;
      text-align: center;
    }

    .con {
      display: flex;
      flex-wrap: wrap;
      align-items:flex-start;
    }

    .course_image {
    width: 300px;
    height: 170px;
    background-size: cover;
    background-position: center;
    margin: 0; /* Updated this line */
}

.course_description {
  font-size: 16px;
  margin-bottom: 20px;
  margin-left: 40px;
  width: calc(100% - 300px);
  font-size: 20px;
  text-align: justify;
  flex: 1;
  overflow-y: auto;
  max-height: 300px;
}

.con2 {
      display: flex;
      margin-left: 330px;
      margin-top: 20px;
      margin-bottom: 10px;
    }

.course_time {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 20px;
  margin-right: 170px;
}

.course_level {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 20px;
  margin-right: 80px;
}

/* .course_enroll button {
  margin-bottom: 20px;
  font-size: 20px;
  font-weight: 700;
  padding: 10px 20px;
  border: none;
  border-radius: 20px;
  background: #38d39f;
  color: #fff;
  cursor: pointer;
  transition: all 0.3s ease;
} */

.course_enroll {
  margin-right: 40x;
}

.del{
  margin-left: 20px;
}

    .module {
      border: #000000 1px solid;
      width: 100%;
      height: 100%;
      font-size: 10px;
      color: #000000;
    }

    .module h3 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
      margin-left: 40px;
    }

    .module p {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
      margin-left: 40px;
      overflow: hidden;
      text-overflow: ellipsis;
     white-space: nowrap;
    }

    .module iframe {
      margin-left: 40px;
      height: 50%;
      width: 40%;
      margin-bottom: 10px;
    }

  .module button{
    margin-left: 40px;
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    border-radius: 20px;
    background: #38d39f;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
  }
    .table-of-contents {
  margin-top: 20px;
  width: 100%;
}


  .table-of-contents h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
    margin-left: 40px;
  }

  .table-of-contents ul {
    list-style-type: none;
  }

  .table-of-contents li {
    margin-left: 40px;
    margin-bottom: 10px;
  }

  .table-of-contents li:before {
    margin-right: 10px;
    color: #38d39f;
    font-size: 20px;
  }

  .table-of-contents p {
    font-size: 18px;
    font-weight: 400;
    margin-left: 20px;
  }

  .modal{
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 0px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb
}
.course_content {
  border: #000000 1px solid;
  width: 60%;
  font-size: 10px;
  color: #000000;
  transform: translate(250px, 10px);
  padding: 10px;
}

    .module {
      border: #000000 1px solid;
      width: 100%;
      height: 100%;
      font-size: 10px;
      color: #000000;
    }

    .module h3 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
      margin-left: 40px;
    }

    .module p {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
      margin-left: 40px;
      overflow: hidden;
      text-overflow: ellipsis;
     white-space: nowrap;
    }

    .module iframe {
      margin-left: 40px;
      height: 50%;
      width: 40%;
      margin-bottom: 10px;
    }

	.module button{
		margin-left: 40px;
		margin-bottom: 10px;
		padding: 10px;
		border: none;
		border-radius: 20px;
		background: #38d39f;
		color: #fff;
		cursor: pointer;
		transition: all 0.3s ease;
	}
    .table-of-contents {
  margin-top: 20px;
  width: 100%;
}


  .table-of-contents h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
    margin-left: 40px;
  }

  .table-of-contents ul {
    list-style-type: none;
  }

  .table-of-contents li {
    margin-left: 40px;
    margin-bottom: 10px;
  }

  .table-of-contents li:before {
    margin-right: 10px;
    color: #38d39f;
    font-size: 20px;
  }

  .table-of-contents p {
    font-size: 18px;
    font-weight: 400;
    margin-left: 20px;
  }

  .modal{
	  display: none;
	  position: fixed;
	  z-index: 1;
	  padding-top: 0px;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  overflow: auto;
	  background-color: rgb(0,0,0);
	  background-color: rgba(0,0,0,0.4);

  }

  .modal-content{
	  background-color: #fefefe;
	  margin: 5% auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 80%;
	  max-width: 600px;
  }

  .close{
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
  }

  form{
	  display: flex;
	  flex-direction: column;
  }

  label{
	  margin-top: 10px;
  }

  input, textarea, select{
	  margin-bottom: 10px;
	  height: 30px;
  }

  button[type="submit"]{
	  margin-top: 10px;
  }

  .modal button{
	  margin-top: 10px;
	  padding: 10px;
	  border: none;
	  border-radius: 20px;
	  background: #38d39f;
	  color: #fff;
	  cursor: pointer;
	  transition: all 0.3s ease;
  }

  .moduleModal{
	  display: none;
	  position: fixed;
	  z-index: 1;
	  padding-top: 0px;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  overflow: auto;
	  background-color: rgb(0,0,0);
	  background-color: rgba(0,0,0,0.4);
  }

.main_container button{
	margin-top: 10px;
	padding: 10px;
	border: none;
	border-radius: 20px;
	background: #38d39f;
	color: #fff;
	cursor: pointer;
	transition: all 0.3s ease;

}

.btn{
	margin-left: 900px;
	margin-top: 20px;
	margin-bottom: 10px;
	align-items: end;
}


  </style>
</head>

<body>

    <div class="main_container">
      <div class="course_name" id="course_name"></div>
      <div class="con">
        <div class="course_image" id="course_image">
          <!-- Course image -->
        </div>
        <div class="course_description" id="course_description"></div>
      </div>
      <div class="con2">
        <div class="course_time" id="course_time"></div>
		<div class="course_level" id="course_level"></div>
        <div class="course_enroll" id="course_enroll">
          <!-- Edit course button -->
		  <button id="editButton">Edit</button>
        </div>
        <form method="POST" action="{{ route('courses.destroy', ['id' => $course['id']]) }}">
        @csrf
        @method('DELETE')
        <div class="del">
            <!-- Delete course button -->
            <button id="DeleteButton">Delete Course</button>
          </div>
        </form>
      </div>

      <div class="course_content" id="course_content">
			<h2>Table Of contents</h2>
        <div id="module_list" class="table-of-contents">
        </div>
      </div>

	  <div class="btn">
		<button id="openModalBtn">Add new Module</button>
		<button>Submit Changes</button>
	  </div>
    </div>
  </div>

  <div id="courseModal" class="modal">
	<form id="courseForm" class="modal-content" enctype="multipart/form-data" action="{{ route('description', ['name' => $course['id']]) }}" method="POST">
        @csrf
		<span class="close" id="closeCourseModalBtn">&times;</span>
		<label for="courseName">Course Name:</label>
		<input type="text" id="courseName" name="courseName" required>
		<label for="courseDescription">Course Description:</label>
		<textarea id="courseDescription" name="courseDescription" required></textarea>

		<label for="courseImage">Course Image (attach file):</label>
		<input type="file" id="courseImage" name="courseImage" accept="image/*" >

		<label for="price">Price:</label>
		<input type="number" id="price" name="price" required>

		<label for="time">Time</label>
		<input type="text" id="time" name="time" required>

		<label for="level">Level:</label>
		<select id="level" name="level" required>
			<option value="Beginner">Beginner</option>
			<option value="Intermediate">Intermediate</option>
			<option value="Advanced">Advanced</option>
		</select>
		<!-- Other course fields here -->
		<button type="submit">Submit Course</button>
	</form>
</div><!--end of course model-->
<div id="moduleModal" class="modal">
	<div class="modal-content">
		<span class="close" id="closeModuleModalBtn">&times;</span>
		<form id="moduleForm" enctype="multipart/form-data" method="post" action="{{ route('newmodule', ['name' => $course['id']]) }}">
            @csrf
			<label for="moduleName">Module Description</label>
			<input type="text" id="moduleName" name="moduleName" >
			<label for="moduleVideo">Module Video (attach video file):</label>
			<input type="file" id="moduleVideo" name="moduleVideo" accept="video/*" >

			<button type="submit">Submit Module</button>
		</form>
	</div>
</div>
<!-- Modal for Module 1 -->
<div id="moduleModal1" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn1">&times;</span>
        <form id="moduleForm1" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => '1']) }}">
            @csrf
            <label for="moduleName1">Module Description</label>
            <input type="text" id="moduleName1" name="moduleName" >
            <label for="moduleVideo1">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo1" name="moduleVideo" accept="video/*" >
            <label for="deleteModule1">Delete Module</label>
            <input type="checkbox" id="deleteModule1" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 2 -->
  <div id="moduleModal2" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn2">&times;</span>
        <form id="moduleForm2" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => '2']) }}">
            @csrf
            <label for="moduleName2">Module Description</label>
            <input type="text" id="moduleName2" name="moduleName">
            <label for="moduleVideo2">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo2" name="moduleVideo" accept="video/*" >
            <label for="deleteModule2">Delete Module</label>
            <input type="checkbox" id="deleteModule2" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Repeat for Modules 3 to 15 -->
<!-- Modal for Module 3 -->
<div id="moduleModal3" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn3">&times;</span>
        <form id="moduleForm3" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 3]) }}">
            @csrf
            <label for="moduleName3">Module Description</label>
            <input type="text" id="moduleName3" name="moduleName" >
            <label for="moduleVideo3">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo3" name="moduleVideo" accept="video/*">
            <label for="deleteModule3">Delete Module</label>
            <input type="checkbox" id="deleteModule3" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 4 -->
  <div id="moduleModal4" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn4">&times;</span>
        <form id="moduleForm4" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 4]) }}">
            @csrf
            <label for="moduleName4">Module Description</label>
            <input type="text" id="moduleName4" name="moduleName" >
            <label for="moduleVideo4">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo4" name="moduleVideo" accept="video/*" >
            <label for="deleteModule4">Delete Module</label>
            <input type="checkbox" id="deleteModule4" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Repeat for Modules 5 to 15 -->
<!-- Modal for Module 5 -->
<div id="moduleModal5" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn5">&times;</span>
        <form id="moduleForm5" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => '5']) }}">
            @csrf
            <label for="moduleName5">Module Description</label>
            <input type="text" id="moduleName5" name="moduleName" >
            <label for="moduleVideo5">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo5" name="moduleVideo" accept="video/*">
            <label for="deleteModule5">Delete Module</label>
            <input type="checkbox" id="deleteModule5" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 6 -->
  <div id="moduleModal6" class="modal">
    <div class "modal-content">
        <span class="close" id="closeModuleModalBtn6">&times;</span>
        <form id="moduleForm6" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => '6']) }}">
            @csrf
            <label for="moduleName6">Module Description</label>
            <input type="text" id="moduleName6" name="moduleName" >
            <label for="moduleVideo6">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo6" name="moduleVideo" accept="video/*" >
            <label for="deleteModule6">Delete Module</label>
            <input type="checkbox" id="deleteModule6" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 7 -->
  <div id="moduleModal7" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn7">&times;</span>
        <form id="moduleForm7" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 7]) }}">
            @csrf
            <label for="moduleName7">Module Description</label>
            <input type="text" id="moduleName7" name="moduleName" >
            <label for="moduleVideo7">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo7" name="moduleVideo" accept="video/*" >
            <label for="deleteModule7">Delete Module</label>
            <input type="checkbox" id="deleteModule7" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 8 -->
  <div id="moduleModal8" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn8">&times;</span>
        <form id="moduleForm8" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 8]) }}">
            @csrf
            <label for="moduleName8">Module Description</label>
            <input type="text" id="moduleName8" name="moduleName" >
            <label for="moduleVideo8">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo8" name="moduleVideo" accept="video/*" >
            <label for="deleteModule8">Delete Module</label>
            <input type="checkbox" id="deleteModule8" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 9 -->
  <div id="moduleModal9" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn9">&times;</span>
        <form id="moduleForm9" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 9]) }}">
            @csrf
            <label for="moduleName9">Module Description</label>
            <input type="text" id="moduleName9" name="moduleName">
            <label for="moduleVideo9">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo9" name="moduleVideo" accept="video/*" >
            <label for="deleteModule9">Delete Module</label>
            <input type="checkbox" id="deleteModule9" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 10 -->
  <div id="moduleModal10" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn10">&times;</span>
        <form id="moduleForm10" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 10]) }}">
            @csrf
            <label for="moduleName10">Module Description</label>
            <input type="text" id="moduleName10" name="moduleName">
            <label for="moduleVideo10">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo10" name="moduleVideo" accept="video/*">
            <label for="deleteModule10">Delete Module</label>
            <input type="checkbox" id="deleteModule10" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 11 -->
  <div id="moduleModal11" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn11">&times;</span>
        <form id="moduleForm11" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 11]) }}">
            @csrf
            <label for="moduleName11">Module Description</label>
            <input type="text" id="moduleName11" name="moduleName">
            <label for="moduleVideo11">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo11" name="moduleVideo" accept="video/*" >
            <label for="deleteModule11">Delete Module</label>
            <input type="checkbox" id="deleteModule11" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 12 -->
  <div id="moduleModal12" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn12">&times;</span>
        <form id="moduleForm12" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 12]) }}">
            @csrf
            <label for="moduleName12">Module Description</label>
            <input type="text" id="moduleName12" name="moduleName" >
            <label for="moduleVideo12">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo12" name="moduleVideo" accept="video/*">
            <label for="deleteModule12">Delete Module</label>
            <input type="checkbox" id="deleteModule12" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 13 -->
  <div id="moduleModal13" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn13">&times;</span>
        <form id="moduleForm13" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 13]) }}">
            @csrf
            <label for="moduleName13">Module Description</label>
            <input type="text" id="moduleName13" name="moduleName">
            <label for="moduleVideo13">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo13" name="moduleVideo" accept="video/*">
            <label for="deleteModule13">Delete Module</label>
            <input type="checkbox" id="deleteModule13" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 14 -->
  <div id="moduleModal14" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn14">&times;</span>
        <form id="moduleForm14" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => '14']) }}">
            @csrf
            <label for="moduleName14">Module Description</label>
            <input type="text" id="moduleName14" name="moduleName" >
            <label for="moduleVideo14">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo14" name="moduleVideo" accept="video/*" >
            <label for="deleteModule14">Delete Module</label>
            <input type="checkbox" id="deleteModule14" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>

  <!-- Modal for Module 15 -->
  <div id="moduleModal15" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModuleModalBtn15">&times;</span>
        <form id="moduleForm15" enctype="multipart/form-data" method="post" action="{{ route('module', ['name' => $course['id'], 'id' => 15]) }}">
            @csrf
            <label for="moduleName15">Module Description</label>
            <input type="text" id="moduleName15" name="moduleName" >
            <label for="moduleVideo15">Module Video (attach video file):</label>
            <input type="file" id="moduleVideo15" name="moduleVideo" accept="video/*" >
            <label for="deleteModule15">Delete Module</label>
            <input type="checkbox" id="deleteModule15" name="deleteModule">
            <button type="submit">Submit Module</button>
        </form>
    </div>
  </div>


<!--end if module model-->


  <footer>
    <div class="box">
      <h3>Quick Links</h3>
      <a href="#">About Us</a>
      <br>
      <a href="#">Contact Us</a>
    </div>
    <div class="box">
      <h3>Follow Us</h3>
      <a href="#">LinkedIn</a>
    </div>
  </footer>

  <script>
    // Course data
    const courses = [<?php echo json_encode($course); ?>];


const courseId = 1; // Adjust this based on the course you want to display

const course = courses.find(course => course.courseId === courseId);
if (course) {
//course deatils like name, description, time, price, etc
  document.getElementById("course_name").innerText = course.title;
  document.querySelector(".course_image").style.backgroundImage = `url({{ asset('${course.imageUrl}') }})`;
  document.getElementById("course_description").innerText = course.description;
  document.getElementById("course_time").innerText = `Time: ${course.time}`;
  document.getElementById("course_level").innerText = `Level: ${course.level}`;




  //module list
  const moduleList = document.getElementById("module_list");
moduleList.innerHTML = '';

const moduleDivs = []; // to store all the module divs

// Iterate through the modules
course.modules.forEach((module, index) => {
    const moduleDiv = document.createElement("div");
    moduleDiv.classList.add("module");
    moduleDiv.innerHTML = `<p><strong>Module ${index + 1}:</strong> ${module.description}</p>`; // Title : Description




    //create a box for video
    if (module.videoUrl) {
      const videoDiv = document.createElement("div");
      videoDiv.innerHTML = `<iframe src="{{ asset('${module.videoUrl}') }}" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
      videoDiv.style.display = "none";
      moduleDiv.appendChild(videoDiv);
      moduleDiv.videoDiv = videoDiv; // Attach videoDiv to the moduleDiv
    }

	//button
	const button = document.createElement("button");
    button.innerText = "Edit Module";

    // Create a unique modal ID for each module
    const modalId = `moduleModal${index + 1}`;

    button.addEventListener("click", () => {
        const moduleModal = document.getElementById(modalId);
        moduleModal.style.display = "block";
    });

    moduleDiv.appendChild(button);


    // When a module is clicked, hide all other video blocks and show the clicked module's video
    moduleDiv.addEventListener("click", () => {
      moduleDivs.forEach((div) => {
        if (div !== moduleDiv) {
          div.videoDiv.style.display = "none";
        }
      });

      const videoDiv = moduleDiv.videoDiv;
      if (videoDiv.style.display === "none") {
        videoDiv.style.display = "block";
      } else {
        videoDiv.style.display = "none";
      }
    });

    moduleDivs.push(moduleDiv);
    moduleList.appendChild(moduleDiv);
  });
}

const editButton = document.getElementById("editButton");
const modal = document.getElementById("courseModal");
const closeBtn = document.querySelector(".close");

editButton.addEventListener("click", () => {
	  modal.style.display = "block";
      courseName.value = course.title;
      courseDescription.value=course.description;
      price.value=course.price;
      time.value=course.time;
      level.value=course.level;


});

closeBtn.addEventListener("click", () => {
	  modal.style.display = "none";
});

window.addEventListener("click", (event) => {
	  if (event.target === modal) {
		    modal.style.display = "none";
	  }
});

const courseForm = document.getElementById("courseForm");
// courseForm.addEventListener("submit", (event) => {
// 	  event.preventDefault();
// 	  // Handle course form submission here, e.g., send data to a server.
// 	  modal.style.display = "none";
// });

for (let i = 1; i <= course.modules.length; i++) {
    const closeModuleModalBtn = document.getElementById(`closeModuleModalBtn${i}`);
    const moduleForm = document.getElementById(`moduleForm${i}`);

    closeModuleModalBtn.addEventListener("click", () => {
        const moduleModal = document.getElementById(`moduleModal${i}`);
        moduleModal.style.display = "none";

    });


}

// Get references to the button and modal
const openModalBtn = document.getElementById('openModalBtn');
const moduleModal = document.getElementById('moduleModal');
const closeModuleModalBtn = document.getElementById('closeModuleModalBtn');

// Function to open the modal
function openModuleModal() {
  moduleModal.style.display = 'block';
}

// Function to close the modal
function closeModuleModal() {
  moduleModal.style.display = 'none';
}

// Event listeners
openModalBtn.addEventListener('click', openModuleModal);
closeModuleModalBtn.addEventListener('click', closeModuleModal);

  </script>
</body>
</html>

@endsection
