<?php
namespace App\Repositories;

use App\Interfaces\DetailLoanInterface;
use App\Models\DetailLoan;

class DetailLoanRepository implements DetailLoanInterface {


    protected $loanDetail;

    public function __construct(DetailLoan $loanDetail)
    {
        $this->loanDetail = $loanDetail;
    }

    public function storeDetailLoan($data)
    {
        $loanDetail = $this->loanDetail::create($data);
        return $loanDetail;
    }

    public function updateDetailLoan($id, $data)
    {
        $loanDetail = $this->loanDetail::findOrFail($id);
        $loanDetail->fill($data);
        $loanDetail->save();
        return $loanDetail;
    }

    public function getLoanDetailById($id)
    {
        $loanDetail = $this->loanDetail::where('loan_id', $id)->first()->toArray();
        return $loanDetail;
    }

    public function returnBook($data)
    {
        $loanDetail = $this->loanDetail::query()
        ->where('loan_id', '=', $data['loan_id'])
        ->select('loan_id', 'book_id', 'total')
        ->first();
        return $loanDetail;
    }

}