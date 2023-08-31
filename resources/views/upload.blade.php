<x-layout title="UploadFile">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="card p-5 " style="position: relative; top: 120px; border-radius:40px; border:none">
            <h3 style="text-align: center;">Upload File </h3>
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