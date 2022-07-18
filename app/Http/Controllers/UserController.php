<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edituser(){
        return view('pages.settings');
    }

    public function updateuser(Request $request){
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email'=>$request->email
        ]);

        return redirect()->back();
    }

    public function search(Request $request){
        $name = $request->get('search');
        $searchname = User::where('name', 'like', '%'.$name.'%')->get();
        return view('pages.friends-search')->with('searchname', $searchname);
    }
}
