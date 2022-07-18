<!doctype html>
{{--     
        @include('layouts.app')
        @include('layouts.sidebar') --}}

        <body>

               

<div class="container">    
        <div class="greetings">
        <div>  
        <h3>Hello,  <?php echo (Auth::user()->name) ?>!</h3>
        <h4>Have a productive day!</h4>
        <h4> <span>
        <?php $dateTime = new DateTime('now', new DateTimeZone('Europe/Skopje')); 
        echo $dateTime->format("h:i A"); ?> </span>
        </h4>
        
        </div>   
        <div class="img_greetings">
                <img src="images/saly_greetings2.png" alt="phone">
        </div>
        </div>
        

 

