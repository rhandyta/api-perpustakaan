<?php 
namespace App\Services;

use App\Interfaces\BookInterface;
use App\Interfaces\DetailLoanInterface;
use App\Interfaces\LoanInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LoanService {

    protected $loan;
    protected $loanDetail;
    protected $book;

    public function __construct(LoanInterface $loan, DetailLoanInterface $loanDetail, BookInterface $book)
    {
        $this->loan = $loan;
        $this->detailLoan = $loanDetail;
        $this->book = $book;
    }

    public function index()
    {
        $loan = $this->loan->index();
        if(!$loan->isEmpty()){
            return $loan;
        }
        return 'Data not found';
    }

    public function store($data)
    {
        DB::beginTransaction();
        $dt = new Carbon();
        try {
            $bookDetail = $this->bookDetail($data['loan_detail']['book_id']);
            $getBorrowDate = $this->getBorrowDate($data);
            if($getBorrowDate === null) {
                return $this->storeData($data, $bookDetail);
            } else if ($dt->now()->toDateString() > date('Y-m-d', strtotime($getBorrowDate->borrow_date))) {
                return $this->storeData($data, $bookDetail);
            }
            return 'Members have taken the same book and within the period';
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    
    public function show($id)
    {
        $loan = $this->loan->show($id);
        if(!$loan->isEmpty()) {
            return $loan;
        }
        return 'Data not found';
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $bookDetail = $this->bookDetail($data['loan_detail']['book_id']);
            $getData = $this->getData($id);
            $loanDetailById = $this->detailLoan->getLoanDetailById($id);
            if(!$bookDetail->stock < 1 ?? $bookDetail->id === $data['loan_detail']['book_id']) {
                $this->incrementStock($loanDetailById['book_id'], $loanDetailById['total']);
                $loan = $this->loan->update($id, $data);
                $loanDetail = $this->updateDetailLoan($getData['loandetail']['id'], $data['loan_detail']);
                $this->decrementStock($loanDetail['book_id'], $loanDetail['total']);
                Db::commit();
                return $data = [
                    'loan' => $loan,
                    'loan_detail' => $loanDetail,
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy($data)
    {
        $loan = $this->loan->destroy($data);
        if($loan > 0 ){
            return 'Data has been deleted';
        }
        return 'Data not found';
    }

    public function getData($id)
    {
        $data = $this->loan->getData($id);
        return $data;
    }

    public function storeData($data, $bookDetail)
    {
        if(!$bookDetail->stock < 1 && $bookDetail->id === $data['loan_detail']['book_id']) {
            $data['user_id'] = Auth('api')->user()->id;
            $loan = $this->loan->store($data);
            $data['loan_detail']['loan_id'] = $loan['id'];
            $detailLoan = $this->storeDetailLoan($data['loan_detail']);
            $decrementStock = $this->decrementStock($data['loan_detail']['book_id'], $data['loan_detail']['total']);
            $loan['loan_detail'] = $detailLoan;
            $loan['stock'] = $decrementStock;
            DB::commit();
            return $loan;
        }
        return 'Book stock has run out';
    }

    public function storeDetailLoan($data)
    {
        $detailLoan = $this->detailLoan->storeDetailLoan($data);
        return $detailLoan;
    }

    public function updateDetailLoan($id, $data)
    {
        $detailLoan = $this->detailLoan->updateDetailLoan($id, $data);
        return $detailLoan;
    }

    public function decrementStock($id, $data)
    {
        $decrementStock = $this->book->decrementStock($id, $data);
        return $decrementStock;
    }

    public function incrementStock($id, $data)
    {
        $incrementStock = $this->book->incrementStock($id, $data);
        return $incrementStock;
    }

    public function bookDetail($id)
    {
        $bookDetail = $this->book->bookDetail($id);
        return $bookDetail;
    }

    public function getBorrowDate($id)
    {
        $getBorrowDate = $this->loan->getBorrowDate($id);
        return $getBorrowDate;
    }

    public function returnBook($data)
    {
        $returnBook = $this->loan->returnBook($data);
        return $returnBook;
    }

}