<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Items extends Model
{
    /** @use HasFactory<\Database\Factories\ItemsFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = [];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ItemCategory::class, 'item_categories_id');
    }

    public function uom(): BelongsTo
    {
        return $this->belongsTo(UOM::class, 'uoms_id');
    }
}
