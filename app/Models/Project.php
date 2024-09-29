<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory,SoftDeletes ;

    protected $fillable = ['name', 'description', 'staff_id', 'status'];
}
