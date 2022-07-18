@extends('layouts.app')

@section('content')
{{-- <h1>{{$title}}</h1> --}}

<section class="home d-flex align-items-center">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-7 col-md-7">
     <div class="home-text">
          <h1>Learn how to manage your time effectively with <span class="logo"> YouCan </span></h1>
          <p>Web application for those, who want to focus on what's important and achieve any goals.</p>
          <div class="home-btn">
              <a href="register" class="btn-1"> Get started! </a>
              <button type="button" onclick="window.location.href='#cards'" class="btn btn-1 btn-2">Learn more</button>
          </div>
     </div>
</div>
<div class="col-lg-5 col-md-5 text-center">
<div class="home-img">
     <div class="circle"></div>
     <img src="images/landing_1.png" alt="landing picture">

</div>
</div>
</div>
</section>


<section class="features section-padding">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-8">
               <div class="section-title" id="cards">
                    <h2 class="dark-h2"> <span>Who</span> is this app for?</h2>
               </div>
               </div>
          </div>
          <div class="row">
               <div class="cards">
                    <div class="item">
                         <div class="okno">
                              <img class = "card_img" src="images/item1.png" alt="item1">
                              <div class="content">
                                   <h3>Students</h3>
                                   <p class="card_text">To manage time to study, be focused and be prepared for exams   </p>
                              </div>
                         </div>
                    </div>
                    <div class="item">
                         <div class="okno">
                              <img class = "card_img"src="images/item2.png" alt="item2">
                              <div class="content">
                              <h3>Employees</h3>
                              <p class="card_text">To follow up deadlines and be confident about time management system</p>
                         </div>
                         </div>
                    </div>
                    <div class="item">
                         <div class="okno">
                              <img class = "card_img" src="images/item3.png" alt="item2">
                              <div class="content">
                                   <h3>People</h3>
                                   <p class="card_text">To improve and learn anything effectively while enjoing the process</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>


<section class="features section-padding">
     <div class="container">
          <div class="row">
               <div class="col-lg-6 col-md-5">
                    <div class="features_img">
                         <img src="images/feature2.png" alt="phone">
                    </div>
               </div>
               <div class="col-lg-6 col-md-7" id="features">
                    <div class="section-title">
                         <h2 class="dark-h2"><span>What</span> is included in the app</h2>
                    </div>
                    <div class="features-text">
                         <p class="features-item">To-Do list to organize everyday tasks</p>
                         <p class="features-item">Big tasks with deadlines to keep track on every  step in the project</p>
                         <p class="features-item">Pomodoro timer to focus while working </p>
                         <p class="features-item">Challenges that you can create on your own to improve your willpower</p>
                         <p class="features-item">Habits to earn new healthy routines or to get rid of unhealthy ones </p>
                         <p class="features-item">Everyday inspiration to be motivated when you need it</p>
                    </div>
               </div>
          </div>
     </div>
</section>



<section class="ready">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-8">
                         <div class="section-title">
                         <h2 class="ready-text"> <span>Ready</span> to take control of your life?</h2>
                         </div>
                         <div class="ready-btn">
                         <a href="/register" class="btn-1"> Sign up for free </a>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</section>




@endsection 


