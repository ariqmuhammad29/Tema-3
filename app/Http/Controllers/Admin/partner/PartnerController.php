<?php

namespace App\Http\Controllers\admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function __construct() {
        $this->middleware('permission:partners read');
        $this->middleware('permission:partners create')->only('create', 'store');
        $this->middleware('permission:partners update')->only('edit', 'update');
        $this->middleware('permission:partners delete')->only('destroy');

        view()->share('menuActive', 'landing-page');
        view()->share('subMenuActive', 'partners');
    }

    public function index(Request $request)
    {
        $partners = Partner::ordered()->paginate(10);

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'about' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg']
        ]);

        $partner = new Partner($request->all());

        $image = $partner->uploadImage($request->file('image'), 'ugc/partners');
        
        $partner->image = $image->lg;
        $partner->save();

        return redirect()->route('admin.partners.index')->with([
            'status' => 'success',
            'message' => 'New partner has been stored :)'
        ]);
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => ['required'],
            'about' => ['required'],
            'image' => ['file', 'mimes:png,jpg,jpeg']
        ]);

        $payload = $request->all();

        if ($request->hasFile('image')) {
            $newImage = $partner->uploadImage($request->file('image'), 'ugc/partners');
            
            if ($newImage) {
                $partner->deleteImage();
            }

            $payload['image'] = $newImage->lg;
        }

        $partner->update($payload);

        return redirect()->route('admin.partners.index')->with([
            'status' => 'success',
            'message' => 'partner has been updated :)'
        ]);
    }

    public function destroy(Request $request, Partner $partner)
    {
        if (Storage::exists($partner->image->path)) {
            Storage::delete($partner->image->path);
        }

        if ($partner->delete()) {
            return redirect()->route('admin.partners.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.partners.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
