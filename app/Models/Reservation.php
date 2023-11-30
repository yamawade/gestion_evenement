<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_place',
        'evenement_id',
        'user_id',
    ];


    public function user(){
        return ($this->belongsTo(User::class,'user_id'));
    }
}
