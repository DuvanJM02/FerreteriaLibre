<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function updateStatus(Request $request, User $user){
        $request->validate([
            'status' => 'required',
        ]);

        $user->update([
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard');
    }

    public function updateStatusProduct(Request $request, Product $product){
        $request->validate([
            'state' => 'required',
        ]);

        $product->update([
            'state' => $request->state,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('dashboard');
    }


}
