<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', ProductCategory::class);
        $productCategories = ProductCategory::select('*');

        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $productCategories->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($request->s) {
            $productCategories->where('name', 'LIKE', '%' . $request->s . '%');
            $productCategories->orwhere('id', $request->s);
        }

        $productCategories = $productCategories->orderBy('id', 'desc')->paginate(3);

        $params = [
            'productCategories' => $productCategories,
            'filter' => $request->filter
        ];

        return view('admin.productCategories.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', ProductCategory::class);
        return view('admin.productCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        try {
            $productCategory->save();
            return redirect()->route('productCategories.index')->with('success', 'Thêm danh mục' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('productCategories.index')->with('success', 'Thêm danh mục' . ' ' . $request->name . ' ' . 'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);
        $this->authorize('update', $productCategory);
        $params = [
            'productCategory' => $productCategory
        ];

        return view('admin.productCategories.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request,  $id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->input('name');
        try {
            $productCategory->save();
            return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'Không thành công');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategoryz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $productCategory = ProductCategory::find($id);
        $this->authorize('delete', $productCategory);
        try {
            $productCategory->delete();
            return redirect()->route('productCategories.index')->with('success', 'Xóa  thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('productCategories.index')->with('success', 'Xóa không thành công');
        }
    }



    public function trashedItems(Request $request)
    {
        $productCategories = ProductCategory::onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $productCategories = $productCategories->orderBy('id', 'desc')->paginate(3);

        $params = [
            'productCategories' => $productCategories,
            'filter' => $request->filter
        ];

        return view('admin.productCategories.trash', $params);
    }

    public function force_destroy($id)
    {

        $productCategory = ProductCategory::withTrashed()->find($id);
        // dd($ProductCategory);
        $this->authorize('forceDelete', $productCategory);
        try {
            $productCategory->forceDelete();
            return redirect()->route('productCategories.trash')->with('success', 'Xóa' . ' ' . $productCategory->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('productCategories.trash')->with('error', 'Xóa' . ' ' . $productCategory->name . ' ' .  'không thành công');
        }
    }


    public function restore($id)
    {
        $productCategory = ProductCategory::withTrashed()->find($id);
        $this->authorize('restore', $productCategory);

        try {
            $productCategory->restore();
            return redirect()->route('productCategories.trash')->with('success', 'Khôi phục' . ' ' . $productCategory->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('productCategories.trash')->with('error', 'Khôi phục' . ' ' . $productCategory->name . ' ' .  'không thành công');
        }
    }
}
