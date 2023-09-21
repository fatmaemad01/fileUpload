<x-layout title="Show File">
    <div class="container p-5">
        <div class="row mt-3">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="card form p-5 mt-4 " style="border-radius:40px; border:none">
                    <h3 class="mb-2">You're Done!</h3>
                    <div class="d-flex justify-content-center my-3">
                        <img src="{{ asset('images/done2.png') }}" alt="" width="131px" height="100px">
                    </div>
                    <form>
                        <div class="form-floating mb-3">
                            <h6 style="text-align: center;" class="mb-3">Copy Your Download Link </h6>
                            <input class="form-control mb-2" value="{{ route('file.downloadPage', $File->id) }}" readonly
                                style="border-radius:40px; " />
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <p id="textToCopy" style="display:none">{{ route('file.downloadPage' , $File->id) }}</p>
                            <button id="copyButton" onclick="copyText()" class="primary">
                                <h6 style="font-size:18px; font-weight:bold">Copy Link</h6>
                            </button>
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
            <div class="col-md-6 background"></div>
        </div>
    </div>
    @push('scripts')
        <script>
            function copyText() {
                const text = document.getElementById('textToCopy').innerText;

                const tempInput = document.createElement('input');
                tempInput.type = 'text';
                tempInput.value = text;

                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
            }
        </script>
    @endpush
</x-layout>
