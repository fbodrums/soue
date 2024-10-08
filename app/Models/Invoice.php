<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function phones()
    {
        return $this->hasMany(InvoicePhone::class);
    }
}
