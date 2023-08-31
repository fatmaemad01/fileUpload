<x-layout title="Download">
    <div class="col-4"></div>
    <div class="col-md-4">
        <div class="card p-5 " style="position: relative; top: 200px; border-radius:40px; border:none">
            <h2 style="text-align: center;" class="mb-3">You're Done! </h2>
            <form>
                <div class="form-floating mb-3">
                    <h6 style="text-align: center;" class="mb-3">Copy Your Download Link </h6>
                    <input class="form-control mb-2" value="{{ $Link }}" readonly style="border-radius:40px">
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    <a href="{{ $Link }}" class="btn btn-primary p-2"
                        style="width: 50%; background-color:#fcc31f; color:black;border:none; border-radius: 40px;">
                        <h6 style="font-size:18px; font-weight:bold">Download</h6>
                    </a>
                    <div class="icons">
                        <a href="{{ route('file.create') }}" class="btn"><i class="fas fa-plus"></i></a>
                        @if (Auth::user())
                            <a href="{{ route('files.index', $File->user_id) }}" class="btn ms-0"><i
                                    class="fas fa-eye"></i></a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-4"></div>
</x-layout>
