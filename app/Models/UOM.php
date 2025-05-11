<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UOM extends Model
{
    /** @use HasFactory<\Database\Factories\UOMFactory> */
    use HasFactory;

    protected $table = 'uoms';

    // add fillable
    protected $fillable = [];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
