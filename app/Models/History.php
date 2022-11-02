<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
