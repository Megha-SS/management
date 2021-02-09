<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'username',
        'distributor_id',
        'status',
        
    ];

    protected $table ='distributors';

}
