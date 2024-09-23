<?php

namespace App\Http\Controllers;

use App\Models\TaskComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_task_id' => 'required|exists:user_tasks,id',
            'comment' => 'required',
        ]);

        $comment_details = [
            'user_task_id' => $request->user_task_id,
            'comment' => $request->comment,
            'comment_by' => Auth::user()->id,
            'parent_id' => $request->parent_id ?? null
        ];

        $comments = TaskComments::create($comment_details);

        return response()->json($comments);
    }
}
