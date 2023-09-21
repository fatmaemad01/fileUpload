<x-layout title="All Files">
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card p-4 " style="position: relative; top: 120px; border-radius:40px; border:none">
                    <h3 style="text-align: center;" class="mb-3">All File </h3>
                    <table class="table table-hover ">
                        <tr>
                            <th>File Name</th>
                            <th>Download Link</th>
                            <th>Total downloads</th>
                            <th></th>
                        </tr>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->name }}</td>
                                <td><a
                                        href=" {{ route('file.downloadPage', $file->id) }}">{{ route('file.downloadPage', $file->id) }}</a>
                                </td>
                                <td> {{ $file->total_download }}</td>
                                <td>
                                    <form action="{{ route('file.destroy', $file->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('file.create') }}" class=" primary pt-2 " style="width: 30%">
                            <h6 class="text-center" style="font-size:18px; font-weight:bold">Upload another?</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</x-layout>
