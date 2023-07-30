<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index($id)
    {
        if (Auth::id() == $id) {
            $files = File::where('user_id', '=', $id)->get();
            // dd($files);
            return view('index', [
                'files' => $files,
            ]);
        } else {
            abort(404);
        }
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
        $validated['user_id'] = Auth::id();

        $File = File::create($validated);

        $Link = URL::SignedRoute('file.download',  $File->link);


        return view('download', [
            'File' => $File,
            'Link' => $Link,
        ]);
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
        return redirect()->route('files.index', Auth::id());
    }
}
