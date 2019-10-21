<?php


namespace App\Service\Impl;


use App\Category;
use App\Repositories\Contract\CategoryRepositoryInterface;
use App\Service\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function store($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->image = $request->image;
        $this->categoryRepository->save($category);
    }

    public function edit($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function update($request, $id)
    {
        $category = $this->categoryRepository->findById($id);
        $category->name = $request->name;
        $category->image = $request->image;
        $this->categoryRepository->save($category);
    }

    public function delete($id)
    {
        $category = $this->categoryRepository->findById($id);
        $this->categoryRepository->delete($category);
    }
}
