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
                    ->orWhere('uraian_tagihan', 'like', '%' . $keyword . '%')
                    ->orWhere('sub_satker', 'like', '%' . $keyword . '%')
                    ->orWhere('pic_vendor', 'like', '%' . $keyword . '%')
                    ->orWhere('nomor_skb_sktd', 'like', '%' . $keyword . '%')
                    ->get(['tahun_anggaran', 'no_kontrak', 'sub_satker', 'uraian_tagihan', 'pic_vendor', 'nomor_skb_sktd', 'updated_at']); // Adjust to your actual columns

        return response()->json($results);
    }
    
}