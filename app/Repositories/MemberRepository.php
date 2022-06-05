<?php
namespace App\Repositories;

use App\Interfaces\MemberInterface;
use App\Models\Member;

class MemberRepository implements MemberInterface {


    protected $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function index()
    {
        $member = $this->member::orderBy('created_at', 'DESC')->paginate(25);
        return $member;
    }

    public function store($data)
    {
        $member = $this->member->create($data);
        return $member;
    }

    public function show($id)
    {
        $member = $this->member::where('id', $id)
            ->orWhere('slug', $id)
            ->get();
        return $member;
    }

    public function update($id, $data)
    {
        $member = $this->member::findOrFail($id);
        $member->fill($data);
        $member->save();
        return $member;
    }

    public function destroy($data)
    {
        $member = $this->member::destroy(collect($data));
        return $member;
    }


}