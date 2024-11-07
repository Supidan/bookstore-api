<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Interfaces\BookServiceInterface;

class BookController extends Controller
{
    public BookServiceInterface $bookService;

    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->bookService->getList();

        return response()->json($response->getContent(), $response->getCode());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BookRequest $request)
    {
        $paramBookCategory = $request->all();
        $response = $this->bookService->createBook($paramBookCategory);

        return response()->json($response->getContent(), $response->getCode());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        $paramBookCategory = $request->all();
        $response = $this->bookService->updateBook($id, $paramBookCategory);

        return response()->json($response->getContent(), $response->getCode());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookService->deleteBook($id);

        return response()->json(['message' => config('constant.message.success')]);
    }
}
