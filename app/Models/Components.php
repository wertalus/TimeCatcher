<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Components extends Model
{
    //use HasFactory;

    public function DepartmentName(): HasOne
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
}
