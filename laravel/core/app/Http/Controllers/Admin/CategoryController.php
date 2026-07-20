<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $pageTitle  = 'Manage Categories';
        $categories = Category::latest()->paginate(15);
        return view('admin.category.index', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|in:0,1',
            'icon' => 'nullable|string|max:50',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->icon_class = $request->icon ?? 'fas fa-tag';
        $category->seo_title = $request->seo_title;
        $category->seo_description = $request->seo_description;
        $category->seo_keywords = $request->seo_keywords;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|in:0,1',
            'icon' => 'nullable|string|max:50',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->icon_class = $request->icon ?? 'fas fa-tag';
        $category->seo_title = $request->seo_title;
        $category->seo_description = $request->seo_description;
        $category->seo_keywords = $request->seo_keywords;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.category.index')->with('error', 'Cannot delete category containing products.');
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully');
    }
}
