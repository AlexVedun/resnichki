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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function news()
    {
        return $this->hasOne(News::class);
    }
}
