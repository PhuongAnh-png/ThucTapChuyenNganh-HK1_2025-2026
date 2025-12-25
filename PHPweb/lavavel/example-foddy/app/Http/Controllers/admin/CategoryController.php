<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share(['categories'=>$categories]);
    }


    public function index(){
        $categories = Category::all();
        return view('category.category',compact('categories'));
    }
    public function create(){
        return view('category.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|in:0,1',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category = Category::create([
            'name'   => $request->name,
            'image'  => $imagePath,
            'status' => $request->input('status', 0),
        ]);

        if ($category) {
            return redirect()->route('admin.category.index');
        }

        return back();
    }
    public function show($id){
        return redirect()->route('admin.category.edit', ['category' => $id]);
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
   public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|in:0,1',
            'image' => 'nullable|image|max:2048',
        ]);

        $category = Category::findOrFail($id);

        $data = [
            'name'   => $request->name,
            'status' => $request->input('status', 0),
        ];

        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Updated successfully!');
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        if($category)

            return redirect()->route('admin.category.index');
        else
            return back();
    }
    /////////////////////////////////////////
}
