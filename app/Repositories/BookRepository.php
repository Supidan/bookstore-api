<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Book::all();
    }

    /**
     * @param int $id
     * @return Book
     */
    public function get(int $id): Book
    {
        return Book::findOrFail($id);
    }

    /**
     * @param string $code
     * @return Book
     */
    public function getByCode(string $code): Book
    {
        return Book::where('code', $code)->firstOrFail();
    }

    /**
     * @param array $paramBook
     * @return Book
     */
    public function create(array $paramBook): Book
    {
        return Book::create($paramBook);
    }

    /**
     * @param int $id
     * @param array $paramBook
     * @return Book
     */
    public function update(int $id, array $paramBook): Book
    {
        $book = $this->get($id);

        $book->update($paramBook);

        return $book;
    }

    /**
     * @param int $id
     * @param bool $isLoan
     * @return Book
     */
    public function updateStatusLoan(int $id, bool $isLoan): Book
    {
        $book = $this->get($id);

        $book->is_loaned = $isLoan;
        $book->save();

        return $book;
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->get($id)->delete();
    }
}
