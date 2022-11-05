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

    public function quntity(History $history){
        $number = ($history->current_quantity) -($history->old_quantity) ;
        if($number > 0){
            return str($number) ;
        }
        $number = $number *(-1);
        return str($number) ;
    }

    public function quntityUpdate(History $history){
        $number = ($history->current_quantity) -($history->old_quantity) ;
        if($number > 0){
            return str($number) ;
        }
        $number = $number *(-1);
        return str($number) ;
    }

    public function translateStatus(History $history){
        if($history->status == "Increase"){
            return "เพิ่มอุปกรณ์";
        }else if ($history->status == "Decrease") return "ใช้อุปกรณ์";
        else{
            return "ถูกสร้างขึ้นมา";
        }
    }
}
