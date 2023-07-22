<?php

namespace App\Models\persons;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPlots extends Model
{
    use HasFactory;

    protected $table = 'customer_plots';
    protected $filables = ['balance','plot_owner'];
}
