<?php

namespace App\Http\Controllers;

use App\Models\tblCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = tblCategory::all();
        $categories = DB::table('tbl_categories')->get();
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
        $data = $request->validate([
            'nama' => 'required',
            'coverr' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        if ($request->hasFile('coverr')) {
            $coverPath = $request->file('coverr')->store('category_covers', 'public');
            $data['coverr'] = $coverPath;
        }

        $dataSlug = Str::slug($data['nama']);
        DB::table('tbl_categories')->insert([
            'name' => $data['nama'],
            'slug' => $dataSlug,
            'cover' => $data['coverr'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // tblCategory::create($data);

        return redirect()->route('dashboard.category.index')->with('success', 'Category created successfully');
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
            // 'category' => tblCategory::findOrFail($id),
            'category' => DB::table('tbl_categories')->where('id', $id)->first(),
        ]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'cover' => 'sometimes|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        // $category = tblCategory::findOrFail($id);
        $category = DB::table('tbl_categories')->where('id', $id)->first();

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('category_covers', 'public');
            if ($category->cover) {
                Storage::disk('public')->delete($category->cover);
            }
            $data['cover'] = $coverPath;
        }

        $data['slug'] = Str::slug($data['name']);

        // $category->update($data);
        DB::table('tbl_categories')->where('id', $id)->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'cover' => $data['cover'],
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard.category.index')->with('success', 'Category updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $category = tblCategory::findOrFail($id);
        $category = DB::table('tbl_categories')->where('id', $id)->first();
        if ($category->cover) {
            Storage::disk('public')->delete($category->cover);
        }
        // $category->delete();
        DB::table('tbl_categories')->where('id', $id)->delete();


        // Alert::success('Berhasil', 'Kategori berhasil dihapus');
        return redirect()->route('dashboard.category.index')->with('success', 'Category deleted successfully');
    }
}
