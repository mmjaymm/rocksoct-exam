<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Tasks;
use App\Models\UserTasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Inertia::render('Users/List', compact('users'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    public function tasks(Request $request)
    {
        $tasks = UserTasks::where(function ($query) {
            $query->where('user_id', Auth::user()->id)->orWhere('assigned_by', Auth::user()->id);
        })->get();

        return response()->json($tasks);
    }
}
