<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
     
    public function index()
    {
        $categories = Category::all();
        $title = 'Categories list';

        return view('admin/categories/index', compact('categories', 'title'));
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            if (!$category) {
                throw new Exception('category can not create!');
            }

            return redirect()->route('admin.category.index')->with('success_message', 'category created successful!');
        } catch (Exception $exception) {
            Log::error(message: $exception->getMessage());
            return redirect()->route(route: 'admin.category.create')->with('error_message', 'category create failed!');
        }
    }

    public function show(category $category)
    {
        return view('admin/category/show', compact('category'));
    }
}
