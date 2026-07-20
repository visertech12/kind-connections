<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lubricant;
use Illuminate\Support\Str;

class LubricantController extends Controller
{
    public function index()
    {
        $pageTitle = 'Lubricants';
        $lubricants = Lubricant::when(request('search'), fn($q) => $q->where('name', 'like', '%' . request('search') . '%'))
            ->when(request('status') !== null && request('status') !== '', fn($q) => $q->where('status', request('status')))
            ->latest()
            ->paginate(15);

        return view('admin.lubricant.index', compact('pageTitle', 'lubricants'));
    }

    public function create()
    {
        $pageTitle  = 'Add New Lubricant';
        return view('admin.lubricant.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'regular_price' => 'required|numeric|min:0',
            'description'   => 'required',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $lubricant                = new Lubricant();
        $lubricant->name          = $request->name;
        $lubricant->slug          = $this->makeSlug($request->name);
        $lubricant->regular_price = $request->regular_price;
        $lubricant->description   = $request->description;
        $lubricant->status        = $request->status ?? 1;
        $lubricant->featured      = $request->featured ? 1 : 0;
        
        $attrs = [];
        if ($request->demo_url) {
            $attrs['Demo URL'] = $request->demo_url;
        }
        $lubricant->attributes    = $attrs;

        if ($request->hasFile('image')) {
            $path = public_path('assets/images/lubricants');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $lubricant->image = uploadImage($request->file('image'), $path, '800x500');
        }

        $lubricant->save();

        return redirect()->route('admin.lubricant.index')->with('success', 'Lubricant created successfully.');
    }

    public function edit($id)
    {
        $pageTitle  = 'Edit Lubricant';
        $lubricant    = Lubricant::findOrFail($id);
        return view('admin.lubricant.edit', compact('pageTitle', 'lubricant'));
    }

    public function update(Request $request, $id)
    {
        $lubricant = Lubricant::findOrFail($id);
        $request->validate([
            'name'          => 'required|max:255',
            'regular_price' => 'required|numeric|min:0',
            'description'   => 'required',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $lubricant->name          = $request->name;
        $lubricant->slug          = $this->makeSlug($request->name, $lubricant->id);
        $lubricant->regular_price = $request->regular_price;
        $lubricant->description   = $request->description;
        $lubricant->status        = $request->status ?? 0;
        $lubricant->featured      = $request->featured ? 1 : 0;

        $attrs = $lubricant->attributes ? (array) $lubricant->attributes : [];
        if ($request->demo_url) {
            $attrs['Demo URL'] = $request->demo_url;
        } else {
            unset($attrs['Demo URL']);
        }
        $lubricant->attributes = $attrs;

        if ($request->hasFile('image')) {
            $path  = public_path('assets/images/lubricants');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $old   = $lubricant->image;
            if ($old && !str_starts_with($old, 'http')) {
                @unlink($path . '/' . $old);
            }
            $lubricant->image = uploadImage($request->file('image'), $path, '800x500');
        }

        $lubricant->save();

        return redirect()->route('admin.lubricant.index')->with('success', 'Lubricant updated successfully.');
    }

    public function delete($id)
    {
        $lubricant = Lubricant::findOrFail($id);
        if ($lubricant->image && !str_starts_with($lubricant->image, 'http')) {
            @unlink(public_path('assets/images/lubricants/' . $lubricant->image));
        }
        $lubricant->delete();
        return redirect()->route('admin.lubricant.index')->with('success', 'Lubricant deleted successfully.');
    }

    // ---- Helpers ----

    private function makeSlug(string $name, $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i    = 1;
        while (Lubricant::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
