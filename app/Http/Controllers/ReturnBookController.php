<?php

namespace App\Http\Controllers;

use App\Models\ReturnBook;
use App\Http\Requests\StoreReturnBookRequest;
use App\Http\Requests\UpdateReturnBookRequest;
use App\Services\ReturnService;
use Illuminate\Http\Request;
use Throwable;

class ReturnBookController extends Controller
{

    protected $returnBook;

    public function __construct(ReturnService $returnBook)
    {
        $this->returnBook = $returnBook;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $returnBook = $this->returnBook->index();
            return response()->json([
                'success' => true,
                'data' => $returnBook
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReturnBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReturnBookRequest $request)
    {
        try {
            $returnBook = $this->returnBook->store($request->all());
            return response()->json([
                'success' => true,
                'data' => $returnBook
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnBook  $returnBook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $returnBook = $this->returnBook->show($id);
            return response()->json([
                'success' => true,
                'data' => $returnBook,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReturnBookRequest  $request
     * @param  \App\Models\ReturnBook  $returnBook
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnBook  $returnBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $returnBook = $this->returnBook->destroy($request->all());
            return response()->json([
                'success' => true,
                'data' => $returnBook
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
