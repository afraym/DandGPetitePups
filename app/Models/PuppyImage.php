<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuppyImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function puppy_image(): BelongsTo
    {
        return $this->belongsTo(Puppy::class, 'puppy_id');
    }

}
