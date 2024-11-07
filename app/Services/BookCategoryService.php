<?php

namespace App\Services;

use App\Entities\DefaultHttpResponse;
use App\Interfaces\BookCategoryRepositoryInterface;
use App\Interfaces\BookCategoryServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BookCategoryService implements BookCategoryServiceInterface
{
    /**
     * @var BookCategoryRepositoryInterface
     */
    private BookCategoryRepositoryInterface $bookCategoryRepository;

    /**
     * @param BookCategoryRepositoryInterface $bookCategoryRepository
     */
    public function __construct(BookCategoryRepositoryInterface $bookCategoryRepository)
    {
        $this->bookCategoryRepository = $bookCategoryRepository;
    }

    /**
     * @return DefaultHttpResponse
     */
    public function getList(): DefaultHttpResponse
    {
        $bookCategories = $this->bookCategoryRepository->getAll();

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book_categories' => $bookCategories]);
    }

    /**
     * @param array $paramBookCategory
     * @return DefaultHttpResponse
     */
    public function createBookCategory(array $paramBookCategory): DefaultHttpResponse
    {
        $bookCategory = $this->bookCategoryRepository->create($paramBookCategory);

        return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book_category' => $bookCategory]);
    }

    /**
     * @param int $id
     * @param array $paramBookCategory
     * @return DefaultHttpResponse
     */
    public function updateBookCategory(int $id, array $paramBookCategory): DefaultHttpResponse
    {
        try {
            $bookCategory = $this->bookCategoryRepository->update($id, $paramBookCategory);

            return new DefaultHttpResponse(ResponseAlias::HTTP_OK, ['book_category' => $bookCategory]);
        } catch (ModelNotFoundException) {
            return new DefaultHttpResponse(ResponseAlias::HTTP_BAD_REQUEST, [
                'message' => config('constant.message.failed.book_category_not_found')
            ]);
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteBookCategory(int $id): void
    {
        $this->bookCategoryRepository->delete($id);
    }
}
