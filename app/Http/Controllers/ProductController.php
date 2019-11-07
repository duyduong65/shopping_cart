<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Services\ProductServicesInterface;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class productController extends Controller
{
    protected $productServices;

    public function __construct(ProductServicesInterface $productServices)
    {
        $this->middleware('auth');
        $this->productServices = $productServices;
    }

    public function index()
    {
        $products = $this->productServices->getAll();
        return view('products.home', compact('products'));
    }


    public function create()
    {
        if (Gate::allows('crud-product')) {
            return view('products.create');
        }
        abort(403, "ban k co quyen");
    }

    public function store(CreateProductRequest $request)
    {
        if (Gate::allows('crud-product')) {
            $this->productServices->addProduct($request);
            return redirect()->route('home');

        }
        abort(403, "ban k co quyen");
    }

    function search(Request $request)
    {
        $products = $this->productServices->search($request);
        return view('products.home', compact('products'));
    }

    function destroy($id)
    {
        $this->productServices->destroy($id);
        return redirect()->route('home');
    }


}
