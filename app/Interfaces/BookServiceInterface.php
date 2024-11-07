<?php

namespace App\Interfaces;

use App\Entities\DefaultHttpResponse;

interface BookServiceInterface
{
    /**
     * @return DefaultHttpResponse
     */
    public function getList(): DefaultHttpResponse;

    /**
     * @param array $paramBook
     * @return DefaultHttpResponse
     */
    public function createBook(array $paramBook): DefaultHttpResponse;

    /**
     * @param int $id
     * @param array $paramBook
     * @return DefaultHttpResponse
     */
    public function updateBook(int $id, array $paramBook): DefaultHttpResponse;

    /**
     * @param int $id
     * @return void
     */
    public function deleteBook(int $id): void;
}
