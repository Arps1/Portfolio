<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'pesan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

?>