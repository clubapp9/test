<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\User\UserContract;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $header_text = 'My Account';
        return view('frontend.user.profile.edit')
            ->with(compact('header_text'))
            ->withUser(auth()->user());
    }

    /**
     * @param  UserContract         $user
     * @param  UpdateProfileRequest $request
     * @return mixed
     */
    public function update(UserContract $user, UpdateProfileRequest $request)
    {
        $header_text = 'My Account';
        $user->updateProfile($request->all());
        return redirect()->route('frontend.dashboard')->with(compact('header_text'))->withFlashSuccess(trans('strings.profile_successfully_updated'));
    }
}
