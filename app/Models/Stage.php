<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';
    protected $primaryKey = 'id_stage';
    protected $fillable = ['stage_title', 'stage_description', 'id_status'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}

