<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
   


<nav class="bg-white border-gray-200 dark:bg-gray-900 ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://upload.wikimedia.org/wikipedia/en/1/1a/Guru_Nanak_Dev_University_Logo.png" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">GNDUC</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="about.html" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
        </li>
        <li>
          <a href="alumni.html" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Alumni</a>
        </li>
        <li>
          <a href="courses.html" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Courses</a>
        </li>
        <li>
          <a href="contactus.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
        </li>
        <li>
          <a href="logout.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>






<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20">

      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Guru Nanak Dev University College</h1>
        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
      </div>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">GNDU campus stands at number one position declared as the most 'Swachh Campus' out of the multispecialty public universities having big campuses. Overall GNDU has been ranked 2nd in the country amongst all government universities big and small campuses put together by Ministry of Human Resource Development, Govt.</p>
    </div>
    <div class="flex flex-wrap -m-4">

   
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
        <a href = "CdepartmentInfo.html" >
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://static.wixstatic.com/media/0c0246_8a9e99ebe7ee4c458782203abcc47694~mv2.jpg/v1/fill/w_560,h_372,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/0c0246_8a9e99ebe" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">Computer</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Computer Science</h2>
          <p class="leading-relaxed text-base">A computer department is a college unit that deals with ICT matters and provides services. Computer science is the study of computers and computational systems, and includes the following topics: Algorithms that make up software, How software interacts with hardware, and How software is developed and designed.</p>
</a>
        </div>
      </div>

      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
          <a href = "MdepartmentInfo.html">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5-wWACbcwq_moessuDXD6So2T93fH3eoodw&s" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">Management</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Management and Business</h2>
          <p class="leading-relaxed text-base">Management departments help organizations improve their performance by teaching how to use resources effectively, set goals, and develop strategies</p>
</a>
        </div>
      </div>
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
          <a href ='AdepartInfo.html'>
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSUiFscwCSuocJFB7Z0jyRRo8lHF3vdYdkQw&s" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">Arts</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Arts Department</h2>
          <p class="leading-relaxed text-base">focuses on instruction of the liberal arts and pure sciences, although they frequently include programs and faculty in fine arts, social sciences, and other disciplines.</p>
</a>
        </div>
      </div>
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
          <a href="JdepartmentInfo.html">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://www.alberts.edu.in/wp-content/uploads/2022/04/Journalism-pic.jpg" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">journalism</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Journalism Department</h2>
          <p class="leading-relaxed text-base">A journalism department, also known as a journalism school or J-school, is a place where journalists are trained and educated. Journalism departments are usually part of a university and offer courses in journalism and related fields.</p>
</a>
        </div>
      </div>
    </div>
  </div>
</section>





<footer class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">

    <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://upload.wikimedia.org/wikipedia/en/1/1a/Guru_Nanak_Dev_University_Logo.png" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">GNDUC</span>
    </a>

    
    </a>
    <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2024 GNDU —
      <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@gnduc</a>
    </p>
    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <a class="text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500">
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
      </a>
    </span>
  </div>
</footer>





</body>
</html>