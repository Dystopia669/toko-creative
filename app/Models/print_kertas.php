<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class print_kertas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function print()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
