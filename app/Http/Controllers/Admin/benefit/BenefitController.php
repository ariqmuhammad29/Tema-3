<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Models\Benefit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BenefitController extends Controller
{
  
    public function __construct()
    {
        // $this->slider = new Slider(); # <-- iki gae opo, kan hanya digunakan di fungsi `store` tok?

        $this->middleware('permission:benefits read');
        $this->middleware('permission:benefits create')->only('create', 'store');
        $this->middleware('permission:benefits update')->only('edit', 'update');
        $this->middleware('permission:benefits delete')->only('destroy');

        view()->share('menuActive', 'landing-page');
        view()->share('subMenuActive', 'benefits');
    }

    public function index()
    {
        $data['models'] = Benefit::orderBy('id', 'desc')->paginate(10);

        return view('admin.benefits.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.benefits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'image' => 'image'
        ]);

        $path = $request->file('image')->store('benefit');

        $benefit = new Benefit($request->all());

        $image = $benefit->uploadImage($request->file('image'), 'ugc/benefits');
        $benefit->image = $image->lg;
        $benefit->save();

        return redirect()->route('admin.benefits.index')->with(['status' => 'success', 'message' => 'Save Successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Benefit $benefit)
    {
        return view('admin.benefits.edit', compact('benefit'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Benefit $benefit)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {
            $benefit->deleteImage(@$benefit->image->path);

            $newImage = $benefit->uploadImage($request->file('image'), 'ugc/benefits');
            $benefit->title = $request->title;
            $benefit->description = $request->description;
            $benefit->image = $newImage->lg;
            $benefit->save();
        } else {
            $benefit->update($request->only('title', 'description', 'url', 'type'));
        }   
        return redirect()->route('admin.benefits.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Benefit $benefit)
    {
        if (Storage::exists($benefit->image->path)) {
            Storage::delete($benefit->image->path);
        }

        if ($benefit->delete()) {
            return redirect()->route('admin.benefits.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.benefits.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
