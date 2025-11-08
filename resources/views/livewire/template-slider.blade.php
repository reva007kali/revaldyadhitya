<!-- Swiper Slider -->
<style>
    .swiper {
      width: 100%;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }
    /* Bullet container */
    .swiper-pagination {
        bottom: 10px !important;
    }

    /* Bullets */
    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #659cc6;
        /* hijau muda */
        opacity: 1;
        margin: 0 6px !important;
        transition: transform 0.3s, background 0.3s;
    }

    /* Bullets aktif */
    .swiper-pagination-bullet-active {
        background: #1d378b;
        /* hijau tua */
        transform: scale(1.3);
    }

    .swiper-button-next,
    .swiper-button-prev {
        width: 40px;
        height: 40px;
        background: #1045b9;
        /* hijau tema */
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s, background 0.2s;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: #0452b7;
        /* hijau lebih gelap */
        transform: scale(1.1);
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 20px;
    }
</style>
<div class="swiper cvSlider py-4">
    <div class="swiper-wrapper pb-14">
        @foreach ($templates as $template)
            <div class="swiper-slide">
                <div class="swiper-lazy-preloader swiper-lazy-preloader-green"></div>
                <div class="cursor-pointer
                                rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}"
                        class="w-full  object-cover rounded-lg mb-2" loading="lazy">
                    {{-- <h3 class="text-center font-semibold text-sm">{{ $template->name }}</h3> --}}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination & Navigation -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>

</script>
