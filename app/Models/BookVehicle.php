<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookVehicle extends Model
{
    use HasFactory;

    protected $table = 'book_vehicle';

    protected $fillable = ['start_date', 'end_date', 'return_date', 'total_cost', 'vehicle_id', 'customer_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
