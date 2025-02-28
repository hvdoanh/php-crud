@extends('client.layouts.main')

@section('section')
    <!-- Header-->
    @include('client.layouts.partilas.header')

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($product as $pro)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ file_url($pro['img_thumbnail']) }}" height="350px"
                                alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $pro['name'] }}</h5>
                                    <!-- Product price-->
                                    <div class="d-flex align-items-center gap-2">
                                        <span
                                            class="text-muted text-decoration-line-through fs-5">{{ number_format($pro['price']) }}đ</span>
                                        <span
                                            class="text-danger fw-bold fs-4">{{ number_format($pro['price_sale']) }}đ</span>

                                    </div>
                                </div>
                            </div>

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="/productDetail/{{ $pro['id'] }}">View
                                        options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
