<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSign;
use App\Http\Requests\UserSignRequest;

class UserSignsController extends Controller
{
    public function index(Request $request)
    {
        return view('user_signs.index', ['user_signs' => $request->user()->userSigns]);
    }

    public function create()
    {
        return view('user_signs.create_and_edit', ['user_sign' => new UserSign()]);
    }

    public function store(UserSignRequest $request)
    {
        $request->user()->userSigns()->create($request->only([
            'campaign_id',
            'leader_name',
            'leader_phone',
            'identity',
            'school_province',
            'school_city',
            'school_name',
            'province',
            'city',
            'address',
            'leader_email',
            'working_company',
            'team_name',
            'other_member',
            'guide_teacher',
        ]));

        return redirect()->route('user_signs.index');
    }

    public function show(UserSign $user_sign)
    {
        $this->authorize('own', $user_sign);

        return view('user_signs.show', ['user_sign' => $user_sign]);
    }
    public function edit(UserSign $user_sign)
    {
        $this->authorize('own', $user_sign);

        return view('user_signs.create_and_edit', ['user_sign' => $user_sign]);
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
            'school_name',
            'province',
            'city',
            'address',
            'leader_email',
            'working_company',
            'team_name',
            'other_member',
            'guide_teacher',
        ]));

        return redirect()->route('user_signs.index');
    }
}
