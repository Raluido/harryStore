<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function calculateShippingPrice($products)
    {
        $totalProductsCategories = count($products);

        if ($totalProductsCategories == 1) {
            $product = $products[0];
            return $this->pricePerCategory($product->price, $product->quantity);
        } else {
            $temp = 0;
            $shippingCostMedia = 0;
            $totalQuantity = 0;
            foreach ($products as $key => $value) {
                $totalQuantity += $value->quantity;
                $value->ratio = $value->quantity / $totalProductsCategories;
                $shippingCostMedia += $this->pricePerCategory($value->shippingPrice, $value->quantity);
                if ($value->ratio > 0.5 && $value->ratio > $temp) {
                    $shippingCostMayorityPerUnity = $value->shippingPrice;
                    $temp = $value->ratio;
                }
            }

            if ($shippingCostMayorityPerUnity > 0) {
                return $this->pricePerCategory($shippingCostMayorityPerUnity, $totalQuantity);
            } else {
                return $shippingCostMedia;
            }
        }
    }

    public function pricePerCategory($singlePrice, $quantity)
    {
        return $singlePrice * (1 + 0.1 * $quantity);
    }
}
