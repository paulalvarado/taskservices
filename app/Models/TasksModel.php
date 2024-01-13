<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksModel extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey = 'id_task';

    protected $fillable = [
        'task_name',
        'task_description',
        'id_stage',
        'status',
        'created_at',
        'updated_at',
    ];

    public function stages()
    {
        return $this->belongsTo(StagesModel::class, 'id_stage', 'id_stage');
    }
}
