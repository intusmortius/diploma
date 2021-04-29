<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function home()
    {
        $all_users = User::with('roles')->get();
        $users = $all_users->filter(function ($user) {
            return $user->hasRole('worker');
        });
        $pagination_users = $this->paginate($users, 8);
        return view('home', ['users' => $pagination_users]);
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
