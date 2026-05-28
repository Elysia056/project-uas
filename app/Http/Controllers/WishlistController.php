<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return view('wishlist.index', ['wishlists' => $wishlists]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
            ]);
        }

        return redirect('/wishlist');
    }
    public function show($id)
    {
        $wishlist = Wishlist::with('product')->findOrFail($id);
        return view('wishlist.show', ['wishlist' => $wishlist]);
    }
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect('/wishlist');
    }
}