<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SendersController extends Controller
{
    public function index()

    {
        // return User::orderBy('name')->where('id', '!=', auth()->user()->id)->get();
        return auth()->user()->chatable;
    }
}
