<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSlug extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'slug',
        'deleted_date',
    ];
}
