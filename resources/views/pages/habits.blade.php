<!doctype html>

        @include('layouts.app')
        @include('layouts.sidebar')
        

        <div class="habits card-form-habit">

               <div class="create-habit">
                <h2 class="todo-h2">Create your habit</h2>
        
                <form action="{{route('habit.store')}}"class='create-habit-form' method="POST">
                @csrf

                <label class="post-input">


                   <input type="text" class="post-input-field" name="name" placeholder="add your habit" aria-label="">     
                            
                
                </label>
                <button class="btn-todo" type="submit"><i class="fa-solid fa-plus"></i></button>      
                </form>

            </div>

                
                <div class="taskcontainer">
                    <div class="responsive-table">
                        <div class="table-header-habit">
                            
                              <div class="col col-1">Habit</div>

                              <div class="col col-2">MON</div>
                              <div class="col col-3">TUE</div>
                              <div class="col col-4">WED</div>
                              <div class="col col-5">THU</div>
                              <div class="col col-6">FRI</div>
                              <div class="col col-7">SAT</div>
                              <div class="col col-8">SUN</div>

                              <div class="col col-9"></div>
                              <div class="col col-10"></div>
                              <div class="col col-11"></div>
                        </div>
  
{{$habit->count()}}
@foreach ($habit as $habits)
    
        @if ($habits->completed_day_one==1 && $habits->completed_day_two==1 && $habits->completed_day_three==1 && $habits->completed_day_four==1 && $habits->completed_day_five==1 && $habits->completed_day_six==1 && $habits->completed_day_seven==1)
   
        <div class="table-row-habit">

        <div class="col col-1" data-label="name">{{$habits->name}}</div>
        
        <div class="col col-2" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_one')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
        <div class="col col-3" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_two')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
        <div class="col col-4" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_three')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
        <div class="col col-5" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_four')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
        <div class="col col-6" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_five')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
        <div class="col col-7" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_six')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
        <div class="col col-8" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_seven')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    
        <div class="col col-9" data-label="edit"><button class="btn-todo-edit" onclick="window.location.href='{{asset('/' . $habits->id . '/change')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
        <div class="col col-10" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $habits->id . '/trash')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
        <div class="col col-11" data-label="reset"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $habits->id . '/reset')}}'"> <i class="fa-solid fa-arrows-rotate"></i> </button> </div>
        <div class="col col-12" data-label="reset"><button class="btn-1-habit"  onclick="basic()"> <i class="fa-solid fa-gift"></i> </button> </div>

        </div>
   
   
    
    @else
    <div class="table-row-habit">
    <div class="col col-1" data-label="name">{{$habits->name}}</div>

    @if ($habits->completed_day_one==0)
        <div class="col col-2" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_one')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-2" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_one')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif
    
    
    @if ($habits->completed_day_two==0)
        <div class="col col-3" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_two')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-3" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_two')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif


    @if ($habits->completed_day_three==0)
        <div class="col col-4" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_three')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-4" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_three')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif


    @if ($habits->completed_day_four==0)
        <div class="col col-5" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_four')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-5" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_four')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif


    @if ($habits->completed_day_five==0)
        <div class="col col-6" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_five')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-6" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_five')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif


    @if ($habits->completed_day_six==0)
        <div class="col col-7" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_six')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-7" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_six')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif



    @if ($habits->completed_day_seven==0)
        <div class="col col-8" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_seven')}}'"><i class="fa-regular fa-circle"></i></button></div>
    @else
        <div class="col col-8" data-label="done"><button class="btn-todo"  onclick="window.location.href='{{asset('/' . $habits->id . '/done_seven')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    @endif
    

    <div class="col col-9" data-label="edit"><button class="btn-todo-edit" onclick="window.location.href='{{asset('/' . $habits->id . '/change')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
    <div class="col col-10" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $habits->id . '/trash')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
    <div class="col col-11" data-label="reset"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $habits->id . '/reset')}}'"> <i class="fa-solid fa-arrows-rotate"></i> </button> </div>
    
    @endif

    </div>

@endforeach 
    
    </div>
    </div>          
        
    </div>

   

    @push('head')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script src="{{url('js/main.js')}}"></script>
    @endpush

</div>
    @include('layouts.footer')
</html>



