<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\User;
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
    
}