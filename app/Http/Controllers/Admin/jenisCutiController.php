<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisCuti;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class jenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jeniscutis = JenisCuti::all();
        return view('pages.admin.jeniscuti.index', compact('jeniscutis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.jeniscuti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_cuti' => 'required|string',
            'default_hari' => 'required|integer',
        ]);

        $data = $request->all();

        JenisCuti::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('jeniscuti.index');
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
        $jeniscuti = JenisCuti::findOrFail($id);
        return view('pages.admin.jeniscuti.edit', compact('jeniscuti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_cuti' => 'required|string',
            'default_hari' => 'required|integer',
        ]);

        $data = $request->all();
        $jeniscuti = JenisCuti::findOrFail($id);
        $jeniscuti->update($data);

        if ($jeniscuti) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('jeniscuti.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jeniscuti = JenisCuti::findOrFail($id);
        $jeniscuti->delete();
        if ($jeniscuti) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('jeniscuti.index');
    }
}
