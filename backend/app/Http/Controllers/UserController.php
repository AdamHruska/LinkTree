<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all(['id', 'name', 'surename', 'image_source', 'bio',]);
        return response()->json($users);
    }
}
