<?php
namespace App\Services;

use App\Interfaces\PublisherInterface;

class PublisherService {

    protected $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function  index()
    {
        $publisher = $this->publisher->index();
        if(!$publisher->isEmpty()) {
            return $publisher;
        }
        return 'Data not found';
    }

    public function store($data)
    {
        $data['slug'] = \Str::slug($data['publisher_name']);
        $publisher = $this->publisher->store($data);
        return $publisher;
    }

    public function show($id)
    {
        $publisher = $this->publisher->show($id);
        if(!$publisher->isEmpty()) {
            return $publisher;
        }
        return 'Data not found';
    }

    public function update($id, $data)
    {
        $publisher = $this->publisher->update($id, $data);
        return $publisher;
    }

    public function destroy($data)
    {
        $publishers = [];
        foreach($data as $publisherId) {
            array_push($publishers, $publisherId);
        }
        $publisher = $this->publisher->destroy($publishers);
        if($publisher > 0) {
            return 'Data has been deleted';
        }
        return 'Data not found';
    }

}