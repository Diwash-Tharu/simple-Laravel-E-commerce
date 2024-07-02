<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel"
    style="width: 100%; max-width: 1200px; margin: auto;">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('images/slider3.jpg') }}" class="d-block w-100" alt="..."
                style="object-fit: cover; object-position: center; height: 400px;">

        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('images/slider4.jpg') }}" class="d-block w-100" alt="..."
                style="object-fit: cover; object-position: center; height: 400px;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider2.jpg') }}" class="d-block w-100" alt="..."
                style="object-fit: cover; object-position: center; height: 400px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>