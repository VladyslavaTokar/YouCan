<!doctype html>

        @include('layouts.app')
        @include('layouts.sidebar')
        

        <article class="l-design-widht-todo">
                <div class="card-form-todo-1">
                <form action="{{ route('checklist.update', $todo->id) }}"class='todoinput' method="POST">
                @csrf
                @method("patch")
                
                <label class="post-input">

                <h2 class="todo-h2">Edit your todo</h2>
                <input type="text" class="post-input-field" name="name"  value="{{$todo -> name}}" autocomplete="{{$todo -> name}}">     
                                 
                </label>

                <button class="btn-todo" type="submit"><i class="fa-solid fa-check"></i></button>

                <h5>
                <a href="/checklist"> Back</a>
                </h5>
                
                </form>
                </div>
                      
        </article>     
                

<script src="{{mix('js/app.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>




