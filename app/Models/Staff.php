<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'user_id',
        'username',
        'distributor_id',
        'status',
        
    ];

    protected $table ='staffs';
        
    

}
