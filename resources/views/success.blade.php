<x-layout title="Success">
    <div class="container p-5">
        <div class="row mt-5">
            <div class="col-1"></div>
            <div class="col-4 mt-5">
                <div class="card form p-5 mt-4 " style="border-radius:40px; border:none">
                    <div class="card-title">
                        <h3 style="font-weight: bolder">{{ $subscription->user?->name }}, your payment success!</h3>
                    </div>
                    <div class="card-body p-2 fw-bold ">
                        <ul style="padding: 5px">
                            <li>
                            <h6 style="font-weight: bold">{{ $subscription->plan?->name }} Plan.</h6></li>
                            <li class="nav-item">
                            <h6 style="font-weight: bold"> Pay {{ $subscription->price }}$ .</h6></li>
                            <li class="nav-item">
                            <h6 style="font-weight: bold">End at {{ $subscription->expires_at->format('F j, Y') }}
                            </h6></li>
                            <li class="nav-item">
                                <h6 style="font-weight: bold"> {{ $subscription->status }}</h6>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-6 background"></div>
            <div class="col-1"></div>
        </div>
    </div>
</x-layout>
