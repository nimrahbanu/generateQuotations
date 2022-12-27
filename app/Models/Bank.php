<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable=[
        'bank_name',
        'deleted_date',
    ];
    public function bank_info(){
        return $this->hasOne('App\Models\bank', 'id' , 'bank_name');
    }
    
}