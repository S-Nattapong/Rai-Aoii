<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::get();
        return view('tools.index', ['tools' => $tools]);
    }

    public function create()
    {
        $this->authorize('admin', Tool::class);
        return view('tools.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin', Tool::class);

        $validated = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'quantity' => ['required', 'min:1'],
        ]);

        $tool = new Tool();

        $tool->name = $request->input('name');
        $tool->quantity = $request->input('quantity');
        $tool->type = $request->input('type');

        $tool->save();

        return redirect()->route('tools.index');

    }

    public function edit($id){
        $tool = Tool::find($id)->first();
        return view('tools.edit', ['tool' => $tool]);
    }

    public function show(Tool $tool){
        return view('tools.show', ['tool' => $tool]);
    }
}
