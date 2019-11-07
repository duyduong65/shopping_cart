<?php


namespace App;


use Illuminate\Support\Facades\Session;

class Cart
{
    public $items = null;
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    function addToCart($product)
    {
        $storeItem = [
            "item" => $product,
            "totalPrice" => 0,
            "totalQty" => 0
        ];
        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $storeItem = $this->items[$product->id];
                $this->totalQty = count($this->items);
            } else {
                $this->totalQty++;
            }
        } else {
            $this->totalQty++;
        }

        $storeItem['totalQty']++;
        $storeItem['totalPrice'] = $storeItem['totalQty'] * $product->price;

        $this->items[$product->id] = $storeItem;
        $this->totalPrice += $product->price;
    }

    function remove($id)
    {
        if ($this->items) {
            $itemsIntoCart = $this->items;
            if (array_key_exists($id, $itemsIntoCart)) {
                $priceSubtraction = $itemsIntoCart[$id]['totalPrice'];
                $this->totalPrice -= $priceSubtraction;
                $this->totalQty--;
                unset($itemsIntoCart[$id]);
                $this->items = $itemsIntoCart;
            }
        }
    }

    function plus($id)
    {
        if ($this->items) {
            $itemsIntoCart = $this->items;
            if (array_key_exists($id, $itemsIntoCart)) {
                $pricePlus = $itemsIntoCart[$id]['item']->price;
                $this->totalPrice += $pricePlus;
                $itemsIntoCart[$id]['totalQty']++;
                $itemsIntoCart[$id]['totalPrice'] += $pricePlus;
                $this->items = $itemsIntoCart;
            }
        }
    }

    function subtraction($id)
    {
        if ($this->items) {
            $itemsIntoCart = $this->items;
            if (array_key_exists($id, $itemsIntoCart)) {
                if ($itemsIntoCart[$id]['totalQty'] == 1) {
                    $priceSubtraction = $itemsIntoCart[$id]['totalPrice'];
                    $this->totalPrice -= $priceSubtraction;
                    $this->totalQty--;
                    unset($itemsIntoCart[$id]);
                    $this->items = $itemsIntoCart;
                } else {
                    $pricePlus = $itemsIntoCart[$id]['item']->price;
                    $this->totalPrice -= $pricePlus;
                    $itemsIntoCart[$id]['totalQty']--;
                    $itemsIntoCart[$id]['totalPrice'] -= $pricePlus;
                    $this->items = $itemsIntoCart;

                }
            }
        }
    }
}
