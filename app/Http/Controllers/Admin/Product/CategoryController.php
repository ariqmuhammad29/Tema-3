<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product\CategoryProduct;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:product categories read');
        $this->middleware('permission:product categories create')->only('create', 'store');
        $this->middleware('permission:product categories update')->only('edit', 'update');
        $this->middleware('permission:product categories delete')->only('destroy');

        view()->share('menuActive', 'product');
        view()->share('subMenuActive', 'product-categories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //$data['models'] = CategoryProduct::orderBy('id', 'desc')->paginate(10);
        $data['models'] = $request->get('keyword')
            ? CategoryProduct::search($request->keyword)->paginate(5)
            : CategoryProduct::orderBy('id', 'desc')->paginate(5);

        return view('admin.product.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.categories.create');
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
            'name' => 'required|max:200',
            'description' => 'required',
        ]);

        $category = new CategoryProduct($request->all());
        $category->save();

        return redirect()
            ->route('admin.product.categories.index')
            ->with([
                'message' => 'Save Successfully'
            ]);
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
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryProduct $category)
    {
        return view('admin.product.categories.edit', ['model' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryProduct $category)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required',
        ]);

        if ($category->update($request->all())) {
            return redirect()->route('admin.product.categories.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }

        return redirect()->route('admin.product.categories.edit', $category->id)->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(CategoryProduct $category)
    {
        if ($category->delete()) {
            return redirect()->route('admin.product.categories.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.product.categories.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
