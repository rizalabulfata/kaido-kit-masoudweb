<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    const COMPLETED = 1;
    const CANCELLED = 2;
    const EDITED = 3;

    /** @use HasFactory<\Database\Factories\TransactionsFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = [];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public static function getStatusLabel($status = null): string|array
    {
        $data = [
            self::COMPLETED => 'Berhasil',
            self::CANCELLED => 'Batal',
            self::EDITED => 'Berubah'
        ];

        return !empty($status) ? (isset($data[$status]) ? $data[$status] : $data) : $data;
    }
}
