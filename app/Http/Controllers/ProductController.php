<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\ProductServicesInterface;
use App\Product;
use GuzzleHttp\Client;
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
        abort(403, "Bạn không có quyền");
    }

    public function store(CreateProductRequest $request)
    {
        if (Gate::allows('crud-product')) {
            $this->productServices->addProduct($request);
            return redirect()->route('home');
        }
        abort(403, "Bạn không có quyền");
    }

    function search(Request $request)
    {
        $search = $request->get('search');
        $products = $this->productServices->search($search);

//        return view('layouts.app',compact('search'));
        return view('products.home', compact('products'));
    }

    function destroy($id)
    {
        $this->productServices->destroy($id);
        return redirect()->route('home');
    }

    function edit($id)
    {
        if (Gate::allows('crud-product')) {
            $product = $this->productServices->edit($id);
            return view('products.edit', compact('product'));
        }
        abort(403, "Bạn không có quyền");
    }

    function update($id, UpdateProductRequest $request)
    {
        if (Gate::allows('crud-product')) {
            $this->productServices->update($request, $id);
            return redirect()->route('home');
        }
        abort('403', "Bạn không có quyền");
    }

}
