<?php

namespace App\Repositories;

use App\Interfaces\BookLoanRepositoryInterface;
use App\Models\BookLoan;
use Illuminate\Database\Eloquent\Collection;

class BookLoanRepository implements BookLoanRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getBorrowedBooks(): Collection
    {
        return BookLoan::where('loan_end_date', null)->get();
    }

    /**
     * @param int $id
     * @return BookLoan
     */
    public function get(int $id): BookLoan
    {
        return BookLoan::findOrFail($id);
    }

    /**
     * @param array $paramBookLoan
     * @return BookLoan
     */
    public function create(array $paramBookLoan): BookLoan
    {
        return BookLoan::create($paramBookLoan);
    }

    /**
     * @param int $id
     * @return BookLoan
     */
    public function updateReturnDateToNow(int $id): BookLoan
    {
        $bookLoan = $this->get($id);

        $bookLoan->loan_end_date = now();
        $bookLoan->save();

        return $bookLoan;
    }
}
