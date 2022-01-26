<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStage extends Model
{
    use HasFactory;

    protected $table = 'task_stages';

    protected $fillable = [
        'id',
        'title',
        'description',
        'user_id',
        'team_id'
    ];

}
