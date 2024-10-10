<?php

namespace App\Http\Controllers\Admin\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function __construct() {
        $this->middleware('permission:services read');
        $this->middleware('permission:services create')->only('create', 'store');
        $this->middleware('permission:services update')->only('edit', 'update');
        $this->middleware('permission:services delete')->only('destroy');

        view()->share('menuActive', 'landing-page');
        view()->share('subMenuActive', 'services');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = Service::orderBy('id', 'desc')->Service()->paginate(10);
        return view('admin.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|max:250',
            'description_short'=> 'required',
            'type'            => 'required',
            'description'     => 'required',
            'image'           => 'required|image'
        ]);

        $service = new Service($request->all());

        $image = $service->uploadImage($request->file('image'), 'ugc/service');
        $service->image = $image->lg;

        $service->save();

        return redirect()
            ->route('admin.services.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $data['model'] = $service;
        return view('admin.services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'           => 'required|max:250',
            'description_short'=> 'required',
            'description'     => 'required',
            'image'           => 'image'
        ]);

        if ($request->hasFile('image')) {
            $newImage = $service->uploadImage($request->file('image'), 'ugc/service');

            $payload = $request->all();

            if ($newImage) {
                $payload['image'] = $newImage->lg;

                $service->deleteImage();
            }

            $service->update($payload);
        } else {
            $service->update($request->all());
        }

        return redirect()->route('admin.services.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Service $service
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        if (Storage::exists($service->image)) {
            Storage::delete($service->image);
        }

        if ($service->delete()) {
            return redirect()->route('admin.services.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.services.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
