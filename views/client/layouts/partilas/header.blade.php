<header class="bg-dark py-5">
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            @foreach ($banner as $ban)
                <div class="carousel-item active">
                    <img src="{{ file_url($ban['img']) }}" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption">
                        <h3>Chào Mừng Đến Với Chúng Tôi</h3>
                        <p>Khám phá thế giới tuyệt vời.</p>
                        <a href="#" class="btn btn-primary">Xem Ngay</a>
                    </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

</header>
