@extends('layout.client')

@section('title', 'Giới thiệu - Quán Nhậu Anh Em')
@section('meta_description', 'Khởi nguồn từ niềm đam mê ẩm thực Việt và mong muốn tạo ra một không gian mộc mạc, gần gũi, Quán Nhậu Anh Em ra đời như một điểm hẹn lý tưởng.')
@section('meta_keywords', 'Giới thiệu Quán Nhậu Anh Em, Quán nhậu Ninh Bình')
@section('og_url', route('gioi-thieu'))
@section('canonical', route('gioi-thieu'))

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "Giới thiệu - Quán Nhậu Anh Em",
  "description": "Khởi nguồn từ niềm đam mê ẩm thực Việt và mong muốn tạo ra một không gian mộc mạc, gần gũi, Quán Nhậu Anh Em ra đời như một điểm hẹn lý tưởng.",
  "publisher": {
    "@type": "Restaurant",
    "name": "Quán Nhậu Anh Em",
    "url": "{{ BASE_URL }}"
  }
}
</script>
@endsection

@section('content')
    <style>
        .about-banner-custom {
            background-color: #5e3612;
            padding: 110px 0 40px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: visible;
        }

        .about-banner-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            padding: 0 15px;
            margin: 0 auto;
        }

        .about-banner-left {
            max-width: 60%;
            z-index: 2;
            position: relative;
        }

        .about-banner-title {
            font-family: 'PiklabJemore', sans-serif;
            font-weight: normal;
            font-size: 70px;
            color: #FFA827;
            text-transform: uppercase;
            line-height: 1.1;
            margin: 0 0 10px 0;
            letter-spacing: 2px;
        }

        .about-banner-desc {
            font-family: PlusJaS-Medium, sans-serif;
            color: #e3dcd2;
            font-size: 16px;
            line-height: 1.4;
            max-width: 595px;
            margin: 0;
        }

        .about-banner-right {
            position: relative;
            display: flex;
            align-items: center;
            z-index: 2;
            transform: translateY(35px);
        }

        .about-search-form {
            position: relative;
            display: flex;
            align-items: center;
            background-color: #fcf5e8;
            border: 2px solid #FFA827;
            border-radius: 30px;
            width: 300px !important;
            max-width: 100% !important;
            box-sizing: border-box;
            height: 46px;
            padding: 0 45px 0 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .about-search-form:hover,
        .about-search-form:focus-within {
            border-color: #ff8c00;
            box-shadow: 0 4px 12px rgba(255, 168, 39, 0.25);
        }

        .about-search-input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: #603813;
            font-size: 15px;
            font-family: PlusJaS-Medium, sans-serif;
        }

        .about-search-input::placeholder {
            color: rgba(96, 56, 19, 0.6);
        }

        .about-search-btn {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #FFA827;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            transition: color 0.2s ease;
        }

        .about-search-btn:hover {
            color: #603813;
        }

        .about-search-btn svg {
            width: 18px;
            height: 18px;

            stroke: currentColor;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .about-mascot {
            position: absolute;
            right: -38px;
            bottom: -5px;
            height: 100px;
            z-index: 10;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .about-search-form:focus-within ~ .about-mascot,
        .about-search-form:hover ~ .about-mascot {
            transform: scale(1.15) translateY(-8px) rotate(4deg);
            filter: drop-shadow(0 8px 16px rgba(0,0,0,0.25));
        }

        @media (max-width: 992px) {
            .about-banner-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 30px;
            }

            .about-banner-left {
                max-width: 100%;
            }

            .about-banner-title {
                font-size: 55px;
            }

            .about-banner-right {
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .about-banner-custom {
                padding: 90px 0 35px 0;
            }

            .about-banner-inner {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 20px;
            }

            .about-banner-left {
                max-width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .about-banner-title {
                font-size: 40px;
                text-align: center;
            }

            .about-search-form {
                width: 260px !important;
            }

            .about-mascot {
                right: -22px;
                height: 80px;
                bottom: -5px;
            }

            .about-banner-desc {
                display: none;
            }
        }
    </style>

    <div class="about-banner-custom">
        <div class="about-banner-inner">
            <div class="about-banner-left">
                <h1 class="about-banner-title">GIỚI THIỆU</h1>
                <p class="about-banner-desc">
                    Quán Nhậu Anh Em – Nơi anh em gặp gỡ, nâng ly và sẻ chia những khoảnh khắc đáng nhớ. Từ tiệc sinh nhật,
                    liên hoan đến những đêm xem bóng đá cuồng nhiệt, mọi cuộc vui đều bắt đầu tại đây.
                </p>
            </div>
            <div class="about-banner-right">
                <div class="about-search-form">
                    <input type="text" name="q" class="about-search-input" placeholder="Tìm kiếm" required onkeypress="if(event.key === 'Enter'){ event.preventDefault(); window.location.href = '{{ BASE_URL }}tin-tuc?q=' + encodeURIComponent(this.value); }">
                    <button type="button" class="about-search-btn" onclick="var val = this.previousElementSibling.value; if(val){ window.location.href = '{{ BASE_URL }}tin-tuc?q=' + encodeURIComponent(val); }">
                        <svg viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
                <img src="{{ BASE_URL }}images/Untitled-3.webp" alt="Mascot" class="about-mascot" loading="eager">
            </div>
        </div>
    </div>
    <div id="trigger-header-border"></div>

    <div class="about-premium-wrapper">
        <style>
            .about-premium-wrapper {
                padding: 40px 0 100px 0;
                font-family: 'PlusJaS-Regular', sans-serif;
                background-image: url('{{ BASE_URL }}images/bg-pattern.webp');
                background-position: left top;
                background-repeat: repeat-y;
                background-size: 100% auto;
            }

            .about-content-inner {
                max-width: 1200px;
                padding: 0 15px;
                margin: 0 auto;
                width: 100%;
                box-sizing: border-box;
            }

            .section-heading {
                font-family: 'PlusJaS-Bold', sans-serif;
                font-size: 38px;
                color: #5e3612;
                text-transform: uppercase;
                margin-bottom: 30px;
                margin-top: 60px;
                letter-spacing: 0.5px;
            }

            .section-heading:first-child {
                margin-top: 0;
            }

            /* --- KHONG GIAN QUAN --- */
            .kgq-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
            }

            .kgq-card {
                background: #f1e2c9;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 3px 6px 15px rgba(60, 30, 10, 0.25);
                display: flex;
                flex-direction: column;
                border: 1px solid #3c1e0a;
            }

            .kgq-img-placeholder {
                background: #261102;
                width: 100%;
                aspect-ratio: 1.15 / 1;
                position: relative;
                border-bottom: 1px solid #3c1e0a;
            }
            
            .kgq-img-placeholder img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            .kgq-text {
                padding: 15px;
                font-size: 13px;
                color: #261102;
                font-family: 'PlusJaS-Bold', sans-serif;
                text-transform: uppercase;
                line-height: 1.4;
                flex-grow: 1;
            }

            /* --- MON AN NOI BAT --- */
            .products-grid {
                display: flex;
                flex-wrap: wrap;
                gap: 24px;
                padding-top: 30px;
                padding-bottom: 20px;
                margin-top: -30px;
                margin-bottom: -20px;
            }
            
            .products-grid::-webkit-scrollbar {
                display: none;
            }

            .product-card {
                background: rgb(246, 227, 195);
                border-radius: 16px;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                cursor: pointer;
                border: none;
                flex: 0 0 calc(33.333% - 16px);
                scroll-snap-align: start;
                position: relative;
                z-index: 1;
            }

            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
                z-index: 10;
            }

            .product-image-wrapper {
                position: relative;
                width: 100%;
                padding-top: 75%;
                background: transparent;
                border-radius: 16px 16px 0 0;
                z-index: 1;
            }

            .product-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 16px 16px 0 0;
                transition: filter 0.5s ease;
                z-index: 1;
            }

            .product-image-trans {
                position: absolute;
                top: 5%;
                left: 5%;
                width: 90%;
                height: 90%;
                object-fit: contain;
                opacity: 1;
                transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.4s ease;
                z-index: 2;
                transform-origin: center center;
                filter: drop-shadow(0 15px 25px rgba(0,0,0,0.3));
                pointer-events: none;
            }

            .product-card:has(.product-image-trans):hover .product-image {
                filter: grayscale(100%) brightness(0.6);
            }

            .product-card:has(.product-image-trans):hover .product-image-trans {
                opacity: 1;
                transform: scale(1.28) translateY(-18px);
            }

            .product-badge {
                position: absolute;
                top: 12px;
                left: 12px;
                background: #FFA827;
                color: #222;
                font-size: 11px;
                font-weight: 700;
                padding: 3px 8px;
                border-radius: 4px;
                text-transform: uppercase;
                z-index: 2;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }

            .product-info {
                padding: 12px 16px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 6px;
                flex: 1;
                border-radius: 0 0 16px 16px;
            }

            .product-name {
                font-size: 16px;
                font-weight: 600;
                color: #381c0d;
                margin-bottom: 0;
                line-height: 1.3;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                transition: color 0.3s ease;
            }

            .product-card:hover .product-name {
                color: #FFA827;
            }

            .product-bottom-row {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                width: 100%;
                margin-top: 4px;
            }

            .product-price {
                font-size: 15px;
                font-weight: 500;
                color: #381c0d;
            }

            /* --- KHOANH KHAC ANH EM --- */
            .kkae-grid {
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                gap: 15px;
            }

            .kkae-item {
                background: #df8a14;
                border-radius: 6px;
                min-height: 220px;
                position: relative;
                overflow: hidden;
            }
            
            .kkae-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            /* Hàng trên: 3 ô bằng nhau */
            .kkae-item:nth-child(1), .kkae-item:nth-child(2), .kkae-item:nth-child(3) {
                grid-column: span 4;
            }

            /* Hàng dưới: 2 ô nhỏ, 1 ô to */
            .kkae-item:nth-child(4), .kkae-item:nth-child(5) {
                grid-column: span 3;
            }
            .kkae-item:nth-child(6) {
                grid-column: span 6;
            }

            @media (max-width: 992px) {
                .kgq-grid {
                    gap: 15px;
                }
                .products-grid {
                    gap: 16px;
                }
                .product-card {
                    flex: 0 0 calc(50% - 8px);
                }
            }

            @media (max-width: 768px) {
                .kgq-grid {
                    grid-template-columns: 1fr;
                }
                .products-grid {
                    gap: 12px;
                }
                .product-card {
                    flex: 0 0 100%;
                }
                .kkae-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 6px;
                }
                .kkae-item {
                    grid-column: span 1 !important;
                    min-height: unset;
                }
                .kkae-item:nth-child(1) {
                    grid-column: 1 / 3 !important;
                    aspect-ratio: 2.2 / 1;
                }
                .kkae-item:nth-child(2) {
                    grid-column: 1 / 2 !important;
                    grid-row: 2 / 4 !important;
                }
                .kkae-item:nth-child(3) {
                    grid-column: 2 / 3 !important;
                    grid-row: 2 / 3 !important;
                    aspect-ratio: 2.15 / 1;
                }
                .kkae-item:nth-child(4) {
                    grid-column: 2 / 3 !important;
                    grid-row: 3 / 4 !important;
                    aspect-ratio: 2.15 / 1;
                }
                .kkae-item:nth-child(5),
                .kkae-item:nth-child(6) {
                    aspect-ratio: 1 / 1;
                }
                .section-heading {
                    font-size: 24px;
                    margin-top: 40px;
                }
            }
        </style>

        <div class="about-content-inner">

        <h2 class="section-heading">KHÔNG GIAN QUÁN</h2>
        <div class="kgq-grid">
            <div class="kgq-card">
                <div class="kgq-img-placeholder">
                    <!-- Thêm thẻ <img> vào đây -->
                </div>
                <div class="kgq-text">LOREM IPSUM LOREM IPSUMLOREM IPSU MLOREM IPSUMLOREM IPSUMLOREM</div>
            </div>
            <div class="kgq-card">
                <div class="kgq-img-placeholder">
                    <!-- Thêm thẻ <img> vào đây -->
                </div>
                <div class="kgq-text">LOREM IPSUM</div>
            </div>
            <div class="kgq-card">
                <div class="kgq-img-placeholder">
                    <!-- Thêm thẻ <img> vào đây -->
                </div>
                <div class="kgq-text">LOREM IPSUM</div>
            </div>
        </div>

        <h2 class="section-heading">MÓN ĂN NỔI BẬT</h2>
        <div class="products-grid">
            @if(isset($latestProducts) && count($latestProducts) > 0)
                @foreach($latestProducts as $p)
                    @php
                        $imgTransUrl = '';
                        if (isset($p->img_transparent) && $p->img_transparent) {
                            $imgTransUrl = $p->img_transparent;
                            if (!preg_match('/^(images\/|https?:\/\/)/', $imgTransUrl)) {
                                $imgTransUrl = 'storage/uploads/products/' . basename($imgTransUrl);
                            }
                        }
                    @endphp
                    <div class="product-card parent-class" data-id="{{ $p->id }}" data-name="{{ $p->name }}" data-price="{{ $p->price }}">
                        <div class="product-image-wrapper popupFood" data-id="{{ $p->id }}">
                            <span class="product-badge">New</span>
                            <img src="{{ BASE_URL }}images/nenproduct.png" alt="{{ $p->name }}" class="product-image" loading="eager">
                            @if($imgTransUrl)
                                <img src="{{ BASE_URL }}{{ $imgTransUrl }}" alt="{{ $p->name }}" class="product-image-trans" loading="eager">
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-name popupFood" data-id="{{ $p->id }}">{{ $p->name }}</div>
                            <div class="product-bottom-row">
                                <div class="product-price">{{ number_format($p->price, 0, ',', '.') }} đ</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Đang cập nhật món ăn...</p>
            @endif
        </div>

        <h2 class="section-heading">KHOẢNH KHẮC ANH EM</h2>
        <div class="kkae-grid">
            <!-- Hàng 1 -->
            <div class="kkae-item">
                <!-- Thêm thẻ <img> vào đây -->
            </div>
            <div class="kkae-item">
                <!-- Thêm thẻ <img> vào đây -->
            </div>
            <div class="kkae-item">
                <!-- Thêm thẻ <img> vào đây -->
            </div>
            <!-- Hàng 2 -->
            <div class="kkae-item">
                <!-- Thêm thẻ <img> vào đây -->
            </div>
            <div class="kkae-item">
                <!-- Thêm thẻ <img> vào đây -->
            </div>
            <div class="kkae-item">
                <!-- Thêm thẻ <img> vào đây -->
            </div>
        </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            App.initHelpers(['bnerBottom']);
        });
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            Contact.init();
        });
    </script>
@endsection