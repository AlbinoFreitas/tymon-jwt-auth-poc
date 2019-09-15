<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'users' => User::all()
        ]);
    }
}
