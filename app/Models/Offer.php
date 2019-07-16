<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'cover',
        'created_at',
        'updated_at',
    ];
}
