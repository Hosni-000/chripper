<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
class ChripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $chirps = Chirp::with('user')->latest()->limit(50)->get();
        return view('home', ['chirps' => $chirps]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5'],
            [
                'message.required' => 'Chirps field is required.',
                'message.string' => 'Chirps must be a string.',
                'message.max' => 'The chirp may not be greater than 255 characters.',
                'message.min' => 'The chirp must be at least 5 characters.',
            ]);

        Chirp::create(
            [
                'message' => $validated['message'],
                'user_id' => null, // Replace with the authenticated user's ID if applicable
            ]
        );
        return redirect()->route('home')->with('success', 'Chirped Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
