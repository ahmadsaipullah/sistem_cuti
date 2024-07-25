<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::with('Level')->get();
        return view('pages.admin.users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        return view('pages.admin.users.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'unique:users', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'dept' => ['required', 'string', 'max:255'],
            'bag' => ['required', 'string', 'max:255'],
            'seksi' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'level_id' => ['nullable', 'integer'],
            'cuti_th_sisa' => ['nullable', 'integer'],
        ]);

        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'dept' => $request->dept,
            'bag' => $request->bag,
            'seksi' => $request->seksi,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
            // 'cuti_th_sisa' => $request->cuti_th_sisa,
        ];

        User::create($data);
        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('admin.index');
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
        $levels = level::all();
        $admin = User::with('level')->findOrFail($id);
        return view('pages.admin.users.edit', compact('levels', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nik' => ['required', 'string', 'unique:users,nik,' . $id],
            'nama' => ['required', 'string', 'max:255'],
            'dept' => ['required', 'string', 'max:255'],
            'bag' => ['required', 'string', 'max:255'],
            'seksi' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'min:6'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'level_id' => ['nullable', 'integer'],
            'cuti_th_sisa' => ['nullable', 'integer'],
        ]);

        $admin = User::findOrFail($id);
        $dataId = $admin->find($admin->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/admin', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        Storage::delete('public/' . $admin->image);
        $admin->delete();
        if ($admin) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Terjadi Kesalahan', 'error');
        }
        return redirect()->route('admin.index');
    }
}
