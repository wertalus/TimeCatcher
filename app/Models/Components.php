<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Components extends Model
{
    use HasFactory;

    public function Department(): HasOne
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
    
    public function Cell(): HasOne
    {
        return $this->hasOne(Cell::class,'id','cell_id');
    }



}
