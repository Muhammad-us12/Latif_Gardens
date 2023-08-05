<?php

namespace App\Models\persons;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPlots extends Model
{
    use HasFactory;

    protected $table = 'customer_plots';
    protected $fillable = ['balance','plot_owner','plot_owner_change_id','plot_re_sale_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
