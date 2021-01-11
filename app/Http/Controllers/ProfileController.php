<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $countries = cache()->rememberForever('countries', function () {
            return Country::all();
        });
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        return view('profile.index', compact('user', 'countries'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function saveProfile(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'country' => 'required',
            'state' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->with(['error' => 'Could not find this user']);
        }
        $user->phone_number = $request->phone_number;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->address = $request->address;
        $user->is_profile_complete = 1;
        if (!$user->save()) {
            return redirect()->back()->with(['error' => 'Could not update this user']);
        }
        return redirect(route('home'))->with(['success' => 'Profile updated successfully']);
    }
}
