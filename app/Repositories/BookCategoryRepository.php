<?php

namespace App\Repositories;

use App\Interfaces\BookCategoryRepositoryInterface;
use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Collection;

class BookCategoryRepository implements BookCategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return BookCategory::all();
    }

    /**
     * @param int $id
     * @return BookCategory
     */
    public function get(int $id): BookCategory
    {
        return BookCategory::findOrFail($id);
    }

    /**
     * @param array $paramBookCategory
     * @return BookCategory
     */
    public function create(array $paramBookCategory): BookCategory
    {
        return BookCategory::create($paramBookCategory);
    }

    /**
     * @param int $id
     * @param array $paramBookCategory
     * @return BookCategory
     */
    public function update(int $id, array $paramBookCategory): BookCategory
    {
        $bookCategory = $this->get($id);

        $bookCategory->update($paramBookCategory);

        return $bookCategory;
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
