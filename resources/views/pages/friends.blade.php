<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')

        <div class="container-friends">
        <article class="l-design-widht">

        <h1 class="title-friends">Search for a friend!</h1>

        <form action="{{url('/search/')}}" method="GET">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" name="search" aria-describedby="search-addon" />
            <button type="submit"><span class="input-group-text-friends border-0" id="search-addon"> <i class="fas fa-search"></i></span></button>
        </div>
        </form>


        </article>

        
        <article class="l-design-widht">

            <div class="show-friends">
            <h1 class="title-friends">Friend requests</h1>
    
            
            @foreach (Auth::user()->friendsacceptors->where('accepted', '=', false) as $friendreq)
            
            <div class="requests">
            <h2><a href='#'>{{$friendreq->requester->name}} </a></h2>
            
            <div class="push">
            <button class="btn-1-todo-show"  onclick="window.location.href='{{asset('/' . $friendreq->id . '/accept')}}'">Accept</a></button>
            <button class="btn-1-todo-show"><a href="{{url('deleterequestfriend' .$friendreq->id.'/')}}">Decline</a></button> 
            </div>

        </div>
            
            @endforeach
    
            @if (Auth::user()->friendsacceptors()->count() == 0)
            <h2>You do not have any friend requests.</h2>
            @endif
            </div>
            </article>


        <article class="l-design-widht">
            <div class="show-friends">
            <h1 class="title-friends">Your friends</h1>
    
            
            @foreach (Auth::user()->friends->where('accepted', '=', true) as $user)
            <div>
            <h2><a class="friend_user" href='{{asset('/' . $user->acceptor->id . '/showfriend')}}'>{{$user->acceptor->name}} </a></h2>
            </div>
            @endforeach


            @foreach (Auth::user()->friendsacceptors->where('accepted', '=', true) as $user)
            <div>
            <h2><a class="friend_user" href='{{asset('/' . $user->requester->id . '/showfriend')}}'>{{$user->requester->name}} </a></h2>
            </div>
            @endforeach
    
            @if (Auth::user()->friends()->count() == 0)
            <h2>You do not have any friends yet.</h2>
            @endif
    
            </div>
            </article>



        </div>

</div>
    @include('layouts.footer')
    </html>