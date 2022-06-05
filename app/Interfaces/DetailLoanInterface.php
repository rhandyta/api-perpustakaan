<?php 
namespace App\Interfaces;

interface DetailLoanInterface {

    public function storeDetailLoan($data);
    public function updateDetailLoan($id, $data);
    public function getLoanDetailById($id);

}