<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_name',
        'hosting_id',
        'user_id',
        'expiration_date',
        'status',
        'created_at',
        'updated_at'
    ];

    public function hosting()
    {
        return $this->belongsTo(Hosting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
