<?php

namespace App\Http\Controllers;

use App\Interfaces\BookLoanServiceInterface;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    public BookLoanServiceInterface $bookLoanService;

    public function __construct(BookLoanServiceInterface $bookLoanService)
    {
        $this->bookLoanService = $bookLoanService;
    }

    public function index()
    {
        $response = $this->bookLoanService->getListBorrowedBook();

        return response()->json($response->getContent(), $response->getCode());
    }

    public function borrow(Request $request)
    {
        $customerId = $request->input('customer_id');
        $bookCode = $request->input('book_code');

        $response = $this->bookLoanService->borrowBook($customerId, $bookCode);

        return response()->json($response->getContent(), $response->getCode());
    }

    public function returnBook(int $id)
    {
        $response = $this->bookLoanService->returnBook($id);

        return response()->json($response->getContent(), $response->getCode());
    }
}
