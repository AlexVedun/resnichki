<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferMedia extends Model
{
    protected $table = 'offer_media';

    protected $primaryKey = 'id';

    protected $fillable = [
        'offer_details_id',
        'type',
        'path_to_file',
        'created_at',
        'updated_at',
    ];

    public function offerDetails()
    {
        return $this->belongsTo(OfferDetails::class, 'id', 'offer_details_id');
    }
}
