<?php

namespace App\Http\Controllers\Admin\daftar;

use App\Models\daftar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('permission:daftars read');
        $this->middleware('permission:daftars create')->only('create', 'store');
        $this->middleware('permission:daftars edit')->only('edit', 'update');
        $this->middleware('permission:daftars delete')->only('destroy');

        view()->share('menuActive', 'daftars');
        view()->share('subMenuActive', 'daftars');
    }
    public function index()
    {
        $data['models'] = daftar::orderBy('is_viewed', 'asc')->paginate(10);
        return view('admin.daftars.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(daftar $daftar)
    {
        $daftar->is_viewed = 1;
        $daftar->save();

        return view('admin.daftars.edit', ['model' => $daftar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, daftar $daftar)
    {
        $request->validate([
            'respond' => 'required'
        ]);

        $daftar->respond = $request->respond;

        if ($daftar->save()) {
            Mail::raw($request->respond, function ($message) use ($request) {
                $message->to($request->email);
                $message->from('email@compro.test');
                $message->subject('daftar Reply');
            });

            return redirect()->route('admin.daftars.index')->with(['status' => 'success', 'message' => 'Reply Successfully']);
        }
        return redirect()->route('admin.daftars.index')->with(['status' => 'danger', 'message' => 'Reply Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(daftar $daftar)
    {
        if ($daftar->delete()) {
            return redirect()->route('admin.daftars.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.daftars.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
