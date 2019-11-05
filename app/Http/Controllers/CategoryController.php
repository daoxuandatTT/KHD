<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use App\Service\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.table.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.table.category.create');
    }

    public function store(Request $request)
    {
        $this->categoryService->store($request);
        Session::flash('message', 'Add successfully');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->categoryService->edit($id);
        return view('admin.table.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->categoryService->update($request, $id);
        Session::flash('message', 'Update successful');
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        Session::flash('message', 'Delete successful');
        return redirect()->route('category.index');
    }
}
