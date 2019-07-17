<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'news',
        'offer_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
