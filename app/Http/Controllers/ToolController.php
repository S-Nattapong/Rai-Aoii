<?php

namespace App\Http\Controllers;
use App\Models\Tool;
use App\Models\History;
use App\Rules\CheckQuantity;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
            'name' => ['required', 'min:1', 'max:50'],
            'quantity' => ['required', 'min:1'],  
        ]);

        $tool = new Tool();
        $tool->name = $request->input('name');
        $tool->quantity = $request->input('quantity');
        $tool->type = $request->input('type');
        $tool->save();
        $history = new History();
        $history->tool_id = $tool->id ;
        $history->current_quantity = $tool->quantity;
        $history->old_quantity = 0;
        $history->status = "Create";
        $history->description = "ถูกสร้างมาใหม่";
        $history->save();
        return redirect()->route('tools.index');

    }

    public function show(Tool $tool)       // dependency injection
    {
        // $tool = Tool::where($tool->id)->first();
        return view('tools.show', ['tool' => $tool]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tool $tool )
    {
        $this->authorize('admin', Tool::class);

        $validated = $request->validate([
            'name' => ['required', 'min:1', 'max:50']
        ]);

        $tool->name = $request->input('name');
        
        $tool->type = $request->get('type');
        $tool->save();
        $tools = Tool::get();
        return view('tools.index', ['tools' => $tools]);
    }

    public function showUpdateTool(Tool $tool )
    {
        $this->authorize('admin', Tool::class);
        return view('tools.update_quantity', ['tool' => $tool]);
    }

    public function updateToolQuantity(Request $request,Tool $tool)
    {
        $this->authorize('admin', Tool::class);
        $history = new History();
        $history->tool_id = $tool->id;
        if($request->get("status") == "Increase"){
            $validated = $request->validate([
                'current_quantity' => ['required', 'min:1'],
                'description' => ['required', 'min:1'],
                'status' => ['required']
            ]);
            $history = new History();
            $history->tool_id = $tool->id;
            $resultcv = $request->input('current_quantity');
            $resultov = $tool->quantity;
            $result = $resultov + $resultcv;
            $history->current_quantity = $result;
            $history->old_quantity = $tool->quantity;
            $history->status = $request->get("status");
            $history->description = $request->input('description');
            $history->save();
            $tool->quantity =  $result;
            $tool->save();
        }
        else{
            $validated = $request->validate([
                'current_quantity' => ['required', 'min:1'],
                'description' => ['required', 'min:1','max:50'],
                'status' => ['required']
            ]);
            if($tool->quantity < $request->input('current_quantity')){
                throw ValidationException::withMessages(['current_quantity' => $tool->quantity]);
            }
            $history = new History();
            $history->tool_id = $tool->id;
            $resultcv = $request->input('current_quantity');
            $resultov = $tool->quantity;
            $result = $resultov - $resultcv;
            $history->current_quantity = $result;
            $history->old_quantity = $tool->quantity;
            $history->status = $request->get("status");
            $history->description = $request->input('description');
            $history->save();
            $tool->quantity =  $result;
            $tool->save();
        }
        $tools = Tool::get();
        return view('tools.index', ['tools' => $tools]);
    }
}
