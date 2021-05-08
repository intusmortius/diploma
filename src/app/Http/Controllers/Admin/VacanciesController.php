<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vacancy\BulkDestroyVacancy;
use App\Http\Requests\Admin\Vacancy\DestroyVacancy;
use App\Http\Requests\Admin\Vacancy\IndexVacancy;
use App\Http\Requests\Admin\Vacancy\StoreVacancy;
use App\Http\Requests\Admin\Vacancy\UpdateVacancy;
use App\Models\Vacancy;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VacanciesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVacancy $request
     * @return array|Factory|View
     */
    public function index(IndexVacancy $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Vacancy::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'author_id', 'name'],

            // set columns to searchIn
            ['id', 'name', 'description', 'about_worker', 'responsibilities', 'requirements', 'personal_skills']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.vacancy.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.vacancy.create');

        return view('admin.vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVacancy $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVacancy $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Vacancy
        $vacancy = Vacancy::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/vacancies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/vacancies');
    }

    /**
     * Display the specified resource.
     *
     * @param Vacancy $vacancy
     * @throws AuthorizationException
     * @return void
     */
    public function show(Vacancy $vacancy)
    {
        $this->authorize('admin.vacancy.show', $vacancy);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vacancy $vacancy
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Vacancy $vacancy)
    {
        $this->authorize('admin.vacancy.edit', $vacancy);


        return view('admin.vacancy.edit', [
            'vacancy' => $vacancy,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVacancy $request
     * @param Vacancy $vacancy
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVacancy $request, Vacancy $vacancy)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Vacancy
        $vacancy->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/vacancies'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/vacancies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVacancy $request
     * @param Vacancy $vacancy
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVacancy $request, Vacancy $vacancy)
    {
        $vacancy->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVacancy $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVacancy $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Vacancy::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
