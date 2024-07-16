<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite; // Adjust based on your model's actual namespace

class FavoriteController extends Controller
{
    public function index()
    {
        return view('favorite');
    }
}
