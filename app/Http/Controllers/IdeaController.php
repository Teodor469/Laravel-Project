<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\idea;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function store()
    {

        request()->validate([
            'idea' => 'required|min:3|max:240'
        ]);

        $idea = idea::create([
            'content' => request()->get('idea', ''),
        ]);

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully!');
    }
}
