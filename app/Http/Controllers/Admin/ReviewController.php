<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
        ]);

        $feedback = Review::findOrFail($id);
        $feedback->comment = $request->input('comment');
        $feedback->rate = $request->input('rate');
        $feedback->save();

        return redirect()->back()->with('success', __('Feedback updated successfully.'));
    }

    public function destroy($id)
    {
        $feedback = Review::findOrFail($id);
        $feedback->delete();

        return redirect()->back()->with('success', __('Feedback deleted successfully.'));
    }

}
