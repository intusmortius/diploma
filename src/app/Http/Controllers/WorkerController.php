<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Worker;
use Spatie\Permission\Models\Role;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users = User::with("roles")->get();
        $users = $all_users->filter(function ($user) {
            return $user->hasRole('worker');
        });
        $pagination_users = $this->paginate($users, 10, null, ["path" => "workers/"]);
        return view("workers.workers", ['users' => $pagination_users, "tags" => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("users.profile", ['user' => $user, "tags" => $user->tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return $user->can("update", $user) ? view("users.profile-edit", ["user" => $user, "tags" => $user->tags]) : abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $attributes = $request->validated();
        $tags = [];

        if (isset($attributes["tags"])) {
            foreach ($attributes["tags"] as $tag) {
                array_push($tags, Tag::firstOrCreate(["name" => $tag])->id);
            }
            $user->tags()->sync($tags);
        } else {
            $user->tags()->detach($user->tags->pluck("id"));
        }



        $user->update($attributes);
        return redirect(route("profile", $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function search(Request $request)
    {
        // dd($request);
        $tags = [];
        if (isset($request->tags) && !empty($request->tags)) {
            $tags = Tag::whereIn("id", [...$request->tags])->get();
        }
        

        if (isset($request->search) && !empty($request->search)) {
            
            $all_users = User::with("roles")->get();
            $users = $all_users->filter(function ($user) {
                return $user->hasRole('worker');
            });
            $search = $request->search;

            $users = $users->filter(function($el) use($search){
                return false !== stripos($el->name, $search);
            });
            // $users = $users->filter(function($el) use ($users, $request) {
            //     dd($users->pluck("name"));
            //     return $users->contains("name", $request->search);
            // });
            // dd($users);
            $users = $this->paginate($users, 10, null, ["path" => "/workers/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token]);

            if (!empty($tags)) {
                $users = $users->filter(function ($el) use ($tags) {
                    foreach([...$tags->pluck("id")] as $tag){
                        if($el->tags->pluck("id")->contains($tag)) {
                            return true;
                        }
                    }
                    return false;
                });
                $users = User::whereIn("id", [...$users->pluck("id")])->paginate(5);
                $users->withPath("/workers/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token);
            }
            
            // $users->withPath("/workers/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token);
            return view("workers.workers", ["users" => $users, "tags" => Tag::all()]);
        } else if (!empty($tags)) {
            $all_users = User::with("roles")->get();
            $users = $all_users->filter(function ($user) {
                return $user->hasRole('worker');
            });
            $users = $users->filter(function ($el) use ($tags) {
                foreach([...$tags->pluck("id")] as $tag){
                    if($el->tags->pluck("id")->contains($tag)) {
                        return true;
                    }
                }
                return false;
            });
            $users = User::whereIn("id", [...$users->pluck("id")])->paginate(5);
            $users->withPath("/workers/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token);
            return view("workers.workers", ["users" => $users, "tags" => Tag::all()]);
        }else {
            return back();
        }
    }
}
