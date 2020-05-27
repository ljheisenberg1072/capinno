<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\UserSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserSignRequest;
use App\Exceptions\InvalidRequestException;

class UserSignsController extends Controller
{
    public function index(Request $request)
    {
        return view('user_signs.index', ['user_signs' => $request->user()->userSigns]);
    }

    public function create()
    {
        $campaign_id = Campaign::query()->where('on_hold', 1)->orderBy('created_at','desc')->value('id');
        //  判断用户是否已经报名当前大赛
        if(UserSign::query()->where('campaign_id', $campaign_id)->where('user_id', Auth::user()->id)->exists()) {
            throw new InvalidRequestException('你已报名该大赛，请勿重复报名！');
        }
        return view('user_signs.create_and_edit', ['user_sign' => new UserSign(), 'campaign_id' => $campaign_id]);
    }

    public function store(UserSign $user_sign, UserSignRequest $request)
    {
        $request->user()->userSigns()->create($request->only([
            'campaign_id',
            'leader_name',
            'leader_phone',
            'identity',
            'school_province',
            'school_city',
            'school',
            'province',
            'city',
            'address',
            'leader_email',
            'working_company',
            'team_name',
            'other_members',
            'guide_teachers',
        ]));

        return redirect()->route('user_signs.show', ['user_sign' => $user_sign->id]);
    }

    public function show(UserSign $user_sign)
    {
        $this->authorize('own', $user_sign);

        return view('user_signs.show', ['user_sign' => $user_sign]);
    }
    public function edit(UserSign $user_sign)
    {
        $this->authorize('own', $user_sign);

        $campaign_id = Campaign::query()->where('on_hold', 1)->orderBy('created_at','desc')->value('id');
        return view('user_signs.create_and_edit', ['user_sign' => $user_sign, 'campaign_id' => $campaign_id]);
    }

    public function update(UserSign $user_sign, UserSignRequest $request)
    {
        $this->authorize('own', $user_sign);

        $user_sign->update($request->only([
            'campaign_id',
            'leader_name',
            'leader_phone',
            'identity',
            'school_province',
            'school_city',
            'school',
            'province',
            'city',
            'address',
            'leader_email',
            'working_company',
            'team_name',
            'other_members',
            'guide_teachers',
        ]));

        return redirect()->route('user_signs.show', ['user_sign' => $user_sign->id]);
    }

}
