<x-layout title="Plans">
    @push('styles')
        <style>
            .card {
                border: none;
                padding: 10px 20px;

            }

            .card::after {
                position: absolute;
                z-index: -1;
                opacity: 0;
                -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
                transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            }

            .card:hover {
                transform: scale(1.02, 1.02);
                -webkit-transform: scale(1.02, 1.02);
                backface-visibility: hidden;
                will-change: transform;
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, .75) !important;
            }

            .card:hover::after {
                opacity: 1;
            }

            .card:hover .btn-outline-primary {
                color: white;
                background: #007bff;
            }

            .card-text {
                font-weight: 500;
                padding: 10px;
                font-size: 17px;
                text-align: center;
                margin-bottom: 15px
            }

            .card-title {
                color: #2d4170;
                font-weight: bolder
            }

            .list-group-item {
                font-weight: 400;
                padding: 10px;
                font-size: 17px;
                text-align: center;
                margin-top: 0px;
            }

            .primary {
                padding: 10px;
                font-size: 17px
            }
        </style>
    @endpush


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

    <div class="container-fluid" style="height:100vh">
        <div class="container p-5">
            <div class="row mt-4">
                @foreach ($plans as $plan)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card mt-5 h-100 shadow-lg" style="border-radius: 40px">
                            <div class="card-body">
                                <div class="text-center p-3">
                                    <h2 class="card-title">{{ $plan->name }}</h2>
                                    <br>
                                    <span class="h2">${{ $plan->price }}</span>/month
                                    <br><br>
                                </div>
                                <p class="card-text">{{ $plan->description }}</p>

                                @foreach ($plan->features as $feature)
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="padding: 0px;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                            </svg> {{ $feature->pivot->feature_value }} G {{ $feature->name }}</li>
                                    </ul>
                                @endforeach
                            </div>
                            <div class="card-body text-center">
                                <form action="{{ route('subscriptions.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <input type="hidden" name="period" value="3">

                                        <button type="submit" class=" primary ">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
