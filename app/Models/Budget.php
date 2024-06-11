<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'quotation_id', 'status', 'total_price'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('price');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
