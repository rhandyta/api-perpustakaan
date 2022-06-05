<?php

namespace App\Http\Controllers;

use App\Models\ReturnBook;
use App\Http\Requests\StoreReturnBookRequest;
use App\Http\Requests\UpdateReturnBookRequest;

class ReturnBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReturnBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReturnBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnBook  $returnBook
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnBook $returnBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReturnBookRequest  $request
     * @param  \App\Models\ReturnBook  $returnBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReturnBookRequest $request, ReturnBook $returnBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnBook  $returnBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnBook $returnBook)
    {
        //
    }
}
