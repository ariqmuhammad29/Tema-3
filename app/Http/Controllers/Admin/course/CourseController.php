<?php

namespace App\Http\Controllers\Admin\course;

use App\Models\course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // $this->slider = new Slider(); # <-- iki gae opo, kan hanya digunakan di fungsi `store` tok?

        $this->middleware('permission:courses read');
        $this->middleware('permission:courses create')->only('create', 'store');
        $this->middleware('permission:courses update')->only('edit', 'update');
        $this->middleware('permission:courses delete')->only('destroy');

        view()->share('menuActive', 'landing-page');
        view()->share('subMenuActive', 'courses');
    }

    public function index()
    {
        $data['models'] = course::orderBy('id', 'desc')->paginate(10);

        return view('admin.courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
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

        $path = $request->file('image')->store('course');

        $course = new course($request->all());

        $image = $course->uploadImage($request->file('image'), 'ugc/courses');
        $course->image = $image->lg;
        $course->save();

        return redirect()->route('admin.courses.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, course $course)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {
            $course->deleteImage(@$course->image->path);

            $newImage = $course->uploadImage($request->file('image'), 'ugc/courses');
            $course->title = $request->title;
            $course->description = $request->description;
            $course->image = $newImage->lg;
            $course->save();
        } else {
            $course->update($request->only('title', 'description', 'url', 'type'));
        }   
        return redirect()->route('admin.courses.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        if (Storage::exists($course->image->path)) {
            Storage::delete($course->image->path);
        }

        if ($course->delete()) {
            return redirect()->route('admin.courses.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.courses.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
