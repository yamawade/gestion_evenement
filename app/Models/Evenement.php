<?php

namespace App\Models;

use App\Models\Association;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'date_limite_inscription',
        'description',
        'image',
        'lieu',
        'est_cloturer_ou_pas',
        'date_evenement',
        'association_id',
    ];


    public function association(){
        return ($this->belongsTo(Association::class,'association_id'));
    }
}
