<!doctype html>

        @include('layouts.app')
        @include('layouts.sidebar')
        

        <div class="container">

        <article class="l-design-widht-todo">
                <div class="card-form-todo-1">
        
                <form action="{{route('checklist.store')}}"class='todoinput' method="POST">
                @csrf

                <label class="post-input">
                        <h2 class="todo-h2">Do not forget to ...</h2>
                        
                        <input class="post-input-field" type="text" name="name" placeholder="add your task"/>
                        
                </label>
                        <button class="btn-todo" type="submit"><i class="fa-solid fa-check"></i></button>              
                

                </form>
                
                </div>
        </article>

        <article class="l-design-widht-todo">
        <div class="card-form-todo">
                       
                <h3 class="todocount">You have {{ $todos->where('completed', '=', true)->count() }} out of {{ $todos->count() }} todo's </h3>

                @foreach ($todos as $todo)
                

                        @if ($todo->completed==0)
                        
                        <div class="todotodo">
                        <button class="btn-todo"  onclick="window.location.href='{{asset('/' . $todo->id . '/done')}}'"><i class="fa-regular fa-circle"></i></button> 
                        <div class="todoitems">{{$todo->name}}</div>

                          <div class="push">
                          <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $todo->id . '/rename')}}'"> <i class="fa-regular fa-pen-to-square"></i></button> 
                         </div>
                         <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $todo->id . '/exterminate')}}'"> <i class="fa-solid fa-trash"></i> </button> 
                        </div>


                         @else
                        

                         <div class="todotodo">
                        <button class="btn-todo"  onclick="window.location.href='{{asset('/' . $todo->id . '/done')}}'"><i class="fa-regular fa-circle-check"></i></button> 
                        <div class="todoitems strikethrough">{{$todo->name}}</div>

                        <div class="push">
                        <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $todo->id . '/rename')}}'"> <i class="fa-regular fa-pen-to-square"></i></button> 
                        </div>      
                        <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $todo->id . '/exterminate')}}'"> <i class="fa-solid fa-trash"></i></button> 
                        </div>
                        
                        @endif  


                        @endforeach
                </div>
                </div>
    
                
        </div>
       
</div>
       

@include('layouts.footer')
</html>


