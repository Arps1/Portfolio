<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'file',
        'link',
        'user_id',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
