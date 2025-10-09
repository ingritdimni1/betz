<?php

namespace VanguardLTE
{
    class SMSMailing extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'sms_mailings';

        protected $fillable = [
            'theme',
            'message',
            'roles',
            'priority',
            'date_start',
            'status',
            'statuses',
            'shop_id',
        ];

        public $timestamps = false;

        public static function boot()
        {
            parent::boot();
        }

        public function user()
        {
            return $this->belongsTo(\VanguardLTE\User::class);
        }

        public function sms_messages()
        {
            return $this->hasMany(\VanguardLTE\SMSMailingMessage::class, 'sms_mailing_id', 'id');
        }
    }

}
