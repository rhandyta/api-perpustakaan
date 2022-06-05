<?php
namespace App\Services;


use App\Interfaces\CategoryInterface;

class CategoryService {

    protected $category;

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $category = $this->category->index();
        return $category;
    }

    public function store($data)
    {
        $data['slug'] = \Str::slug($data['category_name']);
        $category = $this->category->store($data);
        return $category;
    }

    public function show($id)
    {
        $category = $this->category->show($id);
        return $category;
    }

    public function update($id, $data)
    {
        $category = $this->category->update($id, $data);
        return $category;
    }

    public function destroy($data)
    {
        $categories = [];
        foreach($data as $categoryId) {
            array_push($categories, $categoryId);
        }
        $category = $this->category->destroy($categories);
        if($category > 0) {
            return 'Data has been deleted';
        }
        return 'Data not found';
    }

}