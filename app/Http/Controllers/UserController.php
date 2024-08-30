<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Page;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function CreatePage(Request $request)
    {
        $validate=$request->validate([
            'image'=>'required',
            'name'=>'required',
            'description'=>'required',
            'product_type'=>'required',
            'user_id'=>Auth::id()
            ]);
        $page=Page::create($validate);
        return response()->json(['message'=>'Page Created'],201);

    }
    public function Send_a_friend_request(Request $request)
    {
        $user_id=Auth::id();
        $freind_id=$request->input('friend_id');
        $status=$request->input('status');
        $db=DB::table('user_friends')->insert([
            'user_id'=>$request->user_id,
            'Friends_id'=>$freind_id,
            'status'=>$status,
        ]);
        if ($status==1)
        {
            return \response()->json(['Friend request accepted'],201);
        }else{
            return \response()->json(['Friend request Reject'],201);
        }
    }
    public function send_invite_for_friend(Request $request)
    {
        $user_id=Auth::id();
        
    }

}
