<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $categorys = Category::all();
        return view('admin.category.index', compact('categorys', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.category.create', compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($lang, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = new Category($request->except('image', 'images'));


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/category/image');
            $img->move($path, $name);
            $imager = "storage/category/image/" . $name;
            $category->image = $imager;
        }

        // رفع مجموعة الصور
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $name = time() . rand(1000, 9999) . '.' . $ext; // لضمان عدم تكرار الأسماء
                $path = public_path('storage/category/images');

                // التأكد من أن المجلد موجود، وإذا لم يكن موجودًا، يتم إنشاؤه
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $img->move($path, $name);
                $images[] = "storage/category/images/" . $name; // تخزين المسار النسبي
            }

            $gallary_images = json_encode($images);
            $category->images = $gallary_images;
        }

        $category->save();

        return redirect()->route('category.index', ['lang' => app()->getLocale()])->with('success', __('messages.category_created_successfully'));
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
    public function edit($lang, Category $category)
    {
        return view('admin.category.edit', compact('category', 'lang'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update($request->except('image', 'images'));

        // ✅ Replace main image
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/category/image');
            $img->move($path, $name);
            $category->image = "storage/category/image/" . $name;
        }

        // ✅ Replace gallery images
        if ($request->hasFile('images')) {
            // Delete old gallery images if they exist
            if (!empty($category->images)) {
                $oldImages = is_array($category->images) ? $category->images : json_decode($category->images, true);
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
                $path = public_path('storage/category/images');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $img->move($path, $name);
                $images[] = "storage/category/images/" . $name;
            }

            $category->images = json_encode($images);
        }

        $category->save();

        return redirect()->route('category.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.category_updated_successfully'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Category $category)
    {
        // Delete main image
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        // Delete gallery images
        if (!empty($category->images)) {
            $images = is_array($category->images) ? $category->images : json_decode($category->images, true);
            foreach ($images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $category->delete();

        return redirect()->route('category.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.category_deleted_successfully'));
    }
}
