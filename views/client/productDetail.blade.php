@extends('client.layouts.main')

@section('section')
    <!-- Header-->
    @include('client.layouts.partilas.header')

    <section class="py-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ file_url($productDetail['p_img_thumbnail']) }}" class="img-fluid rounded" alt="Sản phẩm">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Tên sản phẩm:{{ $productDetail['p_name'] }}</h2>
                    <h4>
                        Giá tiền gốc: <span class="text-muted text-decoration-line-through fs-5">
                            {{ number_format($productDetail['p_price']) }}VNĐ</span> </h4>
                    <h4>
                        Giá tiền giảm: <span
                            class="text-danger fw-bold fs-4">{{ number_format($productDetail['p_price_sale']) }}VNĐ</span>
                    </h4>
                    <p class="mt-3">Mô tả ngắn:{{ $productDetail['p_overview'] }}</p>
                    </p>
                    <div class="mb-3">
                        <span class="badge bg-warning text-dark">⭐ 4.8 (120 đánh giá)</span>
                    </div>
                    <button class="btn btn-primary">Thêm vào giỏ hàng</button>
                    <a href="/" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h3>Mô tả sản phẩm</h3>
                    <p>{{ $productDetail['p_content'] }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
