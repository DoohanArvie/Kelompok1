<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\tblCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = tblCategory::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('admin.category.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  request()->validate([
            'name' => 'required',
        ]);

        $data['slug'] = Str::slug($data['name']);
        tblCategory::create($data);

        return redirect()->route('dashboard.category.index')->with('success', 'Category created successfully');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.category.edit', [
            'category' => tblCategory::findOrFail($id),
        ]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  request()->validate([
            'name' => 'required',
        ]);

        $data['slug'] = Str::slug($data['name']);
        tblCategory::findOrFail($id)->update($data);

        return redirect()->route('dashboard.category.index')->with('success', 'Category updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        tblCategory::findOrFail($id)->delete();
        return redirect()->route('dashboard.category.index')->with('success', 'Category deleted successfully');

        //
    }
}
