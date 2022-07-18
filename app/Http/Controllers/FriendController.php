<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Routine;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function showfriend($id)
    {
        $searchname = User::find($id);

        $habit = Routine::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        
        $friend = new Friend;
        $friend->user_id_requester=Auth::user()->id;
        $friend->user_id_acceptor=$searchname->id; 

        return view('pages.showfriend')->with('searchname',$searchname, $friend, 'habit');
    }


    public function deletefriend($id) {

        $delete = DB::table('friends')->where('user_id_acceptor',$id)->delete();
        $delete = DB::table('friends')->where('user_id_requester',$id)->delete();
        return view('pages.friends');
    }

    public function deleterequestfriend($id) {
        $delete = DB::table('friends')->where('id',$id)->delete();
        return view('pages.friends');
    }

    
    public function addfriend($id){    

        $searchname = User::find($id);
        $friend = new Friend;
        $friend->user_id_requester=Auth::user()->id;
        $friend->user_id_acceptor=$searchname->id;
        $habit = Routine::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $friend->save();
        return view("pages.friends");
     }

     public function accept($id){
        $update = DB::table('friends')->where('id',$id)->update(
            ['accepted' => 1]);
        return view("pages.friends");
     }

}
