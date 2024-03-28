<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $idea = new idea([
            'content' => 'hello world',
        ]);
        $idea->save();


        return view(
            'dashboard',
            [
                'ideas' => idea::orderBy('created_at', 'DESC')->get()
            ]
        );
    }
}
