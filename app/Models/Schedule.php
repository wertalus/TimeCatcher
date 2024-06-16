<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    public function Component(): HasOne
    {
        return $this->hasOne(Components::class,'id','component_id');

    }
    public function Cell(): HasOne
    {
        return $this->hasOne(Cell::class,'id','cell_id');
    }

    public function Status(): HasOne
    {
        return $this->hasOne(Status::class,'id','status_id');
    }

    public function QC(): HasOne
    {
        return $this->hasOne(NdtList::class,'id','ndt_list_id');
    }

    protected static function boot()
    {

        parent::boot();

        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = $model->updated_by = auth()->user()->name;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = $model->updated_by = auth()->user()->name;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->name;
            }
        });


    }
}
