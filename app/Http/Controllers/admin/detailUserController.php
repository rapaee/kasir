<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class detailUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil hanya pengguna dengan usertype 'user' dan paginate hasilnya
        $count = User::where('usertype', 'user')->paginate(10);
        
        // Jika kamu juga ingin mengambil semua pengguna, kamu bisa mempertahankan ini,
        // tetapi jika tidak, kamu bisa menghapusnya
        // $user = User::all(); 
        
        return view('admin.detail-user-dashboard', compact('count'));
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
