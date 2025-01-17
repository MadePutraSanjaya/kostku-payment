<?php
namespace App\Http\Controllers;

use App\Models\KamarKost;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $kamar = KamarKost::all();
        return view('admin.kamar.index', compact('kamar'));
    }
}
