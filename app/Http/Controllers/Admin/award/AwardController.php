<?php

namespace App\Http\Controllers\admin\award;

use App\Models\award;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('permission:awards read');
        $this->middleware('permission:awards create')->only('create', 'store');
        $this->middleware('permission:awards update')->only('edit', 'update');
        $this->middleware('permission:awards delete')->only('destroy');

        view()->share('menuActive', 'landing-page');
        view()->share('subMenuActive', 'awards');
    }

    public function index(Request $request)
    {
        $data['models'] = award::orderBy('id', 'desc')->paginate('10');
        return view('admin.awards.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.awards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'image'
        ]);

        $path = $request->file('image')->store('award');

        $award = new award($request->all());

        $image = $award->uploadImage($request->file('image'), 'ugc/awards');
        $award->image = $image->lg;
        $award->save();

        return redirect()->route('admin.awards.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(award $award)
    {
        return view('admin.awards.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, award $award)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {
            $award->deleteImage(@$award->image->path);

            $newImage = $award->uploadImage($request->file('image'), 'ugc/awards');
            $award->name = $request->name;
            $award->description = $request->description;
            $award->image = $newImage->lg;
            $award->save();
        } else {
            $award->update($request->only('name', 'description', 'url', 'type'));
        }   
        return redirect()->route('admin.awards.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(award $award)
    {
        if (Storage::exists($award->image->path)) {
            Storage::delete($award->image->path);
        }

        if ($award->delete()) {
            return redirect()->route('admin.awards.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.awards.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
