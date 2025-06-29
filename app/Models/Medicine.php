<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

   protected $fillable = [
'name',
'brand',
'quantity',
'stock', // include this
'price_per_unit',
'expiry_date',
'supplier_id',
];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_medicine')
                    ->withPivot('quantity');
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class, 'med_id');
    }
}
