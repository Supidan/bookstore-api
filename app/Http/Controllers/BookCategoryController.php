<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCategoryRequest;
use App\Interfaces\BookCategoryServiceInterface;

class BookCategoryController extends Controller
{
    public BookCategoryServiceInterface $bookCategoryService;

    public function __construct(BookCategoryServiceInterface $bookCategoryService)
    {
        $this->bookCategoryService = $bookCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->bookCategoryService->getList();

        return response()->json($response->getContent(), $response->getCode());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BookCategoryRequest $request)
    {
        $paramBookCategory = $request->all();
        $response = $this->bookCategoryService->createBookCategory($paramBookCategory);

        return response()->json($response->getContent(), $response->getCode());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCategoryRequest $request, string $id)
    {
        $paramBookCategory = $request->all();
        $response = $this->bookCategoryService->updateBookCategory($id, $paramBookCategory);

        return response()->json($response->getContent(), $response->getCode());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookCategoryService->deleteBookCategory($id);

        return response()->json(['message' => config('constant.message.success')]);
    }
}
