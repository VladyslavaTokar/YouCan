<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')

        <article class="tasks">
            <div class="card-form-tasks"> 
<h2>Main task: <span> {{$task->name}} </span></h2>

<h2>Subtasks: </h2>


<div class="taskcontainer">
<div class="responsive-table">
    <div class="table-header">
          <div class="col col-1"></div>
          <div class="col col-2">Subtask</div>
          <div class="col col-3">Description</div>
          <div class="col col-4">Due to</div>
          <div class="col col-5"></div>
          <div class="col col-6"></div>
    </div>

 @forelse ($task->tasksubs as $subitem)

@if ($subitem->completed==0)

    @if ($subitem->priority==4)
    <div class="tasklowpriority table-row">
     
    <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle"></i></button></div>
    <div class="col col-2" data-label="title">{!! $subitem->title !!}</div>
    <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
    <div class="col col-4" data-label="date">{{$subitem->date}}</div>
    <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
    <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
    
    </div>

    @elseif($subitem->priority==3)

    <div class="taskmediumpriority table-row">
        <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle"></i></button></div>
        <div class="col col-2" data-label="title">{{$subitem->title}}</div>
        <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
        <div class="col col-4" data-label="date">{{$subitem->date}}</div>
        <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
        <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
     
    </div>

     @elseif($subitem->priority==2)

     <div class="taskhighpriority table-row">
         <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle"></i></button></div>
         <div class="col col-2" data-label="title">{{$subitem->title}}</div>
         <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
         <div class="col col-4" data-label="date">{{$subitem->date}}</div>
         <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
         <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>

      </div>

      @elseif($subitem->priority==1)

      <div class="taskhighestpriority table-row">
          <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle"></i></button></div>
          <div class="col col-2" data-label="title">{{$subitem->title}}</div>
          <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
          <div class="col col-4" data-label="date">{{$subitem->date}}</div>
          <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
          <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
       </div>

    @endif


@else

    @if ($subitem->priority==4)
    <div class="tasklowpriority table-row strikethrough">
 
    <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    <div class="col col-2" data-label="title">{{$subitem->title}}</div>
    <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
    <div class="col col-4" data-label="date">{{$subitem->date}}</div>
    <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
    <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
    </div>

    @elseif($subitem->priority==3)

    <div class="taskmediumpriority table-row strikethrough">
    <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
    <div class="col col-2" data-label="title">{{$subitem->title}}</div>
    <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
    <div class="col col-4" data-label="date">{{$subitem->date}}</div>
    <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
    <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
    </div>

    @elseif($subitem->priority==2)

    <div class="taskhighpriority table-row strikethrough">
     <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
     <div class="col col-2" data-label="title">{{$subitem->title}}</div>
     <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
     <div class="col col-4" data-label="date">{{$subitem->date}}</div>
     <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
     <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
     </div>

    @elseif($subitem->priority==1)

    <div class="taskhighestpriority table-row strikethrough">
      <div class="col col-1" data-label="check"><button class="btn-task"   onclick="window.location.href='{{asset('/' . $subitem->id . '/completedsub')}}'"><i class="fa-regular fa-circle-check"></i></button></div>
      <div class="col col-2" data-label="title">{{$subitem->title}}</div>
      <div class="col col-3" data-label="description">{!! $subitem->description !!}</div>
      <div class="col col-4" data-label="date">{{$subitem->date}}</div>
      <div class="col col-5" data-label="edit"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subedit')}}'"> <i class="fa-regular fa-pen-to-square"></i></button></div>
      <div class="col col-6" data-label="delete"><button class="btn-todo-edit"  onclick="window.location.href='{{asset('/' . $subitem->id . '/subdelete')}}'"> <i class="fa-solid fa-trash"></i> </button> </div>
    </div>

    @endif

@endif

@empty
<div class="nosubitems">
    <h2>There is no sub task created for this task.</h2>
    <button class="btn-1"  onclick="window.location.href='{{asset('/' . $task->id . '/sub')}}'"> Create a subtask? </button> 
</div>
@endforelse

</div>
</div>


</div>
</div>


</div>