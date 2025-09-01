<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Product::class , 'product');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ]);


        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('products', 'public');
        }
        $validatedData['user_id'] = auth()->id();

        $category = Category::findOrFail($request->category_id);
        $validatedData['category_name'] = $category->name;

        Product::create($validatedData);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail(111);
        dd($product);
        return view('products.show',  ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:30000',

        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('products', 'public');
        }

        $validatedData['user_id'] = auth()->id();
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');

    }

    public function getAjax(Request $request)
    {
        return view('ajax.index');
    }

    public function test()
    {
        $categories = Category::all();

        return view('products.test', compact('categories'));
    }

    public function dbStore(Request $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
        ]);

        $category = Category::findOrFail($request->category_id);
        $validatedData['category_name'] = $category->name;
        // $validatedData['user_id'] = auth()->id();

        Product::create($validatedData);
        DB::commit();
        return redirect()->route('products.index')->with('success', 'Product created successfully.');

        }catch (\Exception $e) {
            DB::rollBack(); 
            return redirect()->route('products.index')->with('error', 'Failed to create product.' . $e->getMessage());
        }
    }

}
