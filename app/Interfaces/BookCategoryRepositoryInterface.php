<?php

namespace App\Interfaces;

use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Collection;

interface BookCategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param int $id
     * @return BookCategory
     */
    public function get(int $id): BookCategory;

    /**
     * @param array $paramBookCategory
     * @return BookCategory
     */
    public function create(array $paramBookCategory): BookCategory;

    /**
     * @param int $id
     * @param array $paramBookCategory
     * @return BookCategory
     */
    public function update(int $id, array $paramBookCategory): BookCategory;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
