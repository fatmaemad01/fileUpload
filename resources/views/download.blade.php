<x-layout title="Download File">
    <div class="container p-5">
        <div class="row mt-3">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="card form p-5 mt-5 " style="border-radius:40px; border:none">
                    <h3 class="mb-2">You're Done!</h3>
                    <div class="d-flex justify-content-center my-3">
                        <img src="{{ asset('images/down.png') }}" alt="" width="111px" height="120px">
                    </div>
                    <form>
                        <div class="form-floating mb-3">
                            <h6 style="text-align: center;" class="mb-3">Click to download</h6>
                            <input class="form-control mb-2" value="{{ $Link }}" readonly
                                style="border-radius:40px; " />
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <a href="{{ $Link }}" class=" primary">
                                <h6 class="btn" style=" font-size:18px;font-weight:bold; color:#fff">Download</h6>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mb-5 background"></div>
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
