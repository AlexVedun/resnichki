<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'cover',
        'created_at',
        'updated_at',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
