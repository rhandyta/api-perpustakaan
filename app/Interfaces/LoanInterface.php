<?php
namespace App\Interfaces;

interface LoanInterface {

    public function index();
    public function store($data);
    public function show($id);
    public function update($id, $data);
    public function destroy($data);
    public function getBorrowDate($id);
    public function getData($id);
}