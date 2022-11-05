<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Post;
use App\Models\Tool;
use App\Models\Type;
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

    public function show($tool){
        return view('tools.show', ['tool' => $tool]);
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

    public function edit($id , Request $request){
        $tool = Tool::find($id)->first();
//         $history= History::find($tool_id)->first;
        $history = $request->tool();
        return view('tools.edit', ['tool' => $tool,'history'=>$history]);
    }

    public function update(Request $request, $id)
    {
        $tool = Tool::find($id);
        $this->authorize('update', $tool);

        $tool->title = $request->input('name');
        $tool->quantity = $request->input('quantity');
        $tool->save();

        return redirect()->route('tools.show', ['tool' => $tool->id]);

    }


}
