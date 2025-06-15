<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutSection extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        
        'Description',
        'image',
        'update_at',
        'created_at',];
    

    // If you don't use timestamps (created_at, updated_at), set this to false
    public $timestamps = true; 
}
