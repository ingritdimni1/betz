<?php 
namespace VanguardLTE
{
    class ShopDevices extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'shops_devices';
        protected $fillable = [
            'shop_id', 
            'device'
        ];
        public static function boot()
        {
            parent::boot();
        }
        public function shop()
        {
            return $this->belongsTo('VanguardLTE\Shop', 'shop_id');
        }
    }

}
