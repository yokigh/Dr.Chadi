<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($lang, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider = new Slider($request->except('image'));


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/slider/image');
            $img->move($path, $name);
            $imager = "storage/slider/image/" . $name;
            $slider->image = $imager;
        }
        $slider->save();

        return redirect()->route('sliders.index', ['lang' => app()->getLocale()])->with('success', __('messages.slider_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.slider.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider->update($request->except('image'));
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/slider/image');
            $img->move($path, $name);
            $slider->image = "storage/slider/image/" . $name;
        }
        $slider->save();

        return redirect()->route('sliders.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.slider_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Slider $slider)
    {
        // Delete main image
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        $slider->delete();

        return redirect()->route('sliders.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.slider_deleted_successfully'));
    }
}
