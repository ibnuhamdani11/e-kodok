<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class PetugasController extends Controller
{
    public function verifikator()
    {
        if(Auth::check()){
            $data = Petugas::where('role', 'verifikator')->get();
            return view('contents.petugas-verifikator', compact('data'));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }  
    public function kasiUrji()
    {
        if(Auth::check()){
            $data = Petugas::where('role', 'kasi-urji')->get();
            return view('contents.petugas-kasiurji', compact('data'));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    } 
    public function pembayar()
    {
        if(Auth::check()){
            $data = Petugas::where('role', 'pembayar')->get(); 
            return view('contents.petugas-pembayar', compact('data'));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }      
    public function store(Request $request)
    {
        Petugas::create($request->all());
        return response()->json(['success' => 'Data saved successfully']);
    }
    public function show($id)
    {
        $data = Petugas::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Petugas::find($id);
        $data->update($request->all());
        return response()->json(['success' => 'Data updated successfully']);
    }

    public function delete($id)
    {
        Petugas::destroy($id);
        return response()->json(['success' => 'Data deleted successfully']);
    }
}