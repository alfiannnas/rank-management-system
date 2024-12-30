<?php

namespace App\Http\Controllers;

use App\Models\RankManagement;
use Illuminate\Http\Request;

class RankManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = RankManagement::query();
    
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }
    
        $rank = $query->orderBy('rank')->paginate(25);
    
        $locations = [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Jambi',
            'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Kepulauan Bangka Belitung', 'Kepulauan Riau',
            'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur',
            'Banten', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur',
            'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan',
            'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Sulawesi Tengah',
            'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat',
            'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat'
        ];
    
        return view('rank-management.index', compact('rank', 'locations'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rank-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rank' => 'required|integer',
            'location' => 'required|string|max:255',
        ]);
    
        $csvPath = resource_path('rank-management.csv');
        $file = fopen($csvPath, 'r');
        $header = fgetcsv($file);
    
        $isValid = false;
    
        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($header, $row);
            if (
                strtolower($data['Nama']) === strtolower($request->name) &&
                $data['RANK'] == $request->rank
            ) {
                $isValid = true;
                break;
            }
        }
    
        fclose($file);
    
        if (!$isValid) {
            return back()->withErrors([
                'name' => 'Nama/rank tidak sesuai dengan data yang terdaftar.',
            ])->withInput();
        }
        $userId = auth()->user()->id;
        RankManagement::create([
            'name' => $request->name,
            'rank' => $request->rank,
            'location' => $request->location,
            'user_id' => $userId,
        ]);
    
        return redirect()->route('rank-management.index')->with('success', 'Data berhasil disimpan.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(RankManagement $rankManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RankManagement $rankManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RankManagement $rankManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RankManagement $rankManagement)
    {
        //
    }
}
