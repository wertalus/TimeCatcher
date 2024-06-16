<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cell extends Model
{
    use HasFactory;

    public function Department(): HasOne
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
}
