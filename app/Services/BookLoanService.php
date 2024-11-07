<?php

namespace App\Services;

use App\Entities\DefaultHttpResponse;
use App\Exceptions\BookLoanException;
use App\Interfaces\BookLoanRepositoryInterface;
use App\Interfaces\BookLoanServiceInterface;
use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BookLoanService implements BookLoanServiceInterface
{
    private BookLoanRepositoryInterface $bookLoanRepository;
    private BookRepositoryInterface $bookRepository;

    public function __construct(
        BookLoanRepositoryInterface $bookLoanRepository,
        BookRepositoryInterface $bookRepository
    )
    {
        $this->bookLoanRepository = $bookLoanRepository;
        $this->bookRepository = $bookRepository;
    }

    public function getListBorrowedBook(): DefaultHttpResponse
    {
        $bookLoans = $this->bookLoanRepository->getBorrowedBooks();

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book_loans' => $bookLoans]);
    }

    public function borrowBook(int $customerId, string $bookCode): DefaultHttpResponse
    {
        try {
            $book = $this->bookRepository->getByCode($bookCode);

            if (empty($book)) {
                throw new ModelNotFoundException();
            }

            if ($book->is_loaned) {
                throw new BookLoanException('book already borrowed');
            }

            return $this->processLoanBook($customerId, $book);
        } catch (ModelNotFoundException) {
            return new DefaultHttpResponse(ResponseAlias::HTTP_BAD_REQUEST, [
                'message' => config('constant.message.failed.book_not_found')
            ]);
        } catch (BookLoanException $e) {
            return new DefaultHttpResponse(ResponseAlias::HTTP_BAD_REQUEST, [
                'message' => $e->getMessage()
            ]);
        }
    }

    public function returnBook(int $id): DefaultHttpResponse
    {
        $bookLoan = $this->bookLoanRepository->updateReturnDateToNow($id);

        $this->bookRepository->updateStatusLoan($bookLoan->book->id, false);

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book_loan' => $bookLoan]);
    }

    private function processLoanBook(int $customerId, Book $book)
    {
        $paramBookLoan = [
            'customer_id' => $customerId,
            'book_id' => $book->id,
            'loan_start_date' => now(),
        ];

        $bookLoan = $this->bookLoanRepository->create($paramBookLoan);

        $this->bookRepository->updateStatusLoan($book->id, true);

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book_loan' => $bookLoan]);
    }
}
