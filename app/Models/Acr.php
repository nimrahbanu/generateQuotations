<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acr extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'client_name',
        'email_id',
        'contact_no',
        'district',
        'state_id',
        'whatsapp_no',
        'package_id',
        'request_type',
        'final_ammount',
        'bank_id',
        'deposit_date',
        'payment_mode',
        'neft_payment',
        'amount',
        'advance_amount',
        'narration',
        'attachment',
        'deleted_date',
    ];
    public function state_info(){
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
    public function bank_info(){
        return $this->hasOne('App\Models\Bank', 'id', 'bank_id');
    }
    public function package_info(){
        return $this->hasOne('App\Models\Package', 'id', 'package_id');
    }
}