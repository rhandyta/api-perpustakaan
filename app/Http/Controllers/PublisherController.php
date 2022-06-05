<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Services\PublisherService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class PublisherController extends Controller
{

    protected $publisher;

    public function __construct(PublisherService $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $publisher = $this->publisher->index();
            return response()->json([
                'success' => true,
                'data' => $publisher
            ], Response::HTTP_OK);
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
     * @param  \App\Http\Requests\StorePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
        try {
            $publisher = $this->publisher->store($request->all());
            return response()->json([
                'success' => true,
                'data' => $publisher
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
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $publisher = $this->publisher->show($id);
            return response()->json([
                'success' => true,
                'data' => $publisher
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
     * @param  \App\Http\Requests\UpdatePublisherRequest  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, $id)
    {
        try {
            $publisher = $this->publisher->update($id, $request->all());
            return response()->json([
                'success' => true,
                'data' => $publisher
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $publisher = $this->publisher->destroy($request->all());
            return response()->json([
                'success' => true,
                'message' => $publisher
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
