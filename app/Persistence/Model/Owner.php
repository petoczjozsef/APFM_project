<?php

namespace App\Persistence\Model;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $table = "owners";
    const UPDATED_AT = null;

    protected $fillable = ['name', 'contact_email'];

    public function buildings() {
        return $this->belongsToMany(Building::class);
    }
}
