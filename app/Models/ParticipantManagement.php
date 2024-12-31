<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class ParticipantManagement extends Model
{
    use SoftDeletes, HasRoles;

    protected $fillable = [
        'name',
        'rank',
        'status'
    ];
}
