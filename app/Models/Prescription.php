<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'doctor_name',
        'date',
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'prescription_medicine')
                    ->withPivot('quantity');
    }
}
