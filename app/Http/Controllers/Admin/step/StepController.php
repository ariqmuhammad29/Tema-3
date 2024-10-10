<?php

namespace App\Http\Controllers\Admin\Step;

use App\Models\step;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // $this->slider = new Slider(); # <-- iki gae opo, kan hanya digunakan di fungsi `store` tok?

        $this->middleware('permission:steps read');
        $this->middleware('permission:steps create')->only('create', 'store');
        $this->middleware('permission:steps update')->only('edit', 'update');
        $this->middleware('permission:steps delete')->only('destroy');

        view()->share('menuActive', 'landing-page');
        view()->share('subMenuActive', 'steps');
    }

    public function index()
    {
        $data['models'] = step::orderBy('id', 'desc')->paginate(10);

        return view('admin.steps.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.steps.create');
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

        $path = $request->file('image')->store('step');

        $step = new step($request->all());

        $image = $step->uploadImage($request->file('image'), 'ugc/steps');
        $step->image = $image->lg;
        $step->save();

        return redirect()->route('admin.steps.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(step $step)
    {
        return view('admin.steps.edit', compact('step'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, step $step)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {
            $step->deleteImage(@$step->image->path);

            $newImage = $step->uploadImage($request->file('image'), 'ugc/steps');
            $step->title = $request->title;
            $step->description = $request->description;
            $step->image = $newImage->lg;
            $step->save();
        } else {
            $step->update($request->only('title', 'description', 'url', 'type'));
        }   
        return redirect()->route('admin.steps.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(step $step)
    {
        if (Storage::exists($step->image->path)) {
            Storage::delete($step->image->path);
        }

        if ($step->delete()) {
            return redirect()->route('admin.steps.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.steps.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
