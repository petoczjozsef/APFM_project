<?php

namespace App\Persistence\Model;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $table = "buildings";
    const UPDATED_AT = null;

    protected $fillable = ['building_name', 'building_address'];

    public function owner(){
        return $this->belongsToMany(Owner::class);
    }
}
