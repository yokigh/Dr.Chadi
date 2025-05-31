<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $certificates = Certificate::all();
        return view('admin.certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.certificate.create');
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
        $certificate = new Certificate($request->except('image'));


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/certificate/image');
            $img->move($path, $name);
            $imager = "storage/certificate/image/" . $name;
            $certificate->image = $imager;
        }
        $certificate->save();

        return redirect()->route('certificates.index', ['lang' => app()->getLocale()])->with('success', __('messages.certificate_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($lang, Certificate $certificate)
    {
        return view('admin.certificate.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Certificate $certificate)
    {
        return view('admin.certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Certificate $certificate)
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
        $certificate->update($request->except('image'));
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($certificate->image && file_exists(public_path($certificate->image))) {
                unlink(public_path($certificate->image));
            }

            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/certificate/image');
            $img->move($path, $name);
            $certificate->image = "storage/certificate/image/" . $name;
        }
        $certificate->save();

        return redirect()->route('certificates.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.certificate_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Certificate $certificate)
    {
        // Delete main image
        if ($certificate->image && file_exists(public_path($certificate->image))) {
            unlink(public_path($certificate->image));
        }

        $certificate->delete();

        return redirect()->route('certificates.index', ['lang' => app()->getLocale()])
            ->with('success', __('messages.certificate_deleted_successfully'));
    }
}
