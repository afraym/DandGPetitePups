<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuppyDetails extends Model
{
    use HasFactory;
     protected $fillable = [
        'Photo_Date', 'Gender', 'Size', 
            'Birth_Date', 'Color', 'Available_From', 'Available_To',
            'Champion_Bloodlines', 'Champion_Sired',
            'Vaccinations_And_Dewormings', 'Health_Certificate', 'Health_Record',
            'Health_Warranty','location','puppy_id'
  ];
  //   protected $fillable = [
  //       'puppy_id', 'name', 'value'
  // ];

  public function puppy_detail(): BelongsTo
  {
      return $this->belongsTo(Puppy::class, 'puppy_id');
  }

}
