<?php
namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface {

    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $category = $this->category::orderBy('category_name', 'desc')->paginate(25);
        return $category; 
    }

    public function store($data)
    {
        $category = $this->category::create($data);
        return $category;
    }

    public function show($id)
    {
        $category = $this->category::where('id', $id)
            ->orWhere('slug', $id)
            ->get();
        return $category;
    }

    public function update($id, $data)
    {
        $category = $this->category->findOrFail($id);
        $category->fill($data);
        $category->save();
        return $category;
    }

    public function destroy($data)
    {
        $category = $this->category::destroy(collect($data));
        return $category;
    }

}