<?php

namespace VanguardLTE\Services\Logging\UserActivity;

use Illuminate\Database\Eloquent\Model;
use VanguardLTE\User;

class Activity extends Model
{
    const UPDATED_AT = null;

    protected $table = 'user_activity';

    protected $fillable = ['old', 'description', 'user_id', 'type', 'system', 'item_id', 'ip_address', 'user_agent',
        'country', 'city', 'os', 'device', 'browser', 'shop_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
