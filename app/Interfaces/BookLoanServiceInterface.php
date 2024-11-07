<?php

namespace App\Interfaces;

use App\Entities\DefaultHttpResponse;

interface BookLoanServiceInterface
{
    public function getListBorrowedBook(): DefaultHttpResponse;
    public function borrowBook(int $customerId, string $bookCode): DefaultHttpResponse;
    public function returnBook(int $id): DefaultHttpResponse;
}
