<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Provider;
class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'price',
        'provider_id',
    ];
    public function getDescriptionAtribute($value){
        return substr($value, 1,120);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
