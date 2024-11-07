<?php

namespace App\Interfaces;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param int $id
     * @return Book
     */
    public function get(int $id): Book;

    /**
     * @param string $code
     * @return Book
     */
    public function getByCode(string $code): Book;

    /**
     * @param array $paramBook
     * @return Book
     */

    public function create(array $paramBook): Book;

    /**
     * @param int $id
     * @param array $paramBook
     * @return Book
     */
    public function update(int $id, array $paramBook): Book;

    /**
     * @param int $id
     * @param bool $isLoan
     * @return Book
     */
    public function updateStatusLoan(int $id, bool $isLoan): Book;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
