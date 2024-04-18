<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::paginate(10);
        $trashedCount = User::onlyTrashed()->latest()->get()->count();
        return view('users.index', compact(['users', 'trashedCount',]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate
        $rules = [
            'name' => ['string', 'required', 'min:3', 'max:128'],
            'email' => ['required', 'email:rfc', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(4)->letters(),],
        ];
        $validated = $request->validate($rules);

        // Store
        $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect(route('users.index'))
            ->withSuccess("Added '{$user->name}'.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', compact(['user',]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        if (empty($request['password'])) {
            unset($request['password']);
            unset($request['password_confirmation']);
        }
// Validate
        $rules = [
            'name' => [
                'string',
                'required',
                'min:3',
                'max:128'
            ],
            'email' => [
                'required',
                'email:rfc',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'sometimes',
                'confirmed',
                Password::min(4)->letters(), // ->uncompromised(),
            ],
            'password_confirmation' => [
                'sometimes',
                'required_unless:password,null',
            ],

        ];
        $validated = $request->validate($rules);

        // Store
        $user->update(
            $validated
//            [
//                'name' => $validated['name'],
//                'email' => $validated['email'],
//                'password' => $validated['password'],
//                'updated_at' => now(),
//            ]
        );

        return redirect(route('users.show', $user))
            ->withSuccess("Updated {$user->name}.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $oldUser = $user;
        $user->delete();

        return redirect(route('users.index'))
            ->withSuccess("Deleted {$oldUser->name}.");

    }


    public function trash()
    {
        $users = User::onlyTrashed()->paginate(5);
        return view('users.trash', compact(['users',]));
    }

    public function restore(string $id): RedirectResponse
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return redirect()
            ->back()
            ->withSuccess("Restored {$user->name}.");

    }

    public function remove(string $id): RedirectResponse
    {
        $user = User::onlyTrashed()->find($id);
        $oldUser = $user;
        $user->forceDelete();
        return redirect()
            ->back()
            ->withSuccess("Permanently Removed {$oldUser->name}.");
    }
}
