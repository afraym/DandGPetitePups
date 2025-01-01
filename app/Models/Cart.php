<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['puppy_id'];

    public function puppy()
    {
        return $this->belongsTo(Puppy::class);
    }
}
