<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'rating' => 'required',
            'description',
        ]);
        $review = new Review;
        $review->user_id = $request->user()->id;
        $review->title = $request->title;
        $review->rating = $request->rating;
        $review->description = $request->description;
        $review->save();

        return redirect('/reviews')->with('success', 'Review created successfully!');
    }
}
