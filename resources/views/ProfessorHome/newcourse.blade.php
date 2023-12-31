@extends('ProfessorHome.layouts.main')
@section('main-section')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit course</title>
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

.cname{
 margin-top: 20px;
 font-size: 20px;
}

.cname input
{
 margin-top: 20px;
  font-size: medium;
  width: 200px;
  margin-left: 20px;
  height: 40px;
  border: 1px solid black;
  border-radius: 10px;
}

.cdes{
 margin-top: 20px;
 font-size: 20px;
}

.cdes textarea{
 height : 100px;
 width: 300px;
 border-radius: 10px;
 margin-left: 20px;
}


.pt{
 margin-top: 20px;
 font-size: 20px;
 display: flex;
}

.price{
 margin-top: 20px;
 font-size: 20px;
}

.price input{
 margin-top: 20px;
  font-size: medium;
  width: 100px;
  margin-left: 20px;
  height: 40px;
  border: 1px solid black;
  border-radius: 10px;
}

.time{
 margin-top: 20px;
 font-size: 20px;
 margin-left: 30px;
}

.time input{
 margin-top: 20px;
  font-size: medium;
  width: 100px;
  margin-left: 20px;
  height: 40px;
  border: 1px solid black;
  border-radius: 10px;
}

#module-container{
	 margin-top: 30px;
 font-size: 20px;
}

form button{
      font-size: 15px;
      padding: 10px 20px;
      border: none;
      border-radius: 20px;
      background: #38d39f;
      color: #fff;
      cursor: pointer;
      transition: all 0.3s ease;
		margin-top: 20px;
		margin-left: 20px;
	 }


.module-name{
	margin-top: 20px;
 font-size: 20px;

}

.module-name textarea{
	 height : 50px;
	  width: 250px;
	  border-radius: 10px;
	  margin-left: 30px;
}

.module-video{
	margin-top: 20px;
	 font-size: 20px;
}

.module-video input{
	margin-top: 20px;
	  font-size: medium;
	  margin-left: 20px;
}

.module{
	margin-top: 20px;
	 font-size: 20px;
	 height: 50px;
	}

.module input{
	margin-top: 20px;
	  font-size: medium;
	  margin-left: 20px;
	  height: 40px;
}

.pic{
  margin-top: 30px;
   font-size: 20px;
}

.pic input{
  margin-top: 20px;
    font-size: medium;
    margin-left: 20px;
}




  </style>
</head>

<body>

    <div class="main_container">
     <form action="{{ url('/') }}/prof/newcourse" method="POST" enctype="multipart/form-data">
        @csrf
        
      <div class="cname">
       Courese Name:
       <input type="text" name="COURSEname"required >
      </div>

      <div class="cdes">
       Course Description:
       <textarea name="Description_box" required >
       </textarea>
      </div>

      <div class="pt">
        <div class="price">
          Price:
          <input type="number" name ="price"required >
        </div>
        <div class="time">
          Time:
          <input type="text" name ="time" required >
        </div>
      </div>

      <!--Image-->
      <div class="pic">
        <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> Upload Image
        </label>
        <input id="file-upload" name="image" type="file" accept="image/*" required />
    </div>

		<!--Adding modules-->
		<div id="module-container">
			<h3>Modules</h3>
		</div>
		<button type="button" id="addModuleButton">Add Module</button>
		<!--End of adding modules-->

		<button type="submit">Submit</button>


     </form>

    </div><!--End of main container-->
  </div>

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
	document.addEventListener('DOMContentLoaded', function () {
		 const modulesContainer = document.getElementById('module-container');
		 const addModuleButton = document.getElementById('addModuleButton');
		 let moduleCounter = 0;

		 addModuleButton.addEventListener('click', function () {
			  addModuleField();
		 });

		 function addModuleField() {
			  const moduleDiv = document.createElement('div');
			  moduleDiv.classList.add('module');

			  // Module Name Input
			  const moduleNameInput = document.createElement('input');
			  moduleNameInput.type = 'text';
			  moduleNameInput.name = `modules[${moduleCounter}][name]`;
			  moduleNameInput.placeholder = 'Module Description';
			  moduleNameInput.required = true;

			  // Module Video Input
			  const moduleVideoInput = document.createElement('input');
			  moduleVideoInput.type = 'file';
			  moduleVideoInput.name = `modules[${moduleCounter}][video]`;
			  moduleVideoInput.accept = 'video/*';
			  moduleVideoInput.required = true;

			  // Edit and Delete Buttons
			  const editButton = document.createElement('button');
			  editButton.textContent = 'Edit';
			  editButton.addEventListener('click', function () {
					// Handle edit action here
					// You can access the module's inputs using `moduleNameInput` and `moduleVideoInput`
			  });

			  const deleteButton = document.createElement('button');
			  deleteButton.textContent = 'Delete';
			  deleteButton.addEventListener('click', function () {
					// Handle delete action here
					modulesContainer.removeChild(moduleDiv);
			  });

			  moduleDiv.appendChild(moduleNameInput);
			  moduleDiv.appendChild(moduleVideoInput);
			  moduleDiv.appendChild(editButton);
			  moduleDiv.appendChild(deleteButton);

			  modulesContainer.appendChild(moduleDiv);

			  moduleCounter++;
		 }
	});
</script>




</body>
</html>


@endsection
