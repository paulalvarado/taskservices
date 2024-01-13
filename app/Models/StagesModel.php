<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StagesModel extends Model
{
    use HasFactory;

    protected $table = 'stages';
    protected $primaryKey = 'id_stage';

    protected $fillable = [
        'stage_name',
        'status',
        'created_at',
        'updated_at',
    ];

    public function tasks()
    {
        return $this->hasMany(TasksModel::class, 'id_stage', 'id_stage');
    }
}
