<?php
namespace App\Services;

use App\Interfaces\BookInterface;
use App\Interfaces\DetailLoanInterface;
use App\Interfaces\LoanInterface;
use App\Interfaces\ReturnInterface;
use Illuminate\Support\Facades\DB;

class ReturnService {

    protected $returnBook;
    protected $loan;
    protected $loanDetail;
    protected $book;

    public function __construct(ReturnInterface $returnBook, LoanInterface $loan, DetailLoanInterface $loanDetail, BookInterface $book)
    {
        $this->returnBook = $returnBook;
        $this->loan = $loan;
        $this->loanDetail = $loanDetail;
        $this->book = $book;
    }

    public function index()
    {
        $returnBook = $this->returnBook->index();
        if(!$returnBook->isEmpty()){
            return $returnBook;
        }
        return 'Data not found';
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $getReturnById = $this->returnBook->getReturnByLoanId($data['loan_id']);
            if($getReturnById->isEmpty()) {
                $data['user_id'] = auth()->user('api')->id;
                $loan_status = $this->loan->returnBook($data);
                $loan_detail = $this->loanDetail->returnBook($data);
                $bookIncrement = $this->book->incrementStock($loan_detail['book_id'], $loan_detail['total']);
                $returnBook = $this->returnBook->store($data);
                $returnBook['loan'] = $loan_status;
                $returnBook['loan_detail'] = $loan_detail;
                $returnBook['book'] = $bookIncrement;
                DB::commit();
                return $returnBook;
            }
            return "Data already exists";
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $returnBook = $this->returnBook->show($id);
        if(!$returnBook->isEmpty()) {
            return $returnBook;
        }
        return 'Data not found';
    }

    public function destroy($data)
    {
        $returnBookId = [];
        foreach($data as $returnId) {
            array_push($returnBookId, $returnId);
        }
        $returnBook = $this->returnBook->destroy($returnBookId);
        if($returnBook > 0) {
            return 'Data has been deleted';
        }
        return 'Data not found';

    }

}