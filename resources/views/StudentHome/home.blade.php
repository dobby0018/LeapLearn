{{-- {{ auth()->user()->userType }}
@if (Auth::check())
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endif --}}
@extends('StudentHome.layouts.main')

@section('main-section')
    <div class="main_container">
        <div class="item">

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="" alt="img1">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="img_mountains_wide.jpg" alt="img2">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="img_snow_wide.jpg" alt="img3">
            </div>


        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <!--i want to display any 4 courses under section , no sorting required-->

        <div class="courses">
            <h3>Development Courses</h3>
            <div class="course-container" id="course-container-1"></div>
            <a href="{{ url('/') }}/development" type="button" class="see"> See More</a>
        </div>

        <div class="courses">
            <h3>Finance Courses</h3>
            <div class="course-container" id="course-container-2"></div>
            <a href="{{ url('/') }}/finance" type="button" class="see"> See More</a>
        </div>

        <div class="courses">
            <h3>Literature</h3>
            <div class="course-container" id="course-container-3"></div>
            <a href="{{ url('/') }}/literature" type="button" class="see"> See More</a>
        </div>
        <script>
            //upper slider
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds

            }


            //course-card
            // const courses = [
            // {
            //   title: "Course 1",
            //   description: "Description for Course 1 jdc ffv sxfkc ksfckm",
            //   level: "Intermediate",
            //   imageUrl: "c1.png",
            //   popular: 'true'
            // },
            // {
            //   title: "Course 2",
            //   description: "Description for Course 2",
            //   level: "Beginner",
            //   imageUrl: "c2.png",
            //   popular: 'true'
            // },
            // {
            //   title: "Course 3",
            //   description: "Description for Course 2",
            //   level: "Beginner",
            //   imageUrl: "c1.png",
            //   popular: 'true'
            // },
            // {
            //   title: "Course 4",
            //   description: "Description for Course 2",
            //   level: "Beginner",
            //   imageUrl: "c1.png",
            //   popular: 'true'
            // }

            // ];
            //     @php
            //     $courses = [
            //     [
            //         'title' => "Course 1",
            //         'description' => "Description for Course 1 jdc ffv sxfkc ksfckm",
            //         'level' => "Intermediate",
            //         'imageUrl' => "c1.png",
            //         'popular' => true
            //     ],
            //     [
            //         'title' => "Course 2",
            //         'description' => "Description for Cofiwejfiowfjiurse 2",
            //         'level' => "Beginner",
            //         'imageUrl' => "c2.png",
            //         'popular' => true
            //     ],
            //     [
            //         'title' => "Course 3",
            //         'description' => "Description for Course 2",
            //         'level' => "Beginner",
            //         'imageUrl' => "c1.png",
            //         'popular' => true
            //     ],
            //     [
            //         'title' => "Course 4",
            //         'description' => "Description for Course 2",
            //         'level' => "Beginner",
            //         'imageUrl' => "c1.png",
            //         'popular' => true
            //     ]
            // ];

            // Create a single array containing both arrays




            function createCourseCard(course) {
                const card = document.createElement('div');
                card.classList.add('course-card');
                card.innerHTML = `
      <img src="${course.imageUrl}" alt="${course.title}" style="width: 100%; ">
      <h3>${course.title}</h3>
      <p>${course.description}</p>
      <p>Level: ${course.level}</p>
      <p>Price: ${course.price}</p>
      <a href="{{ '${course.url} ' }}">View Course</a>
    `;
                return card;
            }

            const courseToShow_1 = <?php echo json_encode($course1); ?>.slice(0, 4);
            const courseToShow_2 = <?php echo json_encode($course2); ?>.slice(0, 4);
            const courseToShow_3 = <?php echo json_encode($course3); ?>.slice(0, 4);

            function displayCourses(courseToShow, containerId) {
                const courseContainer = document.getElementById(containerId);
                courseContainer.innerHTML = '';

                courseToShow.forEach(course => {
                    const card = createCourseCard(course);
                    courseContainer.appendChild(card);
                });
            }

            displayCourses(courseToShow_1, 'course-container-1');
            displayCourses(courseToShow_2, 'course-container-2');
            displayCourses(courseToShow_3, 'course-container-3');
        </script>
    @endsection
