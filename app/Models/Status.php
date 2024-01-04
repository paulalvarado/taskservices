<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = ['status'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'id_status');
    }

    public function stages()
    {
        return $this->hasMany(Stage::class, 'id_status');
    }
}
