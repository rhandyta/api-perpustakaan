<?php
namespace App\Repositories;

use App\Interfaces\PublisherInterface;
use App\Models\Publisher;

class PublisherRepository implements PublisherInterface {
    
    protected $publisher;

    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    public function index()
    {
        $publisher = $this->publisher::orderBy('created_at', 'DESC')->paginate(25);
        return $publisher;
    }

    public function store($data)
    {
        $publisher = $this->publisher::create($data);
        return $publisher;
    }

    public function show($id)
    {
        $publisher = $this->publisher::where('id', $id)
            ->orWhere('slug', $id)
            ->get();
        return $publisher;
    }

    public function update($id, $data)
    {
        $publisher = $this->publisher::findOrFail($id);
        $publisher->fill($data);
        $publisher->save();
        return $publisher;
    }

    public function destroy($data)
    {
        $publisher = $this->publisher::destroy(collect($data));
        return $publisher;
    }
}