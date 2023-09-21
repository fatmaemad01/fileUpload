<?php

namespace App\Http\Controllers;

use App\Events\FileDownload;
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

    public function index(Request $request, User $user)
    {
            $files = $user->files;
            return view('dashboard', compact('files'));
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

        return redirect()->route('file.show', $File->id);
    }

    public function show(File $File)
    {
        $Link = URL::SignedRoute('file.download',  $File->link);

        return view('show', [
            'File' => $File,
            'Link' => $Link
        ]);
    }

    public function downloadPage(File $File)
    {
        // dd($File);
        $Link = URL::SignedRoute('file.download',  $File->link);

        return view('download',[
            'File' => $File,
            'Link' => $Link
        ]);
    }


    public function download($link)
    {
        $File = File::where('link', '=', $link)->first();

        event(new FileDownload($File));

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
