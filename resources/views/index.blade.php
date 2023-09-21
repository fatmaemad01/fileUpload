{{-- <x-layout title="AllFiles">

    <div class="col-1"></div>
    <div class="col-10">
        <div class="card p-4 " style="position: relative; top: 120px; border-radius:40px; border:none">
            <h3 style="text-align: center;" class="mb-3">All File </h3>
            <table class="table table-striped">
                <tr>
                    <th>File Name</th>
                    <th>Download Link</th>
                    <th></th>
                </tr>
                @foreach($files as $file)
                <tr>
                    <td>{{$file->name}}</td>
                    <td><a href=" {{URL::SignedRoute('file.download',  $file->link)}}">{{URL::SignedRoute('file.download',  $file->link)}}</a></td>                    <td>
                        <form action="{{route('file.destroy' , $file->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                <a href="{{route('file.create')}}" class="btn btn-primary pt-2 " style="width: 30%; background-color:#fcc31f; color:black; border:none; border-radius: 40px;">
                    <h6 style="font-size:18px; font-weight:bold">Upload another?</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="col-2"></div>


</x-layout> --}}
