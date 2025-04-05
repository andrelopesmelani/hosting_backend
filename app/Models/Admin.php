<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'created_at',
        'updated_at'
    ];
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
