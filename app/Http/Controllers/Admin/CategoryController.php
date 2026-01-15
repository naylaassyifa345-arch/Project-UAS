<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:categories',
            'deskripsi' => 'nullable',
        ]);

        Category::create($request->all());

        return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'nama' => 'required|unique:categories,nama,' . $category->id,
            'deskripsi' => 'nullable',
        ]);

        $category->update($request->all());

        return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
