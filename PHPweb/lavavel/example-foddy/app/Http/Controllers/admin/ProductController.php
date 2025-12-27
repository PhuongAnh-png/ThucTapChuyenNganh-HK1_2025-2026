<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(){
        $products = Products::with('category')->orderBy('created_at', 'desc')->get();
        return view('products.products', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('products.add', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'gia' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|in:0,1',
            'image' => 'nullable|image|max:2048',
        ]);

        $categoryId = $request->input('category_id') ?? $request->input('idCategory') ?? null;

        $data = [
            'name'        => $request->name,
            'gia'         => $request->gia,
            'category_id' => $categoryId,
            'status'      => $request->input('status', 0),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        try {
            Products::create($data);
        } catch (\Exception $e) {
            Log::error('Failed to create product', ['error' => $e->getMessage(), 'data' => $data]);
            return back()->withInput()->withErrors('Unable to save product. Please check server logs.');
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function show($id){    }

    public function edit($id){
        $products = Products::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('products', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        // debug log
        Log::info('Product update requested', ['id' => $id, 'input' => $request->all()]);

        $request->validate([
            'name' => 'required|string',
            'gia' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|max:2048',
        ]);

        $categoryId = $request->input('category_id') ?? $request->input('idCategory') ?? null;

        $data = [
            'name'        => $request->name,
            'gia'         => $request->gia,
            'category_id' => $categoryId,
            'status'      => $request->input('status', 0),
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('products', $fileName, 'public');
            $data['image'] = $path;
        }

        try {
            $product->update($data);
            $product->refresh();
            Log::info('Product updated successfully', ['id' => $product->id, 'product' => $product->toArray()]);
        } catch (\Exception $e) {
            Log::error('Failed to update product', ['error' => $e->getMessage(), 'data' => $data, 'id' => $id]);
            return back()->withInput()->withErrors('Unable to update product. Please check server logs.');
        }

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công!' . $product->status);
    }

    public function destroy($id){
        $product = Products::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index');
    }

    /**
     * Public frontend method to show a product
     */
    public function frontendShow($id)
    {
        $product = Products::with('category')->findOrFail($id);
        $related = Products::where('category_id', $product->category_id)
                           ->where('id', '!=', $product->id)
                           ->take(4)
                           ->get();

        return view('home.single_product', compact('product', 'related'));
    }

    public function showProductsForUser()
    {
        // get categories (only active ones) for the frontend filter
        $categories = Category::where('status', 1)->get();

        // get frontend products (active, with active category relation)
        $products = Products::with('category')->where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('product', compact('products', 'categories'));
    }
}
