<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $events = Event::all();
        return view('admin.event.index', compact('events', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.event.create', compact('lang'));
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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $event = new Event($request->except('image', 'images'));
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/event/image');
            $img->move($path, $name);
            $imager = "storage/event/image/" . $name;
            $event->image = $imager;
        }

        // رفع مجموعة الصور
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $name = time() . rand(1000, 9999) . '.' . $ext; // لضمان عدم تكرار الأسماء
                $path = public_path('storage/event/images');

                // التأكد من أن المجلد موجود، وإذا لم يكن موجودًا، يتم إنشاؤه
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $img->move($path, $name);
                $images[] = "storage/event/images/" . $name; // تخزين المسار النسبي
            }
            $gallary_images = json_encode($images);
            $event->images = $gallary_images;
        }
        $event->save();

        return redirect()->route('event.index', ['lang' => app()->getLocale()])->with('success', __('messages.event_created_successfully'));
    
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
    public function edit($lang, Event $event)
    {
        return view('admin.event.edit', compact('event', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $event->update($request->except('image', 'images'));

        // ✅ Replace main image
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }

            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/event/image');
            $img->move($path, $name);
            $event->image = "storage/event/image/" . $name;
        }

        // ✅ Replace gallery images
        if ($request->hasFile('images')) {
            // Delete old gallery images if they exist
            if (!empty($event->images)) {
                $oldImages = is_array($event->images) ? $event->images : json_decode($event->images, true);
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
                $path = public_path('storage/event/images');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $img->move($path, $name);
                $images[] = "storage/event/images/" . $name;
            }

            $event->images = json_encode($images);
        }

        $event->save();

        return redirect()->route('event.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.event_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Event $event)
    {
        // Delete main image
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        // Delete gallery images
        if (!empty($event->images)) {
            $images = is_array($event->images) ? $event->images : json_decode($event->images, true);
            foreach ($images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $event->delete();

        return redirect()->route('event.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.event_deleted_successfully'));
    }
}
