<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $todos = Checklist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.todo', compact('todos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_checklist');
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

        $checklist = new Checklist;
        $checklist->name = $request->input('name');

        if($request->has('completed')){
            $checklist->completed = true;
        }

        $checklist->user_id = Auth::user()->id;

        $checklist->save();

        return back()->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     

    public function rename($id)
    {
        $todo = Checklist::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('pages.todo-edit', compact('todo'));
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

        $todo = Checklist::find($id);
        $todo->name = $request->input('name');

        $todo->save();
    
        return redirect('checklist') -> with('TO-Do updates succesfully');

    }




    public function done( $id)
    {
        $todo = Checklist::find($id);
        if ($todo->completed) {
            $todo->update(['completed'=> false ]);
            return redirect('checklist');
        }
        else{
            $todo->update(['completed'=> true]);
            return redirect('checklist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function exterminate($id)
    {
        $todo = Checklist::find($id);
        $todo->delete();
        return redirect('checklist');
    }

    

}