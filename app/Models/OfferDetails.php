<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferDetails extends Model
{
    protected $table = 'offer_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'offer_id',
        'description',
        'is_video',
        'is_photo',
        'is_audio',
        'created_at',
        'updated_at',
    ];

    protected $touches = ['offer'];

    public function offerMedia()
    {
        return $this->hasMany(OfferMedia::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }
}
