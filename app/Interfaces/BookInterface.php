<?php 
namespace App\Interfaces;

interface BookInterface {

    public function index();
    public function store($data);
    public function show($data);
    public function update($id, $data);
    public function destroy($data);
    public function bookDetail($id);
    public function decrementStock($id, $data);
    public function incrementStock($id, $data);

}