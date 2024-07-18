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
        LembarKontrol::create($request->all());
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
        $data->update($request->all());
        return response()->json(['success' => 'Data updated successfully']);
    }

    public function destroy($id)
    {
        LembarKontrol::destroy($id);
        return response()->json(['success' => 'Data deleted successfully']);
    }
}