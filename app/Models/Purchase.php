<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Purchase extends Model
{
    use HasFactory;
   use SoftDeletes;
    protected $fillable = [
        'id',
        'productid',
        'productquantity',
        'productprice',
        'shop_id',
        'staff_id',
        'status'
        
    ];
    protected $table ='purchases';
}
