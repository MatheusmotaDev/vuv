<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'quotation_id', 'total_price', 'status'];

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'budget_item')->withPivot('price');
    }
}
