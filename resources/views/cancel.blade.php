<x-layout title="Success">
    <div class="container p-5">
        <div class="row mt-5">
            <div class="col-1"></div>
            <div class="col-4 mt-5">
                <div class="card form p-5 mt-4 " style="border-radius:40px; border:none">
                    <div class="card-title">
                        <h3 style="font-weight: bolder">{{ $subscription->user?->name }}, your payment cancel!</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 background"></div>
            <div class="col-1"></div>
        </div>
    </div>
</x-layout>
