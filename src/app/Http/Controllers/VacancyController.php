<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacancyRequest;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Vacancy;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::latest()->paginate(20);
        return view("vacancies.vacancies", ["vacancies" => $vacancies, "tags" => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("vacancies.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVacancyRequest $request)
    {
        $worker_id = ["author_id" => auth()->user()->id];
        $validate = $request->validated();

        // get data for creating vacancy
        if (isset($worker_id) && isset($validate)) {
            $attributes = array_merge($validate, $worker_id);
            $tags = [];

            //get tags to associate them with vacancy
            if (isset($attributes["tags"])) {
                foreach ($attributes["tags"] as $tag) {
                    array_push($tags, Tag::firstOrCreate(["name" => $tag])->id);
                }
                unset($attributes["tags"]);
            }


            //creating new vacancy
            $vacancy = Vacancy::firstOrCreate($attributes);



            //associate tags with vacancy
            if (!empty($tags)) {
                $vacancy->tags()->sync($tags);
            } else {
                $vacancy->tags()->detach($vacancy->tags->pluck("id"));
            }

            //redirect to vacancy page
            return redirect(route("vacancies-show", $vacancy));
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return view("vacancies.show", ["vacancy" => $vacancy, "tags" => $vacancy->tags, "comments" => $vacancy->comments->reverse()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view("vacancies.edit", ["vacancy" => $vacancy, "tags" => $vacancy->tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVacancyRequest $request, Vacancy $vacancy)
    {
        $attributes = $request->validated();
        $tags = [];

        if (isset($attributes["tags"])) {
            foreach ($attributes["tags"] as $tag) {
                array_push($tags, Tag::firstOrCreate(["name" => $tag])->id);
            }
            $vacancy->tags()->sync($tags);
        } else {
            $vacancy->tags()->detach($vacancy->tags->pluck("id"));
        }



        $vacancy->update($attributes);
        return redirect(route("vacancies-show", $vacancy));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }

    public function addComment(Request $request)
    {
        if ($request->wantsJson() && $request) {
            $user = auth()->user();
            $vacancy = Vacancy::where("id", $request->vacancy_id)->first();
            $text = $request->text;


            if (isset($user) && isset($vacancy) && !empty($text)) {

                $attributes = [
                    "user_id" => $user->id,
                    "vacancy_id" => $vacancy->id,
                    "text" => $text
                ];

                $comment = Comment::updateOrCreate($attributes);

                $data = [
                    "text" => $comment->text,
                    "create_at" => $comment->getDiffDate(),
                    "name" => $user->name,
                    "posted" => __('Posted'),
                    "contact" => __('Contact'),
                ];

                return Response::json($data);
            } else {
                return false;
            }
        }
    }

    public function search(Request $request)
    {
        $tags = [];
        if (isset($request->tags) && !empty($request->tags)) {
            $tags = Tag::whereIn("id", [...$request->tags])->get();
        }

        if (isset($request->search) && !empty($request->search)) {
            $vacancies = Vacancy::where("name", "like", "%{$request->search}%")->orWhere('description', 'LIKE', "%{$request->search}%")->paginate(5);
            if (!empty($tags)) {
                $vacancies = $vacancies->filter(function ($el) use ($tags) {
                    foreach([...$tags->pluck("id")] as $tag){
                        if($el->tags->pluck("id")->contains($tag)) {
                            return true;
                        }
                    }
                    return false;
                });
                $vacancies = Vacancy::whereIn("id", [...$vacancies->pluck("id")])->paginate(5);
                $vacancies->withPath("/vacancies/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token);
            }
            $vacancies->withPath("/vacancies/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token);
            return view("vacancies.vacancies", ["vacancies" => $vacancies, "tags" => Tag::all()]);
        } else if (!empty($tags)) {
            $vacancies = Vacancy::all();

            $vacancies = $vacancies->filter(function ($el) use ($tags) {
                foreach([...$tags->pluck("id")] as $tag){
                    if($el->tags->pluck("id")->contains($tag)) {
                        return true;
                    }
                }
                return false;
            });

            $vacancies = Vacancy::whereIn("id", [...$vacancies->pluck("id")])->paginate(10);
            $vacancies->withPath("/vacancies/search?_token=" . $request->_token . "&search=" . $request->search. "&_token=" . $request->_token);
            
            return view("vacancies.vacancies", ["vacancies" => $vacancies, "tags" => Tag::all()]);
        } else {
            return back();
        }
    }
}
