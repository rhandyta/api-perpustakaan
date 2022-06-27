<?php
namespace App\Interfaces;

interface ReturnInterface {

    public function index();
    public function store($data);
    public function show($id);
    public function destroy($data);
    public function getReturnByLoanId($id);
}