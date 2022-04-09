<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => User::withCount(['blogs', 'comments'])->get(['id', 'name', 'email']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            User::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil menambah pengguna.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil memperbarui pengguna.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil menghapus pengguna.',
        ]);
    }
}
