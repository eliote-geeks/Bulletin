<?php

namespace App\Models;

use App\Models\Ue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semestry extends Model
{
    use HasFactory;

    public function ues()
    {
        return $this->hasMany(Ue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
