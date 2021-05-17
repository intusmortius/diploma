<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ChatController extends Controller
{
    public function index()
    {
        return view("chat.chat");
    }

    public function chatWith(User $user)
    {
        $authUser = auth()->user();
        $authUser->chatable()->sync($user, false);
        return redirect(route("chat"));
    }

    public function delete(Request $request)
    {
        if($request){
            $user = User::find($request->id);
            if(isset($user)){
                auth()->user()->chatable()->detach($user);

                return Response::json(auth()->user()->chatable);
            } else {
                return Response::json("No such user!");
            }
            
        } else {
            return Response::json("Invalid request");
        }
        
    }
}
