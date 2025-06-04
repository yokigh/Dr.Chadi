<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConditionController extends Controller
{
    public function index($lang)
    {
        $conditions = Condition::all();
        return view('admin.condition.index', compact('conditions', 'lang'));
    }

    public function create($lang)
    {
        return view('admin.condition.create', compact('lang'));
    }

    public function store($lang, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'image' => 'nullable|image|max:10000',
            'images.*' => 'nullable|image|max:10000',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:50000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $condition = new Condition($request->except('image', 'images', 'video'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/condition/image');
            $image->move($path, $name);
            $condition->image = 'storage/condition/image/' . $name;
        }

        if ($request->hasFile('images')) {
            $gallery = [];
            foreach ($request->file('images') as $img) {
                $name = time() . rand(1000, 9999) . '.' . $img->getClientOriginalExtension();
                $path = public_path('storage/condition/images');
                if (!file_exists($path)) mkdir($path, 0777, true);
                $img->move($path, $name);
                $gallery[] = 'storage/condition/images/' . $name;
            }
            $condition->images = json_encode($gallery);
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $name = time() . '.' . $video->getClientOriginalExtension();
            $path = public_path('storage/condition/video');
            $video->move($path, $name);
            $condition->video = 'storage/condition/video/' . $name;
        }

        $condition->save();
        return redirect()->route('conditions.index', $lang)->with('success', __('messages.condition_created_successfully'));
    }

    public function edit($lang, Condition $condition)
    {
        return view('admin.condition.edit', compact('condition', 'lang'));
    }

    public function update($lang, Request $request, Condition $condition)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'image' => 'nullable|image|max:10000',
            'images.*' => 'nullable|image|max:10000',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:50000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $condition->update($request->except('image', 'images', 'video'));

        if ($request->hasFile('image')) {
            if ($condition->image && file_exists(public_path($condition->image))) {
                unlink(public_path($condition->image));
            }
            $img = $request->file('image');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $path = public_path('storage/condition/image');
            $img->move($path, $name);
            $condition->image = 'storage/condition/image/' . $name;
        }

        if ($request->hasFile('images')) {
            if (!empty($condition->images)) {
                $old = json_decode($condition->images, true);
                foreach ($old as $img) {
                    if (file_exists(public_path($img))) unlink(public_path($img));
                }
            }
            $gallery = [];
            foreach ($request->file('images') as $img) {
                $name = time() . rand(1000, 9999) . '.' . $img->getClientOriginalExtension();
                $path = public_path('storage/condition/images');
                $img->move($path, $name);
                $gallery[] = 'storage/condition/images/' . $name;
            }
            $condition->images = json_encode($gallery);
        }

        if ($request->hasFile('video')) {
            if ($condition->video && file_exists(public_path($condition->video))) {
                unlink(public_path($condition->video));
            }
            $vid = $request->file('video');
            $name = time() . '.' . $vid->getClientOriginalExtension();
            $path = public_path('storage/condition/video');
            $vid->move($path, $name);
            $condition->video = 'storage/condition/video/' . $name;
        }

        $condition->save();
        return redirect()->route('conditions.index', $lang)->with('success', __('messages.condition_updated_successfully'));
    }

    public function destroy($lang, Condition $condition)
    {
        if ($condition->image && file_exists(public_path($condition->image))) {
            unlink(public_path($condition->image));
        }

        if (!empty($condition->images)) {
            foreach (json_decode($condition->images, true) as $img) {
                if (file_exists(public_path($img))) unlink(public_path($img));
            }
        }

        if ($condition->video && file_exists(public_path($condition->video))) {
            unlink(public_path($condition->video));
        }

        $condition->delete();
        return redirect()->route('conditions.index', $lang)->with('success', __('messages.condition_deleted_successfully'));
    }
}
