<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Offer extends Model
{
    protected $table = 'offers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'short_descr',
        'category_id',
        'user_id',
        'cover',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'user_id',
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
        return $this->hasMany(News::class);
    }

    public function details()
    {
        return $this->hasOne(OfferDetails::class);
    }
}
