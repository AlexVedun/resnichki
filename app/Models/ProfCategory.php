<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfCategory extends Model
{
    protected $table = 'prof_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category',
        'created_at',
        'updated_at',
    ];

    public function user_details()
    {
        return $this->hasMany(UserDetails::class);
    }
}
