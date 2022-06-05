<?php
namespace App\Repositories;

use App\Interfaces\LoanInterface;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LoanRepository implements LoanInterface {

    protected $loan;

    public function __construct(Loan $loan)
    {
        $this->loan = $loan;
    }

    public function index()
    {
        $loan = $this->loan::with('member', 'loandetail', 'user')
            ->orderBy('borrow_date', 'DESC')
            ->paginate(25);
        return $loan;
    }

    public function store($data)
    {
        $loan = $this->loan::create($data);
        return $loan;
    }

    public function show($id)
    {
        $loan = $this->loan::where('id', '=', $id)
            ->with('loandetail', 'member')
            ->get();
        return $loan;
    }

    public function update($id, $data)
    {
        $loan = $this->loan::findOrFail($id);
        $loan->fill($data);
        $loan->save();
        return $loan;
    }

    public function destroy($data)
    {
        $loans = [];
        foreach($data as $loanId){
            array_push($loans, $loanId);
        }
        $loan = $this->loan::destroy(collect($data));
        return $loan;
    }

    public function getBorrowDate($data)
    {
        $getBorrowDate = $this->loan::with('loandetail')
            ->where('member_id', '=', $data['member_id'])
            ->whereHas('loandetail', function($query) use($data) {
                $query->where('book_id', '=', $data['loan_detail']['book_id']);
            })
            ->orderBy('created_at', 'DESC')
            ->first();
        return $getBorrowDate;
    }

    public function getData($id)
    {
        $data = $this->loan::with('loandetail')->findOrFail($id)->toArray();
        return $data;
    }
}