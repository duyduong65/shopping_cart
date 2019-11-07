<?php


namespace App\Http\Services\implement;

use App\Http\Repositories\ProductRepositoriesInterface;
use App\Http\Services\ProductServicesInterface;
use App\Product;
use Illuminate\Support\Facades\File;

class ProductServices implements ProductServicesInterface
{
    protected $productRepo;
    protected $product;

    public function __construct(ProductRepositoriesInterface $productRepositories, Product $product)
    {
        $this->productRepo = $productRepositories;
        $this->product = $product;
    }

    function getAll()
    {
        $product = $this->product;
        return $this->productRepo->all($product);
    }

    function addProduct($request)
    {
        $product = new Product();
        $product->name = $request->productName;
        $product->price = $request->productPrice;
        $product->origin = $request->productOrigin;
        $product->description = $request->productDescription;

        $image = $request->file('productImage');
        $path = $image->store('upload', 'public');
        $product->image = $path;
        return $this->productRepo->save($product);
    }

    function search($request)
    {
        $search = $request->get('search');
        return $this->productRepo->get($search);
    }

    function destroy($id)
    {
        $product = $this->productRepo->findById($id);
        File::delete(storage_path('/app/public/'.$product->image));
        return $this->productRepo->delete($product);
    }
}
