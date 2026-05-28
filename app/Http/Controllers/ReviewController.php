<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return view('reviews.index', ['reviews' => $reviews]);
    }
    public function create()
    {
        $products = Product::all();
        return view('reviews.create', ['products' => $products]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string'],
        ]);
        $existing = Review::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existing) {
            return back()->withErrors(['product_id' => 'Anda sudah memberikan review untuk produk ini.']);
        }

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect('/reviews');
    }
    public function show($id)
    {
        $review = Review::with(['product', 'user'])->findOrFail($id);
        return view('reviews.show', ['review' => $review]);
    }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect('/reviews');
    }
}