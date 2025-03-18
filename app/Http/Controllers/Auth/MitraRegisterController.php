<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MitraRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.mitra-register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bisnis' => ['required', 'string', 'max:255'],
            'nama_pic' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:mitras'],
            'jenis_makanan' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'banyak_penjualan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('mitra.register')
                ->withErrors($validator)
                ->withInput();
        }

        $mitra = Mitra::create([
            'nama_bisnis' => $request->nama_bisnis,
            'nama_pic' => $request->nama_pic,
            'email' => $request->email,
            'jenis_makanan' => $request->jenis_makanan,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'banyak_penjualan' => $request->banyak_penjualan,
            'status' => 'pending', // Default status for new partners
        ]);

        // You can add additional logic here, such as:
        // - Sending confirmation email
        // - Redirecting to a specific page
        // - Setting up flash messages

        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran mitra berhasil! Silahkan tunggu konfirmasi dari admin.');
    }
}
