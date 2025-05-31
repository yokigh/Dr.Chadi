<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($lang, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'files'   => 'nullable|array',
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp,mp4,mov,avi,pdf|max:20480',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileExtensions = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $extension = strtolower($file->getClientOriginalExtension());
                    $fileExtensions[] = $extension;
                }
            }

            $uniqueExtensions = array_unique($fileExtensions);

            if (count($uniqueExtensions) > 1) {
                return redirect()->back()->withErrors([
                    'files' => 'You can only upload files of one type (e.g., only PDFs, only images, or only videos).'
                ])->withInput();
            }
        }

        $blog = new Blog($request->except('files'));

        $uploadedFilePaths = [];
        $targetPath = public_path('storage/blog/blog_files/');

        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '_' . Str::random(5) . '.' . $extension;

                    $file->move($targetPath, $fileName);
                    $uploadedFilePaths[] = 'storage/blog/blog_files/' . $fileName;
                }
            }
        }

        $blog->files = $uploadedFilePaths;
        $blog->type = !empty($fileExtensions) ? $fileExtensions[0] : null;

        $blog->save();

        return redirect()->route('blogs.index', ['lang' => $lang])
            ->with('success', 'Blog post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($lang, Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'files'   => 'nullable|array',
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp,mp4,mov,avi,pdf|max:20480',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileExtensions = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $fileExtensions[] = strtolower($file->getClientOriginalExtension());
                }
            }

            if (count(array_unique($fileExtensions)) > 1) {
                return redirect()->back()->withErrors([
                    'files' => 'You can only upload files of one type.'
                ])->withInput();
            }
        }

        // Fill other attributes
        $blog->fill($request->except('files'));

        $targetPath = public_path('storage/blog/blog_files/');
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }

        if ($request->hasFile('files')) {
            // ✅ Delete old files first
            if (!empty($blog->files)) {
                foreach ($blog->files as $oldFile) {
                    $fullPath = public_path($oldFile);
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
            }

            // ✅ Reset file paths array
            $uploadedFilePaths = [];

            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $fileName = time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                    $file->move($targetPath, $fileName);
                    $uploadedFilePaths[] = 'storage/blog/blog_files/' . $fileName;
                }
            }

            $blog->files = $uploadedFilePaths;
            $blog->type = $fileExtensions[0];
        }

        $blog->save();

        return redirect()->route('blogs.index', ['lang' => $lang])
            ->with('success', 'Blog post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Blog $blog)
    {
        if (!empty($blog->files)) {
            foreach ($blog->files as $path) {
                $fullPath = public_path($path);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }

        $blog->delete();

        return redirect()->route('blogs.index', ['lang' => $lang])
            ->with('success', 'Blog post deleted successfully.');
    }
}
