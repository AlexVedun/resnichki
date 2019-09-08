<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'avatar',
        'prof_category_id',
        'contact_name',
        'phone',
        'mobile_1',
        'mobile_2',
        'mobile_3',
        'viber',
        'whats_up',
        'telegram',
        'skype',
        'vkontakte',
        'web_site',
        'instagram',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prof_category()
    {
        return $this->belongsTo(ProfCategory::class, 'prof_category_id', 'id');
    }
}
