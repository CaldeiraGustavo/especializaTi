<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    protected $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request    = $request;
        $this->repository = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->paginate(15);
        return view('admin.pages.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        if($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->find($id);
        return view('admin.pages.products.show', [
            'product' => $product
        ]);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);
        return view('admin.pages.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductsRequest $request, $id)
    {
        $product = $this->repository->find($id);
        
        if(!$product) 
            return redirect()->back();

        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid()) {

            if($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->find($id);
        
        if(!$product) 
            return redirect()->back();

        $product->delete();
        return redirect()->route('products.index');
    }

    public function search()
    {
        $filters = $this->request->except('_token');
        $products = $this->repository->search($this->request->filter);
        return view('admin.pages.products.index', [
            'products' => $products,
            'filters'  => $filters
        ]);
    }
}
