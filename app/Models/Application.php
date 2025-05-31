<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_id',
        'full_name',
        'email',
        'cv_path',
    ];
    public function scholarship()
{
    return $this->belongsTo(Scholarship::class);
}
    public function student()
{
    return $this->belongsTo(User::class, 'email', 'email');
}
public function user()
    {
        return $this->belongsTo(User::class);
    }
}