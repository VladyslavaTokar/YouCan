<!doctype html>

        @include('layouts.app')
        @include('layouts.sidebar')
        

        <article class="l-design-widht-todo">
                <div class="card-form-todo-1">
     
        
                <form action="{{ route('update_habit', $habit->id) }}" class='todoinput' method="POST">
                @csrf
                @method("patch")
                <label class="post-input">

                        <h2 class="todo-h2">Edit your habit</h2>

                   <input type="text" class="post-input-field" name="name"  value="{{$habit -> name}}" autocomplete="{{$habit -> name}}">     
                              
                
                </label>

                <button class="btn-todo" type="submit"><i class="fa-solid fa-check"></i></button>

                <h5>
                <a href="/habit"> Back</a>
                </h5>
                </form>
                
                
        </div>

</html>




