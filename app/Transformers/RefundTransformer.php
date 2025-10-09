<?php

namespace VanguardLTE\Transformers;

use League\Fractal\TransformerAbstract;
use VanguardLTE\Refund;

class RefundTransformer extends TransformerAbstract {
    public function transform(Refund $refund){
        return [
            'id' => $refund->id,
            'min_pay' => $refund->min_pay,
            'max_pay' => $refund->max_pay,
            'percent' => $refund->percent,
            'min_balance' => $refund->min_balance,
            'status' => $refund->status,
            'shop_id' => $refund->shop_id,
        ];
    }
}
