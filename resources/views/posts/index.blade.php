<!doctype html>
    
    @include('layouts.app')
       
        
         @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif 

        <div class="blog-container">
            <div class="text-center">
                <div class="blog-heading">
                <span>Recent Posts</span>
                <h3>You can find here motivation, useful tips and fun facts about organizing your everyday life!</h3>
                </div>
                
                @if (auth()->user()->is_admin)
            
                <button class="btn-blog"><a 
                    href="/create"
                    class="">
                    Create post
                </a></button>
            
        @endif
            </div>

            <div class="blog">
                @foreach ($posts as $post)
                    <div class="blog-box">
                        <div class="blog-left">
                            <img class="blog-img"src="{{ asset('images/' . $post->image_path) }}"  alt="blog image">
                        </div>
        
                        <div class="blog-content">
                            <a href={{route('postshow',$post->id)}}><h1 class="blog-heading">{{ $post->title }}</h1></a>

                            <div class="blog-content-add">
    
                                <div class="flex text-sm leading-5 text-gray-500">
                                    <time datetime="{{ $post->created_at }}">
                                        {{ $post->created_at->diffForHumans() }}
                                    </time>
                                    <span class="mx-1">&middot;</span>
                                    <span>{{ ceil(strlen($post->description) / 863) }} min read</span>
                                </div>

                                

                        </div>
                            <div class="blog-content-main">
                                
                                <p class="blog-description">
                                    @if (strlen($post->description) > 400)
                                    {!! substr($post->description, 0, 400) !!}...
                                    @else
                                    {!! $post->description !!}
                                    @endif
                                </p>
                            </div>
                            <div class="button-group-post">

                            <button class="btn-1-post"> <a href={{route('postshow',$post->id)}}>Read more</a> </button>
                            
                            @if (auth()->user()->is_admin)
                            <div>
                            <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $post->id . '/editpost')}}'"> Edit</button> 
                            <button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $post->id . '/destroy')}}'"> Delete Post</button> 
                            </div>
                            @endif
                            
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('layouts.footer')
        </html>
        