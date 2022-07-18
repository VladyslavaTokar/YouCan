<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')

    <div class="container-friends">

        <article class="l-design-widht">

            <div class="show-friends">

                <h2>Result</h2>

                @foreach ($searchname as $searchname)
                
                <div class="searchfriends">

               <a href='{{asset('/' . $searchname->id . '/showfriend')}}'> <h1>{{$searchname->name}}</h1> </a>

                </div>
                @endforeach   
               
                
                <a class="back" href="/friends"> Back</a>
                
            </div>
    
        </article>
    
    </div>









            
</div>
@include('layouts.footer')
</html>