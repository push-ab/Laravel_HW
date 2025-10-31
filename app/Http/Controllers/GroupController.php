<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $groups = Group::withCount('students')->get();
        return view('group_index', compact('groups'));
    }

    public function create()
    {
        return view('group_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_from' => 'required|date',
            'is_active' => 'boolean'
        ]);

        Group::create($request->all());
        return redirect()->route('groupindex');
    }

    public function show(Group $group)
    {
        $group->load('students');
        return view('group_show', compact('group'));
    }
}
