<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Tool;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class HistoryController extends Controller
{
    public function index()
    {
        //get history
        $history = History::get();
        return view('history.index',['history'=> $history]);
    }

//    public function chooseStatusHistory(){
//        if(Input::has){
//        }
//        else
//    }

//    public function store(Request $request)
//    {
//        $this->authorize('admin', Tool::class);
//
//        $validated = $request->validate([
//            'name' => ['required', 'min:5', 'max:255'],
//            'quantity' => ['required', 'min:1'],
//        ]);
//
//        $tool = new Tool();
//
//        $tool->name = $request->input('name');
//        $tool->quantity = $request->input('quantity');
//        $tool->type = $request->input('type');
//
//        $tool->save();
//
//        return redirect()->route('tools.index');
//
//    }
}
