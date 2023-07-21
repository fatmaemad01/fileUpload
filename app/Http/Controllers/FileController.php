<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        $files = File::all();
        return view('index', compact('files'));
    }

    public function create()
    {
        return view('upload');
    }


    public function upload(FileRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = File::uploadFile($file);
            $validated['path'] = $path;
        }

        $request['filename'] = $file->getClientOriginalName();
        $validated['link'] = Str::random(8);
        $File = File::create($validated);

        return view('download', compact('File'));
    }

    
    public function download($link)
    {
        $File = File::where('link', '=', $link)->first();

        return Storage::download($File->path, $File->filename);
    }


    public function destroy(File $file)
    {
        $file->delete();
        if ($file->path) {
            Storage::delete($file->path);
        }
        return redirect()->route('files.index');
    }
}
