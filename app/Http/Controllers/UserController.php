<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\invite;
use App\Models\Page;
use App\Models\Product;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $db=DB::table('user_friends')->insert([
            'user_id'=>$user_id,
            'Friends_id'=>$freind_id,
        ]);
        return response()->json(['message'=>'A friend request has been sent, awaiting a response'],201);
    }
    public function ResponseRequest(Request $request,$id)
    {
        $status=$request->input('status');
        if ($status==1) {
            $db = DB::table('user_friends')->where('id',$id)->update(['status' => 1]);
            return \response()->json(['Friend request accepted'], 201);
        }
        else{
            return \response()->json(['Friend request Reject'],201);
    }
}
    public function send_invite_for_friend(Request $request)
    {
        $user_id=Auth::id();
        $friend_id=$request->input('friend_id');
        $product_id=$request->input('product_id');
        $req=Validator::make($request->all(),[
            'user_id'=>'required',
            'friend_id'=>'required',
            'product_id'=>'required',
       ] );
        if ($req->fails())
        {
        return \response()->json(['error' => $req->errors()], 400);
        }else{
            $invite=invite::create([
          'user_id'=>$user_id,
           'Friends_id'=>$friend_id,
            'product_id'=>$product_id,
       ]);
            return response()->json(['message'=>'invite send For Freind'],201);
        }
    }
    public function AcceptInvite(Request $request,$id)
    {
        $invite=$request->input('invite');
        if ($invite==1)
        {
            $user=new User();
            $product=new Product();
            $invite=invite::query()->where('id',$id)->update(['invite'=>1]);
            $user->benefits+=($product->price*2)/100;
            return response()->json(['message'=>'invite Accept and you Got 2% form price product '],201);
        }else{
            return response()->json(['message'=>'invite reject'],201);
        }
    }
    


}
