<!doctype html>

        @include('layouts.app')
        @include('layouts.sidebar')


         
        @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <article class="l-design-widht">
            
        <form action="{{ url('post') }}" method="POST" enctype="multipart/form-data">
                   
            @csrf

            <div class="card-form">

                <h2>Create post here</h2>

                <label class="post-input">
                <label for="title">Title</label>
                <input class="post-input-field" type="text" name="title" placeholder="Title"/>
                </label>

                <label class="post-input">
                <label for="description">Description</label>
                <textarea class="post-input-field post-input-description" type="text" rows="5" id="subtask-textarea" name="description"> </textarea>
                </label>

                <label class="post-input">
                <label for="image">Image</label>
                <input class="post-input-field" type="file" name="image"/>
                </label>
                
              
              <div class="button-group">
                <button class="btn-form">Create</button>
              </div>


            </div>

        </form>
            
          
        
    </article>
          
    <script>
        ClassicEditor
            .create( document.querySelector( '#subtask-textarea' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>