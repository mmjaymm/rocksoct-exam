<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'due_dates',
        'assigned_by',
        'assigned_date',
    ];
}
