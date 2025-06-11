<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'Description',
        'image',
        'update_at',
        'created_at',];

    // If you don't use timestamps (created_at, updated_at), set this to false
    public $timestamps = true; 
}
