<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Tool;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $historys = History::get();
        $tools = Tool::get();
        return view('histories.index', [
            'historys' => $historys,
            'tools' => $tools ]);
    }

    public function show(History $history)
    {
        $tool = Tool::where("id",$history->tool_id)->first();
        return view('histories.show', ['history' => $history,'tool' => $tool]);
    }
}
