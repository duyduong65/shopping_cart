<?php


namespace App\Http\Repositories\eloquent;


use App\Http\Repositories\ProductRepositoriesInterface;
use App\Product;


class ProductEloquent implements ProductRepositoriesInterface
{

    function save($obj)
    {
        return $obj->save();
    }

    function all($obj)
    {
        return $obj->all();
    }

    function search($string)
    {
        $product = new Product();
        return $product->where('name', 'like', "%$string%")->get();
    }

    function findById($id)
    {
        $product = new Product();
        return $product->findOrFail($id);
    }

    function delete($obj)
    {
        return $obj->delete();
    }
}
