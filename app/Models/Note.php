<?php

namespace App\Models;

use App\Models\Ue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function ue()
    {
        return $this->belongsTo(Ue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
