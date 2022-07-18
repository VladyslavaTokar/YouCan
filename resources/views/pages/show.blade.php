@include('layouts.app')
@include('layouts.sidebar')
@include('pages.dashboard')

    

<div class="dashboard-todo-tasks">

  <div class="habits card-form-habit-show">
    <h3>You have {{ $habit->count() }} habits</h3>
     
     <div class="taskcontainer">
         <div class="responsive-table">
        @foreach ($habit as $habits)
        
        <div class="habit-container-show">
        <button class="btn-todo"><i class="fa-solid fa-check"></i></button> 
        <div class="col" data-label="name">{{$habits->name}}</div>
      </div>
  
      @endforeach
  
      <button class="btn-1-todo-show"><a href="/habits">Did you complete your habits today?</a></button>
           
  
    </div>
  
    </div>
  </div>
  
 


  <article class="l-design-widht-todo">
    <div class="card-form-todo">
    <h3>You have {{ $task->count() }} main tasks </h3>
              @foreach ($task as $tasks)
      
              @if ($tasks->completed==0)

              <div class="todotodo">
                  <div class="taskitems"> <a href="/tasks/{{$tasks->id}}"> {{$tasks->name}} </a> </div>
              </div>

              @else

              <div class="todotodo">
              <div class="taskitems strikethrough" > <a href="/tasks/{{$tasks->id}}"> {{$tasks->name}} </a> </div> 
              </div>

              @endif 
              @endforeach

              <button class="btn-1-todo-show"><a href="/tasks">See more</a></button>
          </div>  

  </article>

</div>

</div>
 


<article class="l-design-widht-todo">
  <div class="card-form-todo">

  <h3>You have {{ $todos->count() }} todo's </h3>

              @foreach ($todos as $todo)
                

                        @if ($todo->completed==0)
                        
                        <div class="todotodo">
                        <button class="btn-todo"  onclick="window.location.href='{{asset('/' . $todo->id . '/done')}}'"><i class="fa-regular fa-circle"></i></button> 
                        <div class="todoitems">{{$todo->name}}</div>
                        </div>

                         @else

                         <div class="todotodo">
                        <button class="btn-todo"  onclick="window.location.href='{{asset('/' . $todo->id . '/done')}}'"><i class="fa-regular fa-circle-check"></i></button> 
                        <div class="todoitems strikethrough">{{$todo->name}}</div>

                         </div>
                        
                        @endif  
              @endforeach

              <button class="btn-1-todo-show"><a href="/checklist">Check them out!</a></button>

    </div>
</article>

</div>
@include('layouts.footer')
</html>



