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
            'content' => 'required|min:3|max:240'
        ]);

        $idea = idea::create([
            'content' => request()->get('content', ''),
        ]);

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully!');
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', "Idea updated successfully!");
    }
}
