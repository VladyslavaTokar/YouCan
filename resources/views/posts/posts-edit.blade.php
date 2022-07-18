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
        
            <form action="{{ route('updatepost', $post->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method("patch")

                <div class="card-form">

                <h2 class="todo-h2">Edit your post</h2>

                <label class="post-input">
                <label for="title">Title</label>
                <input type="text" class="post-input-field" name="title" value="{{$post->title}}">
                </label>


                <label class="post-input">
                <label for="description">Description</label>
                <textarea class="post-input-field post-input-description" type="text" rows="5" id="subtask-textarea" name="description">{!!$post->description!!}</textarea>
                </label>
        

                <label class="post-input">
                <label for="image">Image</label>
                <input class="post-input-field" type="file" name="image" placeholder="{{$post->image_path}}"/>
                </label>
                <button class="btn-form">Update</button>
                <a href="/posts"> Back</a>
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
 
</html>
