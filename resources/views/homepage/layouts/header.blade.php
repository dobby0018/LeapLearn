<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>newtest</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
  $(document).ready(function () {
    adjustLayoutOnSidebarToggle();
});

		$(document).ready(function(){
			$(".indiv").click(function(){
			   $(".wrapper").toggleClass("collapse");
      adjustLayoutOnSidebarToggle();
			});
		});

  function adjustLayoutOnSidebarToggle() {
     const isSidebarCollapsed = $('.wrapper').hasClass('collapse');

     const courseCards = document.querySelectorAll('.course-card');

     courseCards.forEach(card => {
       if (isSidebarCollapsed) {
         card.style.margin = '20px 10px 10px 20px';
         card.style.width = 'calc(30% - 10px)';
       } else {
         card.style.margin = '20px 10px 10px 20px';
          card.style.width = 'calc(30% - 2px)';
       }
     });

     const slideImages = document.querySelectorAll(".mySlides img");
      slideImages.forEach(img => {
          if (isSidebarCollapsed) {
              img.style.width = "100%";
              img.style.maxWidth = "none";
              img.style.marginLeft = "0";
          } else {
              img.style.width = "100%";
              img.style.maxWidth = "none";
              img.style.marginLeft = "0";
          }
      });


  }

 //footer
  window.addEventListener('scroll', function() {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

      document.querySelector('footer').style.display = 'flex';
    } else {

      document.querySelector('footer').style.display = 'none';
    }
  });
	</script>
 <style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap');

*{
  margin: 0;
  padding: 0;
  list-style: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;

}
body{
  background: #ffffff;
}

.mySlides{
	  display: none;
}

.mySlides img {
   position: relative;
    vertical-align: middle;
    top: 0;
    left: 0;
    height: 250px;
    width: 100%;
    max-width: none;
    margin-left: 0;
    transform: translate(0%, 0%);
}

.wrapper{
  margin: 10px;
}

.wrapper .top_navbar{
  width: calc(100% - 20px);
  height: 60px;
  display: flex;
  position: fixed;
  top: 10px;
}

.wrapper .top_navbar .indiv{
  width: 200px;
  height: 100%;
  background: #38d39f;
  padding: 11px 9px;
  border-top-left-radius: 20px;
  cursor: pointer;
  border-right: 130px solid #38d39f;
  transition: all 0.5s ease;

}

.wrapper.collapse .indiv{
  border-right: 131px solid #ffffff;
  transition: all 0.5s ease;
}

.wrapper .top_navbar .indiv div{
  width: 35px;
  height: 4px;
  margin: 5px 0;
  border-radius: 5px;
  background: #38d39f;
}

.wrapper .top_navbar .top_menu{
  width: calc(100% - 70px);
  height: 100%;
  background: #fff;
  border-top-right-radius: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-left: 130px;
  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
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

.logo{
  width: 60px;
  height: 50px;
  overflow: hidden;
}

.wrapper .top_navbar .top_menu ul{
  display: flex;
}

.wrapper .top_navbar .top_menu ul li a{
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

.wrapper .top_navbar .top_menu ul li a:hover{
  background: #38d39f;
  color: #fff;
}

.wrapper .top_navbar .top_menu ul li a:hover i{
  color: #fff;
}

.wrapper .sidebar{
  position: fixed;
  top: 70px;
  left: 10px;
  background: #38d39f;
  width: 200px;
  height: calc(100% - 80px);
  border-bottom-left-radius: 20px;
  transition: all 0.3s ease;
}

.wrapper .sidebar ul li a{
    display: block;
    padding: 20px;
    color: #fff;
    position: relative;
    margin-bottom: 1px;
    color: #2a2828;
    white-space: nowrap;
}

.settings{
  position: absolute;
  bottom: 0;
  width: 100%;
}

.wrapper .sidebar ul li a:before{
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 3px;
  height: 100%;
  background: #2a2828;
  display: none;
}

.wrapper .sidebar ul li a span.icon{
  margin-right: 10px;
  display: inline-block;
}

.wrapper .sidebar ul li a span.title{
  display: inline-block;
}

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
  background: #38d39f;
  color: #fff;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
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

.wrapper .main_container .item{
	max-width: 1000px;
	position: relative;
	margin: auto;
}

.numbertext{
	color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.dot{
	height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active{
	background-color: #000000;
}

.fade{
	animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade{
	from {opacity: .4}
  to {opacity: 1}
}

.wrapper.collapse .sidebar{
  width: 70px;
}

.wrapper.collapse .sidebar ul li a{
  text-align: center;
}

.wrapper.collapse .sidebar ul li a span.icon{
  margin: 0;
}

.wrapper.collapse .sidebar ul li a span.title{
  display: none;
}

.wrapper.collapse .main_container{
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

.course-card {
  border: 1px solid #ccc;
  padding: 20px;
  margin: 10px;
  height: 320px;
  width: calc(25% - 20px);
  box-sizing: border-box;
  transition: all 0.3s ease;
  flex: 1 1 calc(20% - 20px);
  max-width: calc(25% - 30px);
}

.course-card p{
  margin-top: 10px;

}
.wrapper.collapse .course-card {
  width: calc(25% - 10px);
}

#course-container {
  display: flex;
  flex-wrap: wrap;
  margin-top: 30px;
  margin-left: 10px;

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
    margin-left: -15px;
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

.courses{
  margin-top: 40px;
  margin-left: 10px;
}

.courses h3{
  font-size: 24px;
  margin-bottom: 10px;
}

.courses .course-card{
  display: inline-block;
  margin: 10px;
  width: calc(25% - 20px);
  box-sizing: border-box;
  transition: all 0.3s ease;
}

.wrapper.collapse .course-card {
  width: calc(25% - 10px);
}

.courses .course-card img{
  max-width: 100%;
}

.courses .course-card h3{
  font-size: 18px;
}

.courses .course-card p{
  font-size: 14px;
  max-height: 100px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.courses .course-card a{
  display: inline-block;
  padding: 10px 20px;
  background-color: #38d39f;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 10px;
  transition: background-color 0.3s ease;
}

.courses .course-card a:hover{
  background-color: #26a07b;
}

.course-card.hidden {
  display: none;
}

.see{
  display: inline-block;
  padding: 10px 20px;
  background-color: #38d39f;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 10px;
  transition: background-color 0.3s ease;
  margin-left: 20px;
}
 </style>
 <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap');

  *{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;

  }
  body{
    background: #ffffff;
  }

  .wrapper{
    margin: 10px;
  }

  .wrapper .top_navbar{
    width: calc(100% - 20px);
    height: 60px;
    display: flex;
    position: fixed;
    top: 10px;
  }

  .wrapper .top_navbar .indiv{
    width: 200px;
    height: 100%;
    background: #38d39f;
    padding: 11px 9px;
    border-top-left-radius: 20px;
    cursor: pointer;
    border-right: 130px solid #38d39f;
  }

  .wrapper.collapse .indiv{
    border-right: 131px solid #ffffff;
  }

  .wrapper .top_navbar .indiv div{
    width: 35px;
    height: 4px;
    margin: 5px 0;
    border-radius: 5px;
    background: #38d39f;
  }

  .wrapper .top_navbar .top_menu{
    width: calc(100% - 70px);
    height: 100%;
    background: #fff;
    border-top-right-radius: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 130px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
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

  .logo{
    width: 60px;
    height: 50px;
    overflow: hidden;
  }

  .wrapper .top_navbar .top_menu ul{
    display: flex;
  }

  .wrapper .top_navbar .top_menu ul li a{
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

  .wrapper .top_navbar .top_menu ul li a:hover{
    background: #38d39f;
    color: #fff;
  }

  .wrapper .top_navbar .top_menu ul li a:hover i{
    color: #fff;
  }

  .wrapper .sidebar{
    position: fixed;
    top: 70px;
    left: 10px;
    background: #38d39f;
    width: 200px;
    height: calc(100% - 80px);
    border-bottom-left-radius: 20px;
    transition: all 0.3s ease;
  }

  .wrapper .sidebar ul li a{
      display: block;
      padding: 20px;
      color: #fff;
      position: relative;
      margin-bottom: 1px;
      color: #2a2828;
      white-space: nowrap;
  }

  .settings{
    position: absolute;
    bottom: 0;
    width: 100%;
  }

  .wrapper .sidebar ul li a:before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background: #2a2828;
    display: none;
  }

  .wrapper .sidebar ul li a span.icon{
    margin-right: 10px;
    display: inline-block;
  }

  .wrapper .sidebar ul li a span.title{
    display: inline-block;
  }

  .wrapper .sidebar ul li a:hover,
  .wrapper .sidebar ul li a.active{
    background: #38d39f;
    color: #fff;
  }

  .wrapper .sidebar ul li a:hover:before,
  .wrapper .sidebar ul li a.active:before{
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

  .wrapper .main_container .item{
      max-width: 1000px;
      position: relative;
      margin: auto;
  }

  .wrapper.collapse .sidebar{
    width: 70px;
  }

  .wrapper.collapse .sidebar ul li a{
    text-align: center;
  }

  .wrapper.collapse .sidebar ul li a span.icon{
    margin: 0;
  }

  .wrapper.collapse .sidebar ul li a span.title{
    display: none;
  }

  .wrapper.collapse .main_container{
    margin-left: 200px;
  }

  .search {
    position: relative;
    height: 40px;
    width: calc(100% - 240px); /* Adjusted width */
    margin-left: 10px; /* Adjusted margin */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .search input {
    height: 100%;
    width: calc(100% - 40px); /* Adjusted width */
    border: 1px solid #38d39f;
    border-radius: 20px;
    padding: 0 40px 0 20px;
    outline: none;
    font-size: 14px;
    transition: all 0.3s ease;
  }

  .search i {
    position: absolute;
    right: 30px; /* Adjusted position */
    color: #999;
    transition: all 0.3s ease;
  }

  .wrapper .top_navbar .top_menu ul li a i {
    font-size: 18px;
    margin-right: 0;
  }

  .course-card {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 10px;
    height: 320px;
    width: calc(25% - 20px); /* Adjusted width to reduce the width */
    box-sizing: border-box;
    transition: all 0.3s ease;
    flex: 1 1 calc(20% - 20px);
    max-width: calc(25% - 30px); /* Adjusted max-width */
  }

  .course-card p{
    margin-top: 10px;

  }
  .wrapper.collapse .course-card {
    width: calc(25% - 10px);
  }

   #course-container {
        display: flex;
        flex-wrap: wrap;
        margin-top: 30px;
        margin-left: 10px;

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


  .Trending , .UserPreference , .FreeCourses {
    margin-top: 40px;
  }

  .Trending h2, .UserPreference h2 , .FreeCourses h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .Trending .course-card, .UserPreference .course-card , .FreeCourses .course-card {
    display: inline-block; /* Display cards inline */
    margin: 10px;
    width: calc(25% - 20px); /* Adjust the width to fit four cards in a row */
    box-sizing: border-box;
    transition: all 0.3s ease;
  }

  .wrapper.collapse .course-card {
    width: calc(25% - 10px);
  }

  .Trending .course-card img, .UserPreference .course-card img , .FreeCourses .course-card img{
    max-width: 100%;
  }

  .Trending .course-card h3, .UserPreference .course-card h3 , .FreeCourses .course-card h3 {
    font-size: 18px;
  }

  .Trending .course-card p, .UserPreference .course-card p , .FreeCourses .course-card p {
    font-size: 14px;
    max-height: 100px; /* Adjusted max-height for the description */
    overflow: hidden; /* Hide overflowing content */
    text-overflow: ellipsis; /* Display ellipsis for overflowed text */
    white-space: nowrap; /* Prevent wrapping of text */

  }

  .Trending .course-card a, .UserPreference .course-card a , .FreeCourses .course-card a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #38d39f;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
  }

  .Trending .course-card a:hover, .UserPreference .course-card a:hover , .FreeCourses .course-card a:hover {
    background-color: #26a07b;
  }

  .course-card.hidden {
    display: none;
  }

  .see-more-button{
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #38d39f;
    color: #fff;
    text-decoration: none;
    border: 2px solid #38d39f;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    cursor: pointer;
  }
   </style>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="indiv">
      <img src="img/Leap Learn logo.png" class="logo">

    </div>
    <div class="top_menu">

      <form class="search" method="get" action="{{ url('/') }}/cours/search" >
        @csrf
       <input type="text" placeholder="Search.." name ="query" value="{{ old('query') }}" >
       <i class="fas fa-search"></i>
     </form>

      <ul>
        <li><a href="#">
          <i class="fas fa-envelope"></i>
          </a></li>
        <li><a href="#">
          <i class="fas fa-user"></i>
          </a></li>
      </ul>
    </div>
  </div>

  <div class="sidebar">
      <ul>
        <li><a href="{{ url('/') }}/home">
          <span class="icon"><i class="fas fa-user"></i></span>
          <span class="title">Home</span></a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-lock"></i></span>
          <span class="title">Transections</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">My courses</span>
          </a></li>
    </ul>
    <ul class="settings">
        <li><a href="#">
          <span class="icon"><i class="fas fa-cog"></i></span>
          <span class="title">Settings</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-info-circle"></i></span>
          <span class="title">Help</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">Sign out</span>
          </a></li>
    </ul>
  </div>


{{-- <footer>
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
  </footer> --}}

</body>
</html>
