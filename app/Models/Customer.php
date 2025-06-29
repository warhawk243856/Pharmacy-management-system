<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
    ];

    // A customer can have many prescriptions
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    // A customer can have many sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
