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
        $imageFile=$request->file('image');
        $category->image= $imageFile->getClientOriginalName();
        $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());
        $category->name = $request->name;
        $this->categoryRepository->save($category);
    }

    public function edit($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function update($request, $id)
    {
        $category = $this->categoryRepository->findById($id);
        $categoryImage=$category->image;
        if ($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName();
            $category->image=$imageFileName;
            $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());

        }
        else{
            $category->image=$categoryImage;
        }
        $category->name = $request->name;
        $this->categoryRepository->save($category);
    }

    public function delete($id)
    {
        $category = $this->categoryRepository->findById($id);
        $this->categoryRepository->delete($category);
    }
}
