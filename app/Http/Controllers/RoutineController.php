<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RoutineController extends Controller
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
        $habit = Routine::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.habits', compact('habit'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_habit');
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
            'completed_day_one' => 'nullable',
            'completed_day_two' => 'nullable',
            'completed_day_three' => 'nullable',
            'completed_day_four' => 'nullable',
            'completed_day_five' => 'nullable',
            'completed_day_six' => 'nullable',
            'completed_day_seven' => 'nullable',
        ]);

        $habit = new Routine;
        $habit->name = $request->input('name');
        $habit->user_id = Auth::user()->id;
        $habit->save();

        return back()->with('success', 'Item created successfully');
    }

    public function done_one($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_one) {
            $habit->update(['completed_day_one'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_one'=> true]);
            return redirect()->back();
        }
    }

    public function done_two($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_two) {
            $habit->update(['completed_day_two'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_two'=> true]);
            return redirect()->back();
        }
    }

    public function done_three($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_three) {
            $habit->update(['completed_day_three'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_three'=> true]);
            return redirect()->back();
        }
    }

    public function done_four($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_four) {
            $habit->update(['completed_day_four'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_four'=> true]);
            return redirect()->back();
        }
    }

    public function done_five($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_five) {
            $habit->update(['completed_day_five'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_five'=> true]);
            return redirect()->back();
        }
    }

    public function done_six($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_six) {
            $habit->update(['completed_day_six'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_six'=> true]);
            return redirect()->back();
        }
    }

    public function done_seven($id)
    {
        $habit = Routine::find($id);
        if ($habit->completed_day_seven) {
            $habit->update(['completed_day_seven'=> false ]);
            return redirect()->back();
        }
        else{
            $habit->update(['completed_day_seven'=> true]);
            return redirect()->back();
        }
    }

    public function reset($id)
    {
        $habit = Routine::find($id);
            $habit->update(['completed_day_one'=> false ]);
            $habit->update(['completed_day_two'=> false ]);
            $habit->update(['completed_day_three'=> false ]);
            $habit->update(['completed_day_four'=> false ]);
            $habit->update(['completed_day_five'=> false ]);
            $habit->update(['completed_day_six'=> false ]);
            $habit->update(['completed_day_seven'=> false ]);

            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Checklist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard', compact('todos'));
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function change($id)
    {
        $habit = Routine::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('pages.habit-edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update_habit(Request $request, $id)
    {
     
         $this->validate($request, [
            'name' => 'required|string|max:255',
            'completed' => 'nullable',
        ]);

        $habit = Routine::find($id);
        $habit->name = $request->input('name');
        $habit->save();
        return redirect('habits');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function trash($id)
    {

        $habit = Routine::find($id);
        $habit->delete();
        return redirect()->back();
    }

    
}
