<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')

        <article class="l-design-widht">
            

        <form action="{{route('updateuser')}}" class='todoinput' method="POST">
                @csrf
                @method("put")
                    

                <div class="card-form">
                    <h2>You can edit your profile here!</h2>

                    <label class="post-input">     
                        <label for="name"><h4>{{__('Name')}}</h4></label>
                        <input type="text" class="post-input-field" name="name" value="{{Auth::user()->name}}">     
                    </label> 

                    <label class="post-input">      
                        <label for="email"><h4>{{__('Email')}}</h4></label>
                        <input type="email" class= "post-input-field" name="email" value="{{Auth::user()->email}}">
                    </label>   


                    <div class="button-group">
                        <button class="btn-form"  type="submit"> Update </button> 
                       
                        </div>
                
                
        </form>

        </div>
        </article>

        
    </div>
        @include('layouts.footer')
        </html>
