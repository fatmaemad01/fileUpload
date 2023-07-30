<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Upload</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <div class=" text-right z-10" style="margin-right: 20px;">
            @auth
            <a href="{{ url('/dashboard') }}" class="mt-3  btn " style="border:none; background-color:#297583; color:#fff">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="mt-3 me-3 btn " style=" background-color:#fcc31f; color:#000; border:none">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="mt-3  btn " style="border:none; background-color:#297583; color:#fff">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <x-layout title="UploadFile">

            <div class="col-4"></div>
            <div class="col-4">
                <div class="card p-5 " style="position: relative; top: 120px; border-radius:40px; border:none">
                    <h2 style="text-align: center; color:#297583" class="mb-3"><b> Upload File</b></h2>
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="name" class="label-control"> Title</label>
                            <input type="text" @class(['form-control' , 'p-3' , 'is-invalid'=>$errors->has('name')]) style="border-radius:40px" name="name" id="name" placeholder="Title">
                            <x-error-message name="name" />
                        </div>

                        <div class="form-floating mb-3">
                            <label for="message" class="label-control">Message</label>
                            <input type="text" @class(['form-control' , 'p-3' , 'is-invalid'=>$errors->has('message')]) style="border-radius:40px" name="message" id="message" placeholder="Message">
                            <x-error-message name="message" />
                        </div>

                        <label for="file">Upload File </label>

                        <div class="form-floating custom-file-upload mt-0">
                            <label id="icon">
                                <div class="">
                                    <i class="fas fa-folder-open" id="share"></i>
                                    <label id="share-text" class="ps-2"> Chose Your File </label>
                                </div>
                            </label>
                            <input type="file" @class(['form-control' , 'mb-2' , 'is-invalid'=>$errors->has('file')]) style="border-radius:40px; display:none;" name="file" id="file" placeholder="upload file" onchange="updateNameInput()">
                            <x-error-message name="file" />
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary pt-2 " style="width: 50%; background-color:#fcc31f; color:black; border:none; border-radius: 40px;">
                                <h6 style="font-size:18px; font-weight:bold">Upload</h6>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-4"></div>
            <x-scripts />

        </x-layout>
    </div>
</body>

</html>