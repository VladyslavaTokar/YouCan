<!doctype html>
    
        @include('layouts.app')

<article class="post-show">

        <div class="blog-box">
                <div class="blog-content-show">

                    <h3> {{$post->title}}</h3>
                    <div class="blog-content-add-show">
    
                        <div class="post-details">
                            <time datetime="{{ $post->created_at }}">
                                {{ $post->created_at->diffForHumans() }}
                            </time>
                            <span class="mx-1">&middot;</span>
                            <span>{{ ceil(strlen($post->description) / 863) }} min read</span>
                        </div>
                    </div>
                            <div class="blog-left-show">
                                <img class="blog-img"src="{{ asset('images/' . $post->image_path) }}"  alt="blog image">
                            </div>

                            
                            <div class="blog-content-main">
                                
                                <p class="blog-description">
                                    
                                    {!! $post->description !!}
                                </p>
                            </div>
                            <div class="button-group-post">
                               
                            <button class="btn-1-post-show"> <a href="/posts"> Back</a></button>

        </div>

    </article>

    <article class="post-show">
        <div class="blog-box">
            <div class="blog-content-show">

                <h3> Comments</h3>
                <div class="blog-content-add-comment">

                    <form action="{{ url('comment/' .$post->id) }}"  method="POST">           
                        @csrf
                        <label class="post-input">
                            <label for="description">Leave a comment</label>
                            <input type="hidden" name="post_id" value="{$post->id}"> 
                            <textarea class="post-input-field post-input-description" type="text" rows="3" id="subtask-textarea" name="comment"> </textarea>
                            
                                <button class="btn-form">Submit</button>  
                        </label>
                            
                    </form>

                    
                        @forelse ($post->comments as $comment)
                        <div class="comment">
                            <div class="comment-add">
                            @if ($comment->user)
                                <p>{{$comment->user->name}}</p>
                            @endif

                            <p class="push">{{$comment->created_at->diffForHumans()}}</p>
                            </div>

                            <div class="comment-add">
                            <p>"{{$comment->comment}}"</p>

                            @if (auth()->user()->is_admin || Auth::id() == $comment->user_id)
                            
                            <button class="btn-todo-edit push"  onclick="window.location.href='{{asset('/' . $comment->id . '/commentdelete')}}'"> Delete Comment</button> 
                            
                             @endif
                            </div>
                        </div>
                    @empty
                        <h2>No comments yet!</h2>
                    @endforelse             
                    </div>

            </div>