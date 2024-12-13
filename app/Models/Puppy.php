<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Puppy extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'name', 'price', 'photoDate', 'gender', 'size', 
        'birthDate', 'color', 'availableFrom', 'availableTo',
        'puppyDescHtml', 'ChampionBloodlines', 'ChampionSired',
        'VaccinationsAndDewormings', 'HealthCertificate', 'HealthRecord',
        'HealthWarranty', 'videoPreview','user_id','breed_id','shortDescHtml'
  ];

  public function puppy_images(): HasMany
  {
      return $this->hasMany(PuppyImage::class);
  }

  
  public function puppy_details(): HasMany
  {
      return $this->hasMany(PuppyDetails::class);
  }
}
