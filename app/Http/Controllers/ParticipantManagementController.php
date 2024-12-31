<?php

namespace App\Http\Controllers;

use App\Models\ParticipantManagement;
use Illuminate\Http\Request;

class ParticipantManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = ParticipantManagement::query();

        $participant = $query->paginate(25);
        return view('participant-management.index', compact('participant'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParticipantManagement $participantManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParticipantManagement $participantManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParticipantManagement $participantManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipantManagement $participantManagement)
    {
        //
    }
}
