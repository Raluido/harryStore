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
            if ($product->quantity > 1) {
                $shippingCost = $product->shippingPrice + 0.1 * (($product->quantity - 1) * $product->shippingPrice);
            }
        } else {
            $totalProducts = 0;
            $mayority = false;
            foreach ($products as $key => $value) {
                $value->ratio = $value->quantity / $totalProductsCategories;
                $totalProducts += $value->quantity;
                if($value->ratio > 0.5){
                    $mayority = true;
                }
            }

            if(){
                $shippingCost = $categoryMayor->shippingPrice;
                    for ($i = 1; $i < $product->quantity; $i++) {
                        $shippingCost += 0.1 * $totalAmount;
                    } 
            }
        }
    }
}
