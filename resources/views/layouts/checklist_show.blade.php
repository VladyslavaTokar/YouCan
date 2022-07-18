<!doctype html>
    
        @include('layouts.app')
        {{-- @include('layouts.sidebar') --}}
       
        <body>
<h1>this is dashboard and todo combined</h1>

 <div class="todos">
        
                <h2>Your To-Do's</h2>
                <div class="w-100">

                @foreach ($todos as $todo)
                <div class="w-100 d-flex justify-content-between">
                        
                <div> @if ($todo->completed == 0)

                        <ol class="fa-ul">
                                <li><span class="fa-li"> <button class="btn-todo"> <i class="fa-regular fa-circle"></i></button></span>{{$todo->name}}</li>
                              </ol>
                       @else
                       <ol class="fa-ul">
                        <li class="strikethrough"><span class="fa-li"> <button class="btn-todo"><i class="fa-regular fa-circle-check"></i></button></span>{{$todo->name}}</li>
                      </ol>
                @endif </div>

                        

                        </div>
                
                    
                @endforeach
                </div>
                </div> 


                <script src="{{mix('js/app.js') }}"></script>
                <script src="{{ asset('js/app.js') }}"></script>
        </html>