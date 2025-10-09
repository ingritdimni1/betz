<?php

namespace VanguardLTE
{
    class Security extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'securities';

        protected $fillable = [
            'type',
            'item_id',
            'pay_in',
            'pay_out',
            'pay_total',
            'balance',
            'bank',
            'rtp',
            'count',
            'view',
            'shop_id',
            'created_at',
            'sms',
            'block',
            'category',
            'win',
        ];

        public $timestamps = false;

        public static function boot()
        {
            parent::boot();
        }

        public function shop()
        {
            return $this->belongsTo(\VanguardLTE\Shop::class);
        }

        public function game()
        {
            return $this->belongsTo(\VanguardLTE\Game::class, 'item_id', 'id');
        }

        public function user()
        {
            return $this->belongsTo(\VanguardLTE\User::class, 'item_id', 'id');
        }
    }

}
