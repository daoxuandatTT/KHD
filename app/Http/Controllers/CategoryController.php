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
        return view('category.list', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategory $request)
    {
        $this->categoryService->store($request);
        Session::flash('message', 'Add successfully');
        return redirect()->route('category.list');
    }

    public function edit($id)
    {
        $category = $this->categoryService->edit($id);
        return view('category.edit', compact('category'));
    }

    public function update(UpdateCategory $request, $id)
    {
        $this->categoryService->update($request, $id);
        Session::flash('message', 'Update successful');
        return redirect()->route('category.list');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        Session::flash('message', 'Delete successful');
        return redirect()->route('category.list');
    }
}
