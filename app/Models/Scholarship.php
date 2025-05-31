<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'deadline',
        'eligibility',
        'education_level',
        'provider',
        'required_documents',
        'contact_email',
        'contact_phone',
    ];
    

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
