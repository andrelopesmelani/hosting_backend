<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'price',
        'plan',
        'description',
        'created_at',
        'updated_at',
    ];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
