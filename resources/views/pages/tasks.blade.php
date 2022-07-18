<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')

        <?php 
        use Carbon\Carbon;
        ?>

    <div class="container">

        <article class="l-design-widht-todo">
            <div class="card-form-todo-1">
         
            
          
                <form action="{{ url('task') }}" method="POST" class="todoinput">
                    @csrf
         
                    <label class="post-input">
                        <h2 class="todo-h2">Create new task</h2>

                        <input type="text" class="post-input-field" name="name" placeholder="add your task">
                    </label>     
                        <button class="btn-todo" type="submit"><i class="fa-solid fa-plus"></i></button>              
                     
                     </div>
 
                </form>
        </article>


        <article class="l-design-widht-todo">
        <div class="card-form-todo">

                    @foreach ($task as $tasks)
            
                    @if ($tasks->completed==0)

                    <div class="todotodo">
                        <button class="btn-task"  onclick="window.location.href='{{asset('/' . $tasks->id . '/completed')}}'"><i class="fa-regular fa-circle"></i></button> 
                        <div class="taskitems"> <a href="/tasks/{{$tasks->id}}"> {{$tasks->name}} </a> </div>
            
                          <div class="push">
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $tasks->id . '/edit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button> 
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $tasks->id . '/delete')}}'"> <i class="fa-solid fa-trash"></i> </button> 
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $tasks->id . '/sub')}}'"> <i class="fa-solid fa-circle-plus"></i> </button> 
                     
                        </div>
                    </div>


                    @else

                    <div class="todotodo">
                        <button class="btn-task"  onclick="window.location.href='{{asset('/' . $tasks->id . '/completed')}}'"><i class="fa-regular fa-circle-check"></i></button> 
                        <div class="taskitems strikethrough" > <a href="/tasks/{{$tasks->id}}"> {{$tasks->name}} </a> </div>
            
                          <div class="push">
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $tasks->id . '/edit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button> 
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $tasks->id . '/delete')}}'"> <i class="fa-solid fa-trash"></i> </button> 
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $tasks->id . '/sub')}}'"> <i class="fa-solid fa-circle-plus"></i> </button> 
                     
                        </div>
                    </div>

                    @endif 
                    @endforeach
                </div>  

        </article>
        </div>

    </div>
        @include('layouts.footer')
        </html>
        

