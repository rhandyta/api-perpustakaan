<?php
namespace App\Services;

use App\Interfaces\MemberInterface;

class MemberService {

    protected $member;

    public function __construct(MemberInterface $member)
    {
        $this->member = $member;
    }

    public function index()
    {
        $member = $this->member->index();
        if(!$member->isEmpty()){
            return $member;
        }
        return 'Data not found';
    }
    
    public function store($data)
    {
        $data['member_code'] = \Str::uuid()->toString();
        $data['slug'] = \Str::slug($data['name']);
        $member = $this->member->store($data);
        return $member;
    }

    public function show($id)
    {
        $member = $this->member->show($id);
        if(!$member->isEmpty())
        {
            return $member;
        }
        return 'Data not found';
    }

    public function update($id, $data)
    {
        $member = $this->member->update($id, $data);
        return $member;
    }

    public function destroy($data)
    {
        $members = [];
        foreach($data as $memberId) {
            array_push($members, $memberId);
        }
        $member = $this->member->destroy($members);
        if($member > 0) {
            return 'Data has been deleted';
        }
        return 'Data not found';
    }

}