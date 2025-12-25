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
            'image' => 'nullable|image|max:2048',
        ]);

        // Accept legacy 'idCategory' as fallback until DB and clients are migrated
        $categoryId = $request->input('category_id') ?? $request->input('idCategory') ?? null;

        $data = [
            'name'        => $request->name,
            'gia'         => $request->gia,
            'category_id' => $categoryId,
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

        $request->validate([
            'name' => 'required|string',
            'gia' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Accept legacy 'idCategory' as fallback
        $categoryId = $request->input('category_id') ?? $request->input('idCategory') ?? null;

        $data = [
            'name'        => $request->name,
            'gia'         => $request->gia,
            'category_id' => $categoryId,
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        try {
            $product->update($data);
        } catch (\Exception $e) {
            Log::error('Failed to update product', ['error' => $e->getMessage(), 'data' => $data, 'id' => $id]);
            return back()->withInput()->withErrors('Unable to update product. Please check server logs.');
        }

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id){
        $product = Products::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
