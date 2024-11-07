<?php

namespace App\Interfaces;

use App\Entities\DefaultHttpResponse;

interface BookCategoryServiceInterface
{
    /**
     * @return DefaultHttpResponse
     */
    public function getList(): DefaultHttpResponse;

    /**
     * @param array $paramBookCategory
     * @return DefaultHttpResponse
     */
    public function createBookCategory(array $paramBookCategory): DefaultHttpResponse;

    /**
     * @param int $id
     * @param array $paramBookCategory
     * @return DefaultHttpResponse
     */
    public function updateBookCategory(int $id, array $paramBookCategory): DefaultHttpResponse;

    /**
     * @param int $id
     * @return void
     */
    public function deleteBookCategory(int $id): void;
}
