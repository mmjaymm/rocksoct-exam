<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_tasks_id',
        'comments',
        'parent_id',
    ];
}
