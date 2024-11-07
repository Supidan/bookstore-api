<?php

namespace App\Interfaces;

use App\Models\BookLoan;
use Illuminate\Database\Eloquent\Collection;

interface BookLoanRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getBorrowedBooks(): Collection;

    /**
     * @param int $id
     * @return BookLoan
     */
    public function get(int $id): BookLoan;

    /**
     * @param array $paramBookLoan
     * @return BookLoan
     */
    public function create(array $paramBookLoan): BookLoan;

    /**
     * @param int $id
     * @return BookLoan
     */
    public function updateReturnDateToNow(int $id): BookLoan;
}
