<?php
namespace App\Repositories;

use App\Interfaces\ReturnInterface;
use App\Models\ReturnBook;
use Illuminate\Support\Facades\DB;

class ReturnRepository implements ReturnInterface {

    protected $returnBook;

    public function __construct(ReturnBook $returnBook)
    {
        $this->returnBook = $returnBook;
    }

    public function index()
    {
        $returnBook = $this->returnBook::with('loan')
        ->orderBy('date_return', 'DESC')
        ->paginate(25);
        return $returnBook;
    }

    public function store($data)
    {
        $returnBook = $this->returnBook::create($data);
        return $returnBook;
    }

    public function show($id)
    {
        $returnBook = $this->returnBook::find($id)
        ->with('loan', 'loan.loandetail')
        ->get();
        return $returnBook;
    }

    public function destroy($data)
    {
        $returnBook = $this->returnBook::destroy(collect($data));
        return $returnBook;
    }

    public function getReturnByLoanId($id)
    {
        $loanId = $this->returnBook::query()
            ->where('loan_id', '=', $id)
            ->get();
        return $loanId;
    }

}