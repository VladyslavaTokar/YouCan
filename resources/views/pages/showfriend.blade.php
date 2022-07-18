<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')

    <div class="container-friends">

        <article class="l-design-widht">

            <div class="show-friends">

                <div>
            <h1>{{$searchname->name}}</h1>
            <h3> <i class="fa-solid fa-user-group"></i> Friends:    
            <?php
            $a = $searchname->friends()->where('accepted', '=', true)->count();
            $b = $searchname->friendsacceptors()->where('accepted', '=', true)->count();
             echo $a+$b;
             ?>
             
            </h3>
                
            <h1>Current progress:</h1>

            <h3><i class="fa-regular fa-heart"></i> Habits created: {{ $searchname->routines()->count() }}</h3>

            <h3> <i class="fa-solid fa-check"></i> Todo's created: {{ $searchname->checklists()->count() }}</h3>

            <h3> <i class="fa-solid fa-list-check"></i> Tasks created: {{ $searchname->tasks()->count() }}</h3>
        </div>


  @php
   $i=Auth::user()->friends()->count();
   $b=Auth::user()->friendsacceptors()->count();
   $c=1;   
  @endphp

<div class="friend-bottom">
<a class="back" href="/friends"> Back</a>

    @foreach (Auth::user()->friends as $requester)

        @if ($requester->acceptor->id == $searchname->id)
            <div class="push">
                <p class="btn-todo"> Following </p> 
                <button class="btn-todo friend"> <a href="{{url('deletefriend' .$searchname->id.'/')}}"> Delete friend </a> </button> 
            </div>
 
        @break

        @elseif ($b==$c)
                    @foreach (Auth::user()->friendsacceptors as $requester)

                        @if ($requester->requester->id == $searchname->id)
                            <div class="push">
                                <p class="btn-todo"> Following </p> 
                                <button class="btn-todo friend"> <a href="{{url('deletefriend' .$searchname->id.'/')}}"> Delete friend </a> </button> 
                            </div>
                            @break
                            
                        @endif
                        @php
                            $c++;
                        @endphp
                    @endforeach
        @break

        @elseif ($i==$c)
                <div class="push">
                    <button class="btn-todo friend"> <a href="{{url('addfriend' .$searchname->id.'/')}}"> Add to friends </a> </button> 
                </div>
        @endif
                @php
                    $c++;
                @endphp
    @endforeach
</div>
            </div>

</article>
    
</div>





        
</div>
@include('layouts.footer')
</html>