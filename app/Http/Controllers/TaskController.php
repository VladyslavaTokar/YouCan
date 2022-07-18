<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Tasksub;
use App\Models\Checklist;
use App\Models\User;
use App\Models\Routine;
use App\Models\Subitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('pages.tasks-show')->with('task',$task);
    }


    
    public function savesubitem(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority'  => 'required',
            'date'  => 'required'
        ]);
        $subitem=new Tasksub;
        $subitem->task_id=$id;
        $subitem->title=$request->title;
        $subitem->description=$request->description;
        $subitem->priority=$request->priority;
        $subitem->date=$request->date;

        $subitem->save();

        $task = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return redirect('/tasks');
    }

    public function subdelete($id)
    {
        $subitem = Tasksub::find($id);
        $subitem->delete();
        return redirect()->back();
    }

    public function subedit($id)
    {
        $subitem = Tasksub::where('id', $id)->first();
        return view('pages.subtasks-edit', compact('subitem'));
    }


    public function subupdate(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'priority'  => 'required',
            'date'  => 'required'
        ]);

        $subitem = Tasksub::find($id);
        $subitem->title = $request->input('title');
        $subitem->description = $request->input('description');
        $subitem->priority = $request->input('priority');
        $subitem->date=$request->input('date');


        $subitem->save();

        return redirect('/tasks');
    }


    public function completedsub( $id)
    {
        $task = Task::find($id);
        
        $subitem = Tasksub::find($id);
        if ($subitem->completed) {
            $subitem->update(['completed'=> false ]);
            return redirect()->back();
        }
        else{
            $subitem->update(['completed'=> true]);
            return redirect()->back();
        }
    }

    public function index(Request $request)
    { 
    $task = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    return view('pages.tasks', compact('task'));
    }

    public function dashboard_show()
    {
        $habit = Routine::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $todos = Checklist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $task = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.show', compact('task', 'todos', 'habit'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'completed' => 'nullable',
        ]);

        $task = new Task;
        $task->name = $request->input('name');
        $task->user_id = Auth::user()->id;
        $task->save();

       return redirect('/tasks');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('pages.tasks-edit', compact('task'));
    }

    public function sub(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();
        // $task = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $response['task'] = Task::find($id);
        return view('pages.tasks-sub', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'completed' => 'nullable',
        ]);

        $task = Task::find($id);
        $task->name = $request->input('name');

        $task->save();
    
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }


    public function completed( $id)
    {
        $task = Task::find($id);
        if ($task->completed) {
            $task->update(['completed'=> false ]);
            return redirect('/tasks');
        }
        else{
            $task->update(['completed'=> true]);
            return redirect('/tasks');
        }
    }


}