<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }


    public function create($lang)
    {
        return view('admin.about.create');
    }
    public function store($lang, Request $request)
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
        $about = new About($request->except('image', 'images'));


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/about/image');
            $img->move($path, $name);
            $imager = "storage/about/image/" . $name;
            $about->image = $imager;
        }

        // رفع مجموعة الصور
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $name = time() . rand(1000, 9999) . '.' . $ext; // لضمان عدم تكرار الأسماء
                $path = public_path('storage/about/images');

                // التأكد من أن المجلد موجود، وإذا لم يكن موجودًا، يتم إنشاؤه
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $img->move($path, $name);
                $images[] = "storage/about/images/" . $name; // تخزين المسار النسبي
            }
            $gallary_images = json_encode($images);
            $about->images = $gallary_images;
        }

        $about->save();

        return redirect()->route('abouts.index', ['lang' => app()->getLocale()])->with('success', __('messages.about_created_successfully'));
    }

    public function edit($lang, About $about)
    {
        return view('admin.about.edit', compact('about'));
    }
    public function update($lang, Request $request, About $about)
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

        $about->update($request->except('image', 'images'));

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/about/image');
            $img->move($path, $name);
            $about->image = "storage/about/image/" . $name;
        }

        // ✅ Replace gallery images
        if ($request->hasFile('images')) {
            // Delete old gallery images if they exist
            if (!empty($about->images)) {
                $oldImages = is_array($about->images) ? $about->images : json_decode($about->images, true);
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
                $path = public_path('storage/about/images');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $img->move($path, $name);
                $images[] = "storage/about/images/" . $name;
            }

            $about->images = json_encode($images);
        }

        $about->save();

        return redirect()->route('abouts.index', ['lang' => app()->getLocale()])->with('success', __('messages.about_updated_successfully'));
    }

    public function destroy($lang, About $about)
    {
        // Delete main image
        if ($about->image && file_exists(public_path($about->image))) {
            unlink(public_path($about->image));
        }

        // Delete gallery images
        if (!empty($about->images)) {
            $images = is_array($about->images) ? $about->images : json_decode($about->images, true);
            foreach ($images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $about->delete();

        return redirect()->route('abouts.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.about_deleted_successfully'));
    }
    public function show($lang, About $about)
    {
        $name = 'name_' . $lang;
        $desc = 'desc_' . $lang;
        return view('admin.about.show', compact('about', 'name', 'desc'));
    }
}
