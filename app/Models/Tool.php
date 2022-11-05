<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    public function typeTranslator(String $type) {
        if ($type === "pesticide") return "ยาฆ่าแมลง";
        else if ($type === "herbicide") return "ยาฆ่าหญ้า";
        else if ($type === "fertilizer") return "ปุ๋ย";
        else return "อื่น ๆ";
    }
}
