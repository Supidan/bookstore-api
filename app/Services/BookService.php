<?php

namespace App\Services;

use App\Entities\DefaultHttpResponse;
use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\BookServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private BookRepositoryInterface $bookRepository;

    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return DefaultHttpResponse
     */
    public function getList(): DefaultHttpResponse
    {
        $bookCategories = $this->bookRepository->getAll();

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['books' => $bookCategories]);
    }

    /**
     * @param array $paramBook
     * @return DefaultHttpResponse
     */
    public function createBook(array $paramBook): DefaultHttpResponse
    {
        $bookCategory = $this->bookRepository->create($paramBook);

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book' => $bookCategory]);
    }

    /**
     * @param int $id
     * @param array $paramBook
     * @return DefaultHttpResponse
     */
    public function updateBook(int $id, array $paramBook): DefaultHttpResponse
    {
        try {
            $bookCategory = $this->bookRepository->update($id, $paramBook);

            return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book' => $bookCategory]);
        } catch (ModelNotFoundException) {
            return new DefaultHttpResponse(ResponseAlias::HTTP_BAD_REQUEST, [
                'message' => config('constant.message.failed.book_not_found')
            ]);
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteBook(int $id): void
    {
        $this->bookRepository->delete($id);
    }
}
