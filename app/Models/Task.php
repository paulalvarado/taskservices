<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id_task';
    protected $fillable = ['task_title', 'task_description', 'create_at', 'update_at', 'id_status'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
