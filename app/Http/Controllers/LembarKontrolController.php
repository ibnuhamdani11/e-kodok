<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\LembarKontrol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class LembarKontrolController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $data = LembarKontrol::all(); 
            return view('contents.lembar-kontrol', compact('data'));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }       
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,png,jpg,jpeg|max:100048', // Add validation rules
            // Add other validation rules here
        ]);
        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('uploads'), $fileName);

        $data = $request->all();
        // $data->no_kontrak = $request->no_kontrak;
        $data['file'] = $fileName;
        // // Save other fields...
        // $data->save();
        LembarKontrol::create($data);
        return response()->json(['success' => 'Data saved successfully']);
    }
    public function show($id)
    {
        $data = LembarKontrol::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = LembarKontrol::find($id);
        $formData = array(
            'tahun_anggaran' => $request->tahun_anggaran,
            'no_kontrak' => $request->no_kontrak,
            'sub_satker'        => $request->sub_satker,
            'pic_vendor'        => $request->pic_vendor,
            'nomor_skb_sktd'    => $request->nomor_skb_sktd,
            'uraian_tagihan'    => $request->uraian_tagihan
        );
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,doc,docx,png,jpg,jpeg|max:100048',
            ]);  

            // Delete the old file if it exists
            if ($data->file && file_exists(public_path('uploads/'.$data->file))) {
                unlink(public_path('uploads/'.$data->file));
            }

            // Upload the new file
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
            $formData['file'] = $fileName; 
        }     
        // dd($formData);
        // log::info("data ", [$request->tahung_anggaran]);
        // log::info("id ", [$id]);
        $result = LembarKontrol::where('id', $id)->update($formData);
        if($result){
            return response()->json(['success' => 'Data updated successfully']);
        }else{
            return response()->json(['gagal' => 'Data gagal successfully']);
        }
        
    }

    public function delete($id)
    {
        LembarKontrol::destroy($id);
        return response()->json(['success' => 'Data deleted successfully']);
    }
}