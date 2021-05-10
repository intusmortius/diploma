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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
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
}
