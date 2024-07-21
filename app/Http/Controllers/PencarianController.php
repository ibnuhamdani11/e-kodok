<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use App\Models\LembarKontrol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class PencarianController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('contents.pencarian');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }  
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = LembarKontrol::where('tahun_anggaran', 'like', '%' . $keyword . '%')
                    ->orWhere('no_kontrak', 'like', '%' . $keyword . '%')
                    ->get(['tahun_anggaran', 'no_kontrak']); // Adjust to your actual columns

        return response()->json($results);
    }
    
}