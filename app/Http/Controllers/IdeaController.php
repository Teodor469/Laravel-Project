<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\idea;

class IdeaController extends Controller
{
    public function store()
    {
        $idea = idea::create([
            'content' => request()->get('idea', ''),
        ]);

        return redirect()->route('dashboard');
    }
}
