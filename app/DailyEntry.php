<?php

namespace VanguardLTE
{
    class DailyEntry extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'daily_entries';

        protected $fillable = [
            'day',
            'min_progress',
            'max_progress',
            'min',
            'max',
            'wager',
            'status',
            'shop_id',
        ];

        public static $values = [
            'wager' => [
                '1' => 'x1',
                '2' => 'x2',
                '3' => 'x3',
                '4' => 'x4',
                '5' => 'x5',
                '10' => 'x10',
            ],
        ];

        public static function boot()
        {
            parent::boot();
            self::deleting(function ($model) {});
        }
    }

}
