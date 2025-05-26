<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $products = Product::all();
        return view('admin.product.index', compact('products', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $categories = Category::all();
        return view('admin.product.create', compact('lang', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($lang, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product($request->except('image', 'images'));

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/product/image');
            $img->move($path, $name);
            $imager = "storage/product/image/" . $name;
            $product->image = $imager;
        }

        // رفع مجموعة الصور
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $name = time() . rand(1000, 9999) . '.' . $ext; // لضمان عدم تكرار الأسماء
                $path = public_path('storage/product/images');

                // التأكد من أن المجلد موجود، وإذا لم يكن موجودًا، يتم إنشاؤه
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $img->move($path, $name);
                $images[] = "storage/product/images/" . $name; // تخزين المسار النسبي
            }
            $gallary_images = json_encode($images);
            $product->images = $gallary_images;
        }
        $product->save();

        return redirect()->route('product.index', ['lang' => app()->getLocale()])->with('success', __('messages.product_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->update($request->except('image', 'images'));

        // ✅ Replace main image
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/product/image');
            $img->move($path, $name);
            $product->image = "storage/product/image/" . $name;
        }

        // ✅ Replace gallery images
        if ($request->hasFile('images')) {
            // Delete old gallery images if they exist
            if (!empty($product->images)) {
                $oldImages = is_array($product->images) ? $product->images : json_decode($product->images, true);
                foreach ($oldImages as $oldImage) {
                    if (file_exists(public_path($oldImage))) {
                        unlink(public_path($oldImage));
                    }
                }
            }

            $images = [];
            foreach ($request->file('images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $name = time() . rand(1000, 9999) . '.' . $ext;
                $path = public_path('storage/product/images');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $img->move($path, $name);
                $images[] = "storage/product/images/" . $name;
            }

            $product->images = json_encode($images);
        }

        $product->save();

        return redirect()->route('product.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.product_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Product $product)
    {
        // Delete main image
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Delete gallery images
        if (!empty($product->images)) {
            $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
            foreach ($images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $product->delete();

        return redirect()->route('product.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.product_deleted_successfully'));
    }
}
