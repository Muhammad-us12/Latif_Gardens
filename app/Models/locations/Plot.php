<?php

namespace App\Models\locations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    public function Plotlocation()
    {
        return $this->belongsTo(\App\Models\Location::class,'location_id');
    }

    public function PlotSociety()
    {
        return $this->belongsTo(\App\Models\locations\Societies::class,'society_id');
    }

    public function PlotBlock()
    {
        return $this->belongsTo(\App\Models\locations\Blocks::class,'block_id');
    }

    public function PlotMaral()
    {
        return $this->belongsTo(\App\Models\locations\Marala::class,'marala_type');
    }
}
