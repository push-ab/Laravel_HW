<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
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
        return redirect()->route('group_index');
    }

    public function show(Group $group)
    {
        $group->load('students');
        return view('group_show', compact('group'));
    }
}
