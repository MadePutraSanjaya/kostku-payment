<?php
namespace App\Http\Controllers;

use App\Models\KamarKost;
use Illuminate\Http\Request;

class KamarKostController extends Controller
{
    public function index()
    {
        $kamar_kosts = KamarKost::all();
        return view('admin.kamar_kosts.index', compact('kamar_kosts'));
    }
}
