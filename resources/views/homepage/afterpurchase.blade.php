@extends('homepage.layouts.main')

@section('main-section')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Course Page before enroll</title>
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
      height: 150px;
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


}
    .con2 {
      display: flex;
      margin-left: 330px;
    }

    .course_time {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .course_enroll button {
      margin-left: 400px;
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
    }



    .course_content {
      border: #000000 1px solid;
      width: 60%;
      height: 100%;
      font-size: 10px;
      color: #000000;
		transform: translate(250px , 10px);
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

	 .table-of-contents {
    margin-top: 20px;
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
        <div class="course_enroll" id="course_enroll">
          <!-- Enrollment button -->
        </div>
      </div>

      <div class="course_content" id="course_content">
			<h2>Table Of contents</h2>
        <div id="module_list" class="table-of-contents">
        </div>
      </div>
    </div>
  </div>



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
  //on button show price of course
  document.getElementById("course_enroll").innerHTML = `<button>Enrolled</button>`;
  document.getElementById("course_enroll").onclick = function() {
    alert("Button Clicked!");
    // Add your custom actions here
  };

  //module list
  const moduleList = document.getElementById("module_list");
  moduleList.innerHTML = '';

  const moduleDivs = []; //to store all the module divs


  // Added all the modules to the module list using loop
  course.modules.forEach((module , index) => {
    const moduleDiv = document.createElement("div");
    moduleDiv.classList.add("module");
    moduleDiv.innerHTML = `<p><strong>Module ${index + 1}:</strong> ${module.description}</p>`; // Title : Description

    
    //create a box for video
    if (module.videoUrl) {
      const videoDiv = document.createElement("div");
      videoDiv.innerHTML = `<iframe src="{{ asset('${module.videoUrl}') }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
      videoDiv.style.display = "none";
      moduleDiv.appendChild(videoDiv);
      moduleDiv.videoDiv = videoDiv; // Attach videoDiv to the moduleDiv
    }

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

  </script>
  <script>

  </script>
</body>
</html>
@endsection
