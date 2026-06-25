@extends('layout.client')

@section('title', 'Thực Đơn - Quán Nhậu Anh Em')
@section('meta_description', 'Khám phá thực đơn đa dạng phong phú của Quán Nhậu Anh Em với các món ăn nhậu độc đáo, bia ngon và các ưu đãi đặc quyền hấp dẫn.')
@section('meta_keywords', 'Thực đơn quán nhậu anh em, Món ngon quán nhậu')
@section('og_url', route('thuc-don'))
@section('canonical', route('thuc-don'))

@section('content')
    <div class="about-banner-custom">
        <div class="about-banner-inner">
            <div class="about-banner-left">
                <h1 class="about-banner-title">Thực Đơn</h1>
                <p class="about-banner-desc">
                    Khám phá tinh hoa ẩm thực đường phố, đa dạng món ngon từ Á sang Âu, chỉ có tại Quán Nhậu Anh Em.
                </p>
            </div>
            <div class="about-banner-right">
                <div class="about-search-form">
                    <input type="text" name="q" class="about-search-input" placeholder="Tìm kiếm món ăn..." required>
                    <button type="button" class="about-search-btn">
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

    <div class="menu-category-bar">
        <div class="menu-category-inner">
            <span class="category-arrow prev">&lsaquo;</span>
            <ul class="menu-category-list">
                <li class="menu-category-item"><a href="#cat-all" class="menu-category-link active">Tất cả</a></li>
                @foreach($categories as $c)
                <li class="menu-category-item"><a href="#cat-{{ $c->id }}" class="menu-category-link">{{ $c->name }}</a></li>
                @endforeach
                <div class="category-indicator"></div>
            </ul>
            <span class="category-arrow next">&rsaquo;</span>
        </div>
    </div>

    <div class="td-content__wrapper menu-wrapper">
        <style>
            html,
            body {
                overflow-x: clip !important;
            }

            .td-header {
                top: 0 !important;
            }

            .about-banner-custom {
                background-color: #5e3612;
                padding: 110px 0 40px 0;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                overflow: visible;
                width: 100%;
            }

            .about-banner-inner {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                max-width: 1200px;
                padding: 0 15px;
                margin: 0 auto;
                box-sizing: border-box;
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

            .menu-category-bar {
                background-color: #FFA827;
                width: 100%;
                position: sticky;
                top: 70px;
                z-index: 99;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                box-sizing: border-box;
                overflow: hidden;
            }

            /* Match the header noise overlay for identical background tone */
            .menu-category-bar::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
                opacity: 0.12;
                z-index: 1;
                mix-blend-mode: multiply;
            }

            .menu-category-inner {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                align-items: center;
                position: relative;
                padding: 0 20px;
                box-sizing: border-box;
                z-index: 2; /* Keep above noise */
            }

            .menu-category-list {
                display: flex;
                list-style: none;
                margin: 0;
                padding: 0;
                overflow-x: auto;
                scroll-behavior: smooth;
                -ms-overflow-style: none;
                scrollbar-width: none;
                width: 100%;
                justify-content: flex-start;
                gap: 40px;
                position: relative;
            }

            .menu-category-list::-webkit-scrollbar {
                display: none;
            }

            .menu-category-item {
                flex-shrink: 0;
            }

            .menu-category-link {
                display: block;
                padding: 10px 0;
                font-size: 14px;
                font-family: PlusJaS-Bold, sans-serif;
                font-weight: bold;
                color: #5e3612;
                text-transform: uppercase;
                text-decoration: none;
                transition: all 0.2s ease;
                letter-spacing: 0.5px;
                position: relative;
            }

            .category-indicator {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                background-color: #5e3612;
                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                z-index: 2;
                pointer-events: none;
            }

            .menu-category-link:hover,
            .menu-category-link.active {
                color: #5e3612;
            }

            .category-arrow {
                font-size: 20px;
                color: #5e3612;
                cursor: pointer;
                user-select: none;
                padding: 10px 15px;
                display: none; /* Hide by default to prevent flashing on load */
                align-items: center;
                justify-content: center;
                font-weight: 700;
                transition: color 0.2s;
            }

            .category-arrow:hover {
                color: #ffffff;
            }

            .menu-wrapper {
                background-color: #fdf9f2;
                padding: 40px 0 80px 0;
            }

            .menu-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
                box-sizing: border-box;
            }

            .menu-main {
                width: 100%;
            }

            .menu-section {
                margin-bottom: 50px;
            }

            .menu-section-title {
                font-size: 22px;
                color: #222;
                margin-bottom: 24px;
                padding-bottom: 10px;
                border-bottom: 2px solid #eaeaea;
                font-weight: 700;
                font-family: var(--font-family, sans-serif);
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .menu-section-title::before {
                content: '';
                display: block;
                width: 6px;
                height: 24px;
                background-color: #FFA827;
                border-radius: 4px;
            }

            .products-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 24px;
            }

            .product-card {
                background: #fff;
                border-radius: 4px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                cursor: pointer;
                border: 1px solid #f0f0f0;
            }

            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
                border-color: #FFA827;
            }

            .product-image-wrapper {
                position: relative;
                width: 100%;
                padding-top: 75%;
                background: #eee;
                overflow: hidden;
            }

            .product-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }

            .product-card:hover .product-image {
                transform: scale(1.08);
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
                padding: 12px 14px;
                display: flex;
                flex-direction: column;
                flex: 1;
            }

            .product-name {
                font-size: 15px;
                font-weight: 700;
                color: #222;
                margin-bottom: 6px;
                line-height: 1.4;
                height: 42px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                transition: color 0.3s ease;
            }

            .product-card:hover .product-name {
                color: #FFA827;
            }

            .product-desc {
                font-size: 12px;
                color: #666;
                margin-bottom: 12px;
                flex: 1;
                line-height: 1.4;
                height: 34px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .product-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: auto;
                padding-top: 15px;
                border-top: 1px dashed #eee;
            }

            .product-price {
                font-size: 17px;
                font-weight: 800;
                color: #d32f2f;
            }

            .btn-add {
                width: 32px;
                height: 32px;
                border-radius: 6px;
                background: #f5f5f5;
                color: #222;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .btn-add svg {
                width: 16px;
                height: 16px;
            }

            .product-card:hover .btn-add {
                background: #FFA827;
                color: #fff;
            }

            .menu-section-footer {
                text-align: center;
                margin-top: 30px;
            }

            .btn-load-more {
                background: transparent;
                border: 1px solid #FFA827;
                color: #FFA827;
                padding: 12px 40px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .btn-load-more:hover {
                background: #FFA827;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(255, 168, 39, 0.2);
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

                .about-banner-title {
                    font-size: 40px;
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
                    font-size: 14px;
                }
            }

            @media (max-width: 991px) {
                .menu-wrapper {
                    padding-top: 0;
                }

                .menu-container {
                    flex-direction: column;
                    align-items: stretch;
                    gap: 15px;
                }

                .menu-main {
                    width: 100%;
                }

                .menu-category-list {
                    justify-content: flex-start;
                    gap: 15px;
                }

                .menu-category-link {
                    padding: 8px 8px;
                    font-size: 13px;
                }

                .products-grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 16px;
                }

                .product-info {
                    padding: 12px;
                }

                .product-name {
                    font-size: 14px;
                    height: 40px;
                    margin-bottom: 6px;
                }

                .product-price {
                    font-size: 15px;
                }

                .td-header {
                    overflow-x: hidden;
                }

                .list-content-inside .list-link {
                    gap: 10px;
                    flex-wrap: nowrap !important;
                }

                .list-content-inside .list-link li {
                    margin: 0 !important;
                    white-space: nowrap;
                }

                .list-content-inside .list-link li a {
                    font-size: 11px !important;
                    padding: 5px !important;
                }

                .textBox {
                    display: none !important;
                }

                .bookingPopup {
                    padding: 6px 10px !important;
                    font-size: 12px !important;
                    white-space: nowrap;
                }
            }

            @media (max-width: 767px) {
                .products-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                .product-info {
                    padding: 10px;
                }

                .product-name {
                    font-size: 13px;
                    height: 38px;
                    margin-bottom: 4px;
                }

                .product-price {
                    font-size: 14px;
                }

                .product-desc {
                    display: none;
                }

                .btn-add {
                    width: 28px;
                    height: 28px;
                    border-radius: 4px;
                }

                .btn-add svg {
                    width: 14px;
                    height: 14px;
                }
            }

            @media (max-width: 920px) {
                .menu-category-bar {
                    top: 69px !important;
                }
            }

            @media (max-width: 750px) {
                .menu-category-bar {
                    top: 59px !important;
                }
            }

            /* Dynamic header-aware sticky */
            .menu-category-bar.is-sticky {
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }
        </style>

        <div class="menu-container">
            <main class="menu-main">
                @foreach($categories as $c)
                @php
                    $catProducts = array_filter($products, function($p) use ($c) {
                        return $p->category_id == $c->id;
                    });
                @endphp
                @if(count($catProducts) > 0)
                <div class="menu-section" id="cat-{{ $c->id }}">
                    <div class="menu-section-title">{{ $c->name }}</div>
                    <div class="products-grid">
                        @foreach($catProducts as $p)
                        @php
                            $imgUrl = $p->img_thumbnail;
                            if ($imgUrl) {
                                if (!preg_match('/^(images\/|https?:\/\/)/', $imgUrl)) {
                                    $imgUrl = 'storage/uploads/products/' . basename($imgUrl);
                                }
                            } else {
                                $imgUrl = 'images/produc.webp';
                            }
                        @endphp
                        <div class="product-card parent-class" data-id="{{ $p->id }}" data-name="{{ $p->name }}" data-price="{{ $p->price }}">
                            <div class="product-image-wrapper popupFood" data-id="{{ $p->id }}">
                                @if($p->price < 150000)
                                <span class="product-badge">New</span>
                                @else
                                <span class="product-badge">Hot</span>
                                @endif
                                <img src="{{ $imgUrl }}" alt="{{ $p->name }}" class="product-image" loading="eager">
                            </div>
                            <div class="product-info">
                                <div class="product-name popupFood" data-id="{{ $p->id }}">{{ $p->name }}</div>
                                <div class="product-desc">{{ !empty($p->overview) ? $p->overview : 'Món ăn ngon, bổ dưỡng từ Quán Nhậu Anh Em' }}</div>
                                <div class="product-footer">
                                    <div class="product-price">{{ number_format($p->price, 0, ',', '.') }}đ</div>
                                    <div class="btn-add ready-call-add-to-card">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 5v14M5 12h14" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @endforeach
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            App.initHelpers(["news"]);
            NewsList.init({
                cateId: 0
            });
            fixPositionStickyMenu();

            // Dynamically adjust menu-category-bar sticky top based on actual header height
            function adjustMenuCategoryBarSticky() {
                var $header = $('.premium-header-wrapper');
                var $bar = $('.menu-category-bar');
                if ($header.length && $bar.length) {
                    var headerHeight = $header.outerHeight();
                    $bar.css('top', headerHeight + 'px');
                }
            }

            // Run on load (with small delay for header to fully render)
            setTimeout(adjustMenuCategoryBarSticky, 100);
            setTimeout(adjustMenuCategoryBarSticky, 300);
            setTimeout(adjustMenuCategoryBarSticky, 500);

            // Run on scroll to handle header height changes
            $(window).on('scroll', function() {
                adjustMenuCategoryBarSticky();
                // Add visual feedback when bar is stuck
                var $bar = $('.menu-category-bar');
                if ($bar.length) {
                    var rect = $bar[0].getBoundingClientRect();
                    var headerHeight = $('.premium-header-wrapper').outerHeight() || 70;
                    if (Math.abs(rect.top - headerHeight) < 5) {
                        $bar.addClass('is-sticky');
                    } else {
                        $bar.removeClass('is-sticky');
                    }
                }
            });

            // Handle horizontal scroll arrows for the category bar
            const catList = document.querySelector('.menu-category-list');
            const prevArrow = document.querySelector('.category-arrow.prev');
            const nextArrow = document.querySelector('.category-arrow.next');

            function updateCategoryArrows() {
                if (catList && prevArrow && nextArrow) {
                    const hasOverflow = catList.scrollWidth > catList.clientWidth;
                    if (hasOverflow) {
                        prevArrow.style.display = 'flex';
                        nextArrow.style.display = 'flex';
                    } else {
                        prevArrow.style.display = 'none';
                        nextArrow.style.display = 'none';
                    }
                }
            }

            if (prevArrow && nextArrow && catList) {
                prevArrow.addEventListener('click', function() {
                    catList.scrollBy({ left: -180, behavior: 'smooth' });
                });
                nextArrow.addEventListener('click', function() {
                    catList.scrollBy({ left: 180, behavior: 'smooth' });
                });
            }

            // Run arrows check
            setTimeout(updateCategoryArrows, 200);

            // Run on resize
            $(window).on('resize', function() {
                adjustMenuCategoryBarSticky();
                updateCategoryArrows();
            });
        });

        // Tab behavior for sidebar
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.menu-category-link');
            const sections = document.querySelectorAll('.menu-section');
            const catList = document.querySelector('.menu-category-list');
            const indicator = document.querySelector('.category-indicator');

            function updateIndicator(activeElement) {
                if (!indicator || !activeElement || !catList) return;
                const activeRect = activeElement.getBoundingClientRect();
                const containerRect = catList.getBoundingClientRect();
                const offsetLeft = (activeRect.left - containerRect.left) + catList.scrollLeft;
                indicator.style.width = activeRect.width + 'px';
                indicator.style.transform = `translateX(${offsetLeft}px)`;
            }

            // Hide all sections except the initially active one
            sections.forEach(sec => sec.style.display = 'none');
            const activeLink = document.querySelector('.menu-category-link.active');
            if (activeLink) {
                const targetId = activeLink.getAttribute('href').substring(1);
                if (targetId === 'cat-all') {
                    sections.forEach(sec => sec.style.display = 'block');
                } else {
                    const activeSec = document.getElementById(targetId);
                    if (activeSec) activeSec.style.display = 'block';
                }
                setTimeout(() => updateIndicator(activeLink), 100);
            }

            if (catList) {
                catList.addEventListener('scroll', () => {
                    const currentActive = document.querySelector('.menu-category-link.active');
                    if (currentActive) updateIndicator(currentActive);
                });
            }
            window.addEventListener('resize', () => {
                const currentActive = document.querySelector('.menu-category-link.active');
                if (currentActive) updateIndicator(currentActive);
            });

            // Client-side search logic
            const searchInput = document.querySelector('.about-search-input');
            const searchBtn = document.querySelector('.about-search-btn');

            function performMenuSearch() {
                const query = searchInput ? searchInput.value.toLowerCase().trim().normalize('NFD').replace(/[\u0300-\u036f]/g, "") : '';
                const activeLink = document.querySelector('.menu-category-link.active');
                const activeCatId = activeLink ? activeLink.getAttribute('href').substring(1) : 'cat-all';

                sections.forEach(section => {
                    const sectionId = section.getAttribute('id');
                    // If we are not on "All" category, and this section doesn't match the active category, skip it
                    if (activeCatId !== 'cat-all' && sectionId !== activeCatId) {
                        section.style.display = 'none';
                        return;
                    }

                    const cards = section.querySelectorAll('.product-card');
                    let visibleCount = 0;

                    cards.forEach(card => {
                        const productName = card.getAttribute('data-name').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                        if (productName.includes(query)) {
                            card.style.display = '';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Show section if it has visible products and matches query, otherwise hide
                    if (visibleCount > 0) {
                        section.style.display = 'block';
                        // Hide "Xem thêm" button since we are searching
                        const footer = section.querySelector('.menu-section-footer');
                        if (footer) footer.style.display = 'none';
                    } else {
                        section.style.display = 'none';
                    }
                });

                // If query is empty, run updateLoadMore to restore original state for the active category
                if (query === '') {
                    if (activeCatId === 'cat-all') {
                        sections.forEach(sec => sec.style.display = 'block');
                    } else {
                        sections.forEach(sec => {
                            sec.style.display = sec.getAttribute('id') === activeCatId ? 'block' : 'none';
                        });
                    }
                    updateLoadMore();
                }
            }

            if (searchInput) {
                searchInput.addEventListener('input', performMenuSearch);
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        performMenuSearch();
                    }
                });
            }
            if (searchBtn) {
                searchBtn.addEventListener('click', performMenuSearch);
            }

            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        e.preventDefault();

                        links.forEach(l => l.classList.remove('active'));
                        this.classList.add('active');
                        updateIndicator(this);

                        const targetId = href.substring(1);
                        if (targetId === 'cat-all') {
                            sections.forEach(sec => sec.style.display = 'block');
                        } else {
                            sections.forEach(sec => {
                                if (sec.id === targetId) {
                                    sec.style.display = 'block';
                                } else {
                                    sec.style.display = 'none';
                                }
                            });
                        }

                        // Re-run search filtering for the newly selected category
                        performMenuSearch();
                    }
                });
            });

            // Load more logic
            function updateLoadMore() {
                document.querySelectorAll('.menu-section').forEach(section => {
                    const grid = section.querySelector('.products-grid');
                    const cards = Array.from(section.querySelectorAll('.product-card'));
                    if (!grid || cards.length === 0) return;

                    const gridCols = window.getComputedStyle(grid).getPropertyValue('grid-template-columns');
                    const numCols = gridCols.split(' ').length;

                    let limit = numCols * 2;
                    if (window.innerWidth <= 767) {
                        limit = 8;
                    }

                    if (cards.length > limit) {
                        section.classList.add('collapsed');
                        let footer = section.querySelector('.menu-section-footer');
                        if (!footer) {
                            footer = document.createElement('div');
                            footer.className = 'menu-section-footer';
                            footer.innerHTML = '<button type="button" class="btn-load-more">Xem thêm</button>';
                            section.appendChild(footer);

                            footer.querySelector('.btn-load-more').addEventListener('click', function () {
                                section.classList.remove('collapsed');
                                footer.style.display = 'none';
                                cards.forEach(card => card.style.display = '');
                            });
                        } else if (section.classList.contains('collapsed')) {
                            footer.style.display = 'block';
                        }

                        cards.forEach((card, index) => {
                            if (index >= limit && section.classList.contains('collapsed')) {
                                card.style.display = 'none';
                            } else {
                                card.style.display = '';
                            }
                        });
                    } else {
                        section.classList.remove('collapsed');
                        const footer = section.querySelector('.menu-section-footer');
                        if (footer) footer.style.display = 'none';
                        cards.forEach(card => card.style.display = '');
                    }
                });
            }

            updateLoadMore();
            window.addEventListener('resize', () => {
                clearTimeout(window.resizeTimer);
                window.resizeTimer = setTimeout(updateLoadMore, 100);
                updateIndicatorPosition();
            });

            // Active menu item on main header
            document.getElementById('topNav-thucdon').classList.add('active');
            if (document.getElementById('topNav-tintuc')) {
                document.getElementById('topNav-tintuc').classList.remove('active');
            }

            // Fix header page title
            const titlePage = document.querySelector('.about-banner-title');
            if (titlePage) titlePage.innerText = 'Thực Đơn';

            const desPage = document.querySelector('.about-banner-desc');
            if (desPage) desPage.innerHTML = 'Khám phá tinh hoa ẩm thực đường phố, đa dạng món ngon từ Á sang Âu, chỉ có tại Quán Nhậu Anh Em.';
        });
    </script>
@endsection
