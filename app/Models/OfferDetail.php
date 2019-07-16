<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferDetail extends Model
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
}
