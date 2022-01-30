<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fc extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fc()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
