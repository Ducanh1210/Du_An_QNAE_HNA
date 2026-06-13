<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta id="viewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title>@yield('title', 'Quán Nhậu Anh Em - Anh em gắp bia lên')</title>
    
    <meta id="metaDescription" name="description" content="@yield('meta_description', 'Không chỉ là quán nhậu, Anh Em còn là phong cách sống – điểm hẹn liên hoan, sinh nhật, xả stress, tụ tập bạn bè sau giờ làm việc căng thẳng.')" />
    <meta id="metaKeywords" name="keywords" content="@yield('meta_keywords', 'Quán Nhậu Anh Em, Quán nhậu Ninh Bình, quán nhậu gần đây, quán nhậu ngon, Quán nhậu view đẹp Ninh Bình, Quán nhậu chill Ninh Bình, quán nhậu nổi tiếng')" />
    <meta id="metaNewKeywords" name="news_keywords" content="@yield('meta_keywords', 'Quán Nhậu Anh Em, Quán nhậu Ninh Bình, quán nhậu gần đây, quán nhậu ngon, Quán nhậu view đẹp Ninh Bình, Quán nhậu chill Ninh Bình, quán nhậu nổi tiếng')" />
    
    <meta id="fbUrl" property="og:url" content="@yield('og_url', 'javascript:;')" />
    <meta id="fbSiteName" property="og:site_name" content="quannhauanhem.com" />
    <meta id="fbType" property="og:type" content="website" />
    <meta id="fbTitle" property="og:title" content="@yield('title', 'Quán Nhậu Anh Em - Anh em gắp bia lên')" />
    <meta id="fbDescription" property="og:description" content="@yield('meta_description', 'Không chỉ là quán nhậu, Anh Em còn là phong cách sống – điểm hẹn liên hoan, sinh nhật, xả stress, tụ tập bạn bè sau giờ làm việc căng thẳng.')" />
    <meta id="fbImage" property="og:image" content="{{ BASE_URL }}images/Thumb-Facebook.jpg" />
    
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta name="RATING" content="GENERAL" />
    <meta name="REVISIT-AFTER" content="1 DAYS" />
    <meta name="author" content="Quán Nhậu Anh Em - Anh em gắp bia lên" />
    <meta name="copyright" content="Quán Nhậu Anh Em" />
    <meta name="GENERATOR" content="Quán Nhậu Anh Em" />
    <meta http-equiv="content-language" content="vi" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta id="metaRobots" name="robots" content="index,follow" />
    <meta property="og:image:alt" content="Quán nhậu Ninh Bình - hệ thống quán nhậu anh em" />
    <link id="metaCanonical" rel="canonical" href="@yield('canonical', 'javascript:;')" />

    @yield('preloads')

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ BASE_URL }}images/Logo_PNG22_square.webp" />
    <link rel="icon" type="image/png" href="{{ BASE_URL }}images/Logo_PNG22_square.webp" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ BASE_URL }}images/Logo_PNG22_square.webp" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ BASE_URL }}images/Logo_PNG22_square.webp" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ BASE_URL }}images/Logo_PNG22_square.webp" sizes="160x160" />
    <link rel="icon" type="image/png" href="{{ BASE_URL }}images/Logo_PNG22_square.webp" sizes="192x192" />
    <!-- END Icons -->

    <script>
        var apiDomain = 'https://api.quannhauanhem.com';
        var storageDomain = 'https://storage.quannhauanhem.com';
        var webDomain = 'javascript:;';
        var webDomainHn = '';
        var webDomainHcm = '';
        var passEncrypted = "webnhautudo";
        var localFinishBill = "finishBill_1";
        var localArrCart = "arrCartTD_1";
        var localExpired = "Expired_1";
        var localNotiExpired = "NotiExpired_1";

        var swiperMenuTags;
        var datePicker;
        var fixDistancePercent = 15;
        var fixDurationPercent = 15;
    </script>

    <input type="hidden" id="token" value="EAAAACjOcbxdo5ra4kyQHGCTER9VBowtnCLwHMeyIMf1yk2y4HTsbIRmDsGdRILSeJJW/xs3IpwmmXho5kKKKMVZC57vvALnSEdJWJGQfNN3Bd8ra1GbpPc3ZQHQWyS3k5bTbW9PsisdU3tdUWPcsFNoumo=" />
    <input type="hidden" id="log" value="0" />

    <!-- BEGIN: Template CSS-->
    <link href="{{ BASE_URL }}Static/css/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/select2.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/splitting.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/splitting-cells.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/swiper.min.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/default.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/default.date.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/main.css?v=639156723241637552" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/custom.css?v=639156730100000090_fixed_v5" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/fonts.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/fix-notice-mob.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/editkhoisw.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/premium-header.css?v=89" rel="stylesheet" />
    <!-- END: Core CSS-->

    @yield('styles')

    <!-- BEGIN: Template JS-->
    <script src="{{ BASE_URL }}Static/js/jquery.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/jquery.price_format.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/platform.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/map.js?v=639156723999999999"></script>
    <script src="{{ BASE_URL }}Static/js/swiper.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/cryptojs.js"></script>
    <script src="{{ BASE_URL }}Static/js/jquery.marquee.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/wow.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/gsap.js"></script>
    <script src="{{ BASE_URL }}Static/js/ScrollTrigger.js"></script>
    <script src="{{ BASE_URL }}Static/js/splitting.js"></script>
    <script src="{{ BASE_URL }}Static/js/TweenMax.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/ScrollMagic.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/animation.gsap.js"></script>
    <script src="{{ BASE_URL }}Static/js/parallax.js"></script>
    <script src="{{ BASE_URL }}Static/js/html2canvas.js"></script>
    <script src="{{ BASE_URL }}Static/js/select2.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/jquery.fancybox.min.js"></script>
    <script src="{{ BASE_URL }}Static/js/moment.js"></script>
    <script src="{{ BASE_URL }}Static/js/picker.js"></script>
    <script src="{{ BASE_URL }}Static/js/picker.date.js"></script>
    <!-- END: Template JS-->

    <!-- BEGIN: Core JS-->
    <script src="{{ BASE_URL }}Static/min/anhem.js?v=639156723241637552_fixed_v4"></script>
    <!-- END: Core JS-->

    @yield('schema')

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-THB8FCN');</script>
    <!-- End Google Tag Manager -->

    <!-- Meta Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return; n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
            n.queue = []; t = b.createElement(e); t.async = !0;
            t.src = v; s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '840548061314169');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=840548061314169&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THB8FCN" height="0" width="0"
            style="display: none; visibility: hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    @yield('loading_screen')

    <form method="post" action="" id="form1">
        <div class="td-wrapper">
            <!-- Header Partial -->
            @include('partials.header')

            <div id="trigger-header-bg"></div>

            <!-- Booking Popup Partial -->
            @include('partials.booking_popup')

            <!-- Main Page Content -->
            @yield('content')

            <!-- Footer Partial -->
            @include('partials.footer')
        </div>
    </form>

    <!-- Cart Slide-in Popup Partial -->
    @include('partials.cart_popup')

    <!-- Product Detail Popup -->
    <div class="PopUp-menu parent-class" id="popup-detail-atc" style="display: none;">
        <style>
            #popup-detail-atc {
                max-width: 1000px !important;
                width: 95vw !important;
                background: #fff !important;
                border: none !important;
                border-radius: 16px !important;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
                overflow: hidden !important;
                padding: 0 !important;
            }
            .fancybox-slide--inline .fancybox-content {
                padding: 0 !important;
                background: transparent !important;
            }
            /* Custom close button */
            #popup-detail-atc .pd-close-btn {
                position: absolute;
                top: 20px;
                right: 20px;
                width: 36px;
                height: 36px;
                background: #fff;
                border: 1px solid #e2e8f0;
                border-radius: 50%;
                cursor: pointer;
                z-index: 50;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s ease;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }
            #popup-detail-atc .pd-close-btn:hover {
                background: #f1f5f9;
                transform: scale(1.05);
            }
            #popup-detail-atc .pd-close-btn svg {
                width: 14px !important;
                height: 14px !important;
                display: inline-block !important;
                stroke: #475569;
            }
            /* Grid layout */
            #popup-detail-atc .pd-container {
                display: flex;
                flex-direction: column;
            }
            @media (min-width: 768px) {
                #popup-detail-atc .pd-container {
                    flex-direction: row;
                    min-height: 560px;
                }
                #popup-detail-atc .pd-gallery-section {
                    width: 52% !important;
                    border-right: 1px solid #f1f5f9;
                }
                #popup-detail-atc .pd-info-section {
                    width: 48% !important;
                }
            }
            /* Gallery */
            #popup-detail-atc .pd-gallery-section {
                background: #fafafa;
                padding: 24px;
                display: flex;
                flex-direction: column;
                gap: 16px;
                justify-content: center;
            }
            #popup-detail-atc .pd-main-view-wrapper {
                position: relative;
                width: 100%;
                padding-top: 100%; /* 1:1 Aspect Ratio */
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                border: 1px solid #f1f5f9;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            }
            #popup-detail-atc .pd-main-view-content {
                position: absolute;
                top: 0; left: 0; width: 100%; height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #popup-detail-atc .pd-main-view-content img,
            #popup-detail-atc .pd-main-view-content video {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            /* Thumbnail Row */
            #popup-detail-atc .pd-thumbs-row {
                display: flex;
                gap: 10px;
                overflow-x: auto;
                padding: 4px 2px;
                scrollbar-width: thin;
            }
            #popup-detail-atc .pd-thumbs-row::-webkit-scrollbar {
                height: 4px;
            }
            #popup-detail-atc .pd-thumbs-row::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 2px;
            }
            #popup-detail-atc .pd-thumb-item {
                width: 70px;
                height: 70px;
                border-radius: 8px;
                overflow: hidden;
                border: 2px solid transparent;
                cursor: pointer;
                transition: all 0.2s ease;
                position: relative;
                flex-shrink: 0;
                background: #fff;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            }
            #popup-detail-atc .pd-thumb-item:hover {
                transform: translateY(-2px);
            }
            #popup-detail-atc .pd-thumb-item.active {
                border-color: #FFA827;
                box-shadow: 0 0 0 2px rgba(255, 168, 39, 0.2);
            }
            #popup-detail-atc .pd-thumb-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            /* Video icon overlay on thumbnail */
            #popup-detail-atc .pd-thumb-item .video-play-overlay {
                position: absolute;
                top: 0; left: 0; width: 100%; height: 100%;
                background: rgba(0, 0, 0, 0.4);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #popup-detail-atc .pd-thumb-item .video-play-overlay svg {
                width: 24px !important;
                height: 24px !important;
                display: inline-block !important;
                fill: #fff;
            }
            
            /* Info Column */
            #popup-detail-atc .pd-info-section {
                padding: 40px 32px 32px;
                display: flex;
                flex-direction: column;
                background: #fff;
            }
            #popup-detail-atc .pd-category-badge {
                align-self: flex-start;
                background: rgba(255, 168, 39, 0.1);
                color: #d97706;
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 11px;
                padding: 4px 10px;
                border-radius: 6px;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 16px;
            }
            #popup-detail-atc .pd-product-title {
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 28px;
                color: #1e293b;
                line-height: 1.25;
                margin: 0 0 12px 0;
                text-transform: uppercase;
            }
            /* Rating and Sold */
            #popup-detail-atc .pd-rating-row {
                display: flex;
                align-items: center;
                gap: 12px;
                font-size: 13px;
                color: #64748b;
                margin-bottom: 24px;
                font-family: PlusJaS-Regular, sans-serif;
            }
            #popup-detail-atc .pd-rating-stars {
                color: #fbbf24;
                display: flex;
                align-items: center;
                gap: 2px;
            }
            #popup-detail-atc .pd-rating-stars svg {
                width: 14px !important;
                height: 14px !important;
                display: inline-block !important;
            }
            #popup-detail-atc .pd-divider {
                width: 1px;
                height: 12px;
                background: #cbd5e1;
            }
            #popup-detail-atc .pd-sold-count {
                color: #475569;
                font-weight: 500;
            }
            /* Price */
            #popup-detail-atc .pd-price-card {
                background: #f8fafc;
                border-radius: 12px;
                padding: 16px 20px;
                margin-bottom: 24px;
            }
            #popup-detail-atc .pd-price-title {
                font-family: PlusJaS-Regular, sans-serif;
                font-size: 12px;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 6px;
            }
            #popup-detail-atc .pd-price-value {
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 36px;
                color: #ef4444;
                line-height: 1;
            }
            /* Description */
            #popup-detail-atc .pd-description-container {
                flex-grow: 1;
                margin-bottom: 24px;
            }
            #popup-detail-atc .pd-description-title {
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 14px;
                color: #475569;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 8px;
            }
            #popup-detail-atc .pd-description-text {
                font-family: PlusJaS-Regular, sans-serif;
                font-size: 14px;
                color: #475569;
                line-height: 1.7;
                max-height: 140px;
                overflow-y: auto;
                padding-right: 8px;
            }
            #popup-detail-atc .pd-description-text::-webkit-scrollbar {
                width: 4px;
            }
            #popup-detail-atc .pd-description-text::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 2px;
            }
            /* Action buttons footer */
            #popup-detail-atc .pd-footer-actions {
                display: flex;
                align-items: center;
                gap: 16px;
                margin-top: auto;
                border-top: 1px solid #f1f5f9;
                padding-top: 24px;
            }
            /* Quantity */
            #popup-detail-atc .pd-qty-control {
                display: flex;
                align-items: center;
                border: 1px solid #cbd5e1;
                border-radius: 8px;
                height: 48px;
                overflow: hidden;
                background: #fff;
            }
            #popup-detail-atc .pd-qty-control button {
                width: 40px;
                height: 100%;
                border: none;
                background: transparent;
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 16px;
                color: #64748b;
                cursor: pointer;
                outline: none;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.15s;
            }
            #popup-detail-atc .pd-qty-control button:hover {
                background: #f8fafc;
                color: #0f172a;
            }
            #popup-detail-atc .pd-qty-control input {
                width: 44px;
                height: 100%;
                border: none;
                border-left: 1px solid #e2e8f0;
                border-right: 1px solid #e2e8f0;
                background: transparent;
                text-align: center;
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 15px;
                color: #1e293b;
                outline: none;
            }
            /* Add button */
            #popup-detail-atc .pd-submit-btn {
                flex-grow: 1;
                height: 48px;
                background: linear-gradient(135deg, #FFA827 0%, #f59500 100%);
                color: #fff;
                border: none;
                border-radius: 8px;
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 15px;
                text-transform: uppercase;
                letter-spacing: 1px;
                cursor: pointer;
                outline: none;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                transition: all 0.2s ease;
                box-shadow: 0 4px 10px rgba(245, 149, 0, 0.2);
            }
            #popup-detail-atc .pd-submit-btn svg {
                width: 18px !important;
                height: 18px !important;
                display: inline-block !important;
                flex-shrink: 0 !important;
            }
            #popup-detail-atc .pd-submit-btn:hover {
                background: linear-gradient(135deg, #ffb74d 0%, #FFA827 100%);
                box-shadow: 0 6px 15px rgba(245, 149, 0, 0.35);
                transform: translateY(-1px);
            }
            #popup-detail-atc .pd-submit-btn:active {
                transform: translateY(1px);
                box-shadow: none;
            }
        </style>
        
        <div class="pd-close-btn" data-fancybox-close>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
        
        <div class="pd-container">
            <!-- Gallery Section -->
            <div class="pd-gallery-section">
                <div class="pd-main-view-wrapper">
                    <div class="pd-main-view-content" id="pdMainView">
                        <!-- Main image or video dynamically populated -->
                    </div>
                </div>
                <div class="pd-thumbs-row" id="pdThumbsRow">
                    <!-- Thumbnail items dynamically populated -->
                </div>
            </div>
            
            <!-- Info Section -->
            <div class="pd-info-section">
                <div class="pd-category-badge">Thực đơn</div>
                <h2 class="pd-product-title" id="popup-detail-product-name"></h2>
                
                <div class="pd-rating-row">
                    <div class="pd-rating-stars">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="pd-divider"></div>
                    <span class="pd-sold-count">100+ đã đặt</span>
                    <div class="pd-divider"></div>
                    <span style="color: #10b981; font-weight: 500;">Còn hàng</span>
                </div>
                
                <div class="pd-price-card">
                    <div class="pd-price-title">Giá bán</div>
                    <div class="pd-price-value" id="popup-detail-product-current-price"></div>
                </div>
                
                <div class="pd-description-container">
                    <div class="pd-description-title">Mô tả món ăn</div>
                    <div class="pd-description-text" id="popup-detail-product-sapo" style="font-weight: 600; color: #1e293b; margin-bottom: 8px; max-height: none; overflow: visible; padding-right: 0;"></div>
                    <div class="pd-description-text" id="popup-detail-product-content"></div>
                </div>
                
                <div class="pd-footer-actions">
                    <div class="pd-qty-control">
                        <button type="button" id="minusDetail">−</button>
                        <input type="text" id="popup-detail-quantity" class="txtQuantity" value="1" readonly/>
                        <button type="button" id="plusDetail">+</button>
                    </div>
                    <button type="button" class="ready-call-add-to-card pd-submit-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 2px;">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span>Đặt món ngay</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>
    <div id="fb-customer-chat" class="fb-customerchat"></div>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "100613905178150");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v16.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Admin Settings & Zalo Booking & Product Detail Integration -->
    <script>
    (function() {
        // Load settings from admin-exported JSON
        var settingsUrl = '{{ BASE_URL }}data/settings.json?v=' + Date.now();
        var xhr = new XMLHttpRequest();
        xhr.open('GET', settingsUrl, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var s = JSON.parse(xhr.responseText);
                    
                    // Update floating contact icons
                    var floatingMenu = document.getElementById('floatingContactMenu');
                    if (floatingMenu) {
                        var zaloItem = floatingMenu.querySelector('.contact-item.zalo');
                        var fbItem = floatingMenu.querySelector('.contact-item.facebook');
                        var tiktokItem = floatingMenu.querySelector('.contact-item.tiktok');
                        
                        if (zaloItem && s.zalo_link) zaloItem.href = s.zalo_link;
                        if (fbItem && s.facebook_link) fbItem.href = s.facebook_link;
                        if (tiktokItem && s.tiktok_link) tiktokItem.href = s.tiktok_link;
                    }

                    // Update drawer social links
                    var drawerSocials = document.querySelectorAll('.ph-drawer-socials .ph-d-social-btn');
                    if (drawerSocials.length >= 3) {
                        if (s.facebook_link) drawerSocials[0].href = s.facebook_link;
                        if (s.instagram_link) drawerSocials[1].href = s.instagram_link;
                        if (s.tiktok_link) drawerSocials[2].href = s.tiktok_link;
                    }

                    // Store settings globally for booking form use
                    window._adminSettings = s;
                } catch(e) { 
                    console.log('Settings parse error:', e); 
                }
            }
        };
        xhr.send();

        // === Bind click for dynamic popupFood to show product detail ===
        $(document).on('click', '.popupFood', function(e) {
            e.preventDefault();
            var proId = $(this).data('id');
            if (!proId) return;

            $.ajax({
                url: '{{ BASE_URL }}api/product-detail',
                data: { proId: proId },
                type: 'GET',
                dataType: 'json',
                success: function(rs) {
                    if (rs.Success && rs.Data) {
                        var data = rs.Data;
                        var popup = $("#popup-detail-atc");
                        popup.data("id", data.ProId).attr("data-id", data.ProId);
                        popup.data("name", data.ProName).attr("data-name", data.ProName);
                        popup.data("price", data.ProOriginPrice).attr("data-price", data.ProOriginPrice);
                        
                        $('#popup-detail-product-name').html(data.ProName);
                        $("#popup-detail-quantity").val(1);
                        $('#popup-detail-product-sapo').html(data.ProSapo || '');
                        $('#popup-detail-product-current-price').html(data.ProOriginPrice + "đ");

                        // Re-bind price Format in popup
                        if (window.jQuery && $.fn.priceFormat) {
                            $('#popup-detail-product-current-price').priceFormat({
                                prefix: '',
                                suffix: '',
                                centsLimit: 0,
                                thousandsSeparator: ','
                            });
                        }

                        // Media Section (Interactive viewport + thumbnails gallery)
                        var mainView = popup.find('#pdMainView');
                        var thumbsRow = popup.find('#pdThumbsRow');
                        var imgUrl = (data.LstImage && data.LstImage.length > 0) ? data.LstImage[0].SrcOrigin : 'images/produc.webp';

                        // Set overview (Sapo) and detailed content
                        var productSapo = data.ProSapo || "";
                        var productContent = data.ProContent || "Món ăn thơm ngon, bổ dưỡng, được chế biến chuẩn vị từ nguồn nguyên liệu tươi sạch chuẩn kiểm định bởi các đầu bếp tài hoa của Quán Nhậu Anh Em.";

                        if (productSapo) {
                            $('#popup-detail-product-sapo').html(productSapo).show();
                        } else {
                            $('#popup-detail-product-sapo').hide();
                        }
                        $('#popup-detail-product-content').html(productContent);

                        // Compile all available media items
                        var mediaList = [];

                        // 1. Images
                        if (data.LstImage && data.LstImage.length > 0) {
                            data.LstImage.forEach(function(img) {
                                mediaList.push({
                                    type: 'image',
                                    src: img.SrcOrigin,
                                    thumb: img.SrcOrigin
                                });
                            });
                        } else {
                            mediaList.push({
                                type: 'image',
                                src: 'images/produc.webp',
                                thumb: 'images/produc.webp'
                            });
                        }

                        // 2. Video (if exists)
                        if (data.ProVideo) {
                            mediaList.push({
                                type: 'video',
                                src: data.ProVideo,
                                thumb: imgUrl
                            });
                        }

                        // Helper function to render active media in main view
                        function setMainView(item) {
                            if (item.type === 'video') {
                                mainView.html('<video src="' + item.src + '" autoplay muted loop playsinline controls style="width: 100%; height: 100%; object-fit: cover;"></video>');
                            } else {
                                mainView.html('<img src="' + item.src + '" alt="' + data.ProName + '" style="width: 100%; height: 100%; object-fit: cover;"/>');
                            }
                        }

                        // Set initial view (first item)
                        if (mediaList.length > 0) {
                            setMainView(mediaList[0]);
                        }

                        // Render thumbnails row HTML
                        var thumbsHtml = '';
                        mediaList.forEach(function(item, index) {
                            var activeClass = index === 0 ? 'active' : '';
                            if (item.type === 'video') {
                                thumbsHtml += `
                                <div class="pd-thumb-item ${activeClass}" data-index="${index}">
                                    <video src="${item.src}" muted playsinline preload="metadata" style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;"></video>
                                    <div class="video-play-overlay">
                                        <svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                                    </div>
                                </div>`;
                            } else {
                                thumbsHtml += `
                                <div class="pd-thumb-item ${activeClass}" data-index="${index}">
                                    <img src="${item.thumb}"/>
                                </div>`;
                            }
                        });
                        thumbsRow.html(thumbsHtml);

                        // Attach event handlers for switching views on click
                        thumbsRow.off('click', '.pd-thumb-item').on('click', '.pd-thumb-item', function() {
                            var idx = $(this).data('index');
                            var item = mediaList[idx];
                            setMainView(item);
                            thumbsRow.find('.pd-thumb-item').removeClass('active');
                            $(this).addClass('active');
                        });

                        // Open Fancybox
                        $.fancybox.open({
                            src: '#popup-detail-atc',
                            type: 'inline',
                            opts: {
                                protect: true,
                                animationDuration: 400,
                                touch: false,
                                autoFocus: false,
                                backFocus: false,
                                hash: false,
                                beforeShow: function () {
                                    $('body').addClass('popup-active');
                                },
                                afterClose: function() {
                                    $('body').removeClass('popup-active');
                                    $("#popup-detail-atc").data("id", 0).attr("data-id", 0);
                                    mainView.html('');
                                    thumbsRow.html('');
                                }
                            }
                        });
                    }
                }
            });
        });

        // === Bind click for quantity selector buttons in product detail popup ===
        $(document).on('click', '#minusDetail', function(e) {
            e.preventDefault();
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
        });
        $(document).on('click', '#plusDetail', function(e) {
            e.preventDefault();
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            $input.val(count);
            $input.change();
        });

        // === Zalo Booking Integration ===
        // Override the booking submit to redirect to Zalo OA with message
        document.addEventListener('click', function(e) {
            var bookBtn = e.target.closest('.jsSubmitBooking');
            var shipBtn = e.target.closest('.jsSubmitShipping');
            
            if (bookBtn) {
                e.preventDefault();
                e.stopPropagation();
                handleZaloBooking();
            }
            
            if (shipBtn) {
                e.preventDefault();
                e.stopPropagation();
                handleZaloShipping();
            }
        });

        function handleZaloBooking() {
            var name = document.getElementById('txtFullname');
            var phone = document.getElementById('txtPhone');
            var guests = document.getElementById('txtTotalCus');
            var date = document.getElementById('bookingDateCome');
            var time = document.getElementById('txtValueTime');
            var note = document.getElementById('txtNote');

            var nameVal = name ? name.value.trim() : '';
            var phoneVal = phone ? phone.value.trim() : '';
            
            if (!nameVal || !phoneVal) {
                alert('Vui lòng nhập tên và số điện thoại!');
                return;
            }

            var msg = 'ĐẶT BÀN\n';
            msg += 'Tên: ' + nameVal + '\n';
            msg += 'SĐT: ' + phoneVal + '\n';
            if (guests) msg += 'Số khách: ' + guests.value + '\n';
            if (date && date.value) msg += 'Ngày: ' + date.value + '\n';
            if (time && time.value) msg += 'Giờ: ' + time.value + '\n';
            if (note && note.value.trim()) msg += 'Ghi chú: ' + note.value.trim();

            openZaloChat(msg);
        }

        function handleZaloShipping() {
            var name = document.getElementById('txtShipName');
            var phone = document.getElementById('txtShipPhone');
            var address = document.getElementById('txtShipAddress');
            var note = document.getElementById('txtShipNote');

            var nameVal = name ? name.value.trim() : '';
            var phoneVal = phone ? phone.value.trim() : '';

            if (!nameVal || !phoneVal) {
                alert('Vui lòng nhập tên và số điện thoại!');
                return;
            }

            var msg = 'ĐẶT SHIP\n';
            msg += 'Tên: ' + nameVal + '\n';
            msg += 'SĐT: ' + phoneVal + '\n';
            if (address && address.value.trim()) msg += 'Địa chỉ: ' + address.value.trim() + '\n';
            if (note && note.value.trim()) msg += 'Ghi chú: ' + note.value.trim();

            openZaloChat(msg);
        }

        function openZaloChat(message) {
            var s = window._adminSettings || {};
            var oaId = s.zalo_oa_id || '';
            
            if (oaId) {
                var zaloUrl = 'https://zalo.me/' + oaId;
                window.open(zaloUrl, '_blank');
                
                // Show success feedback
                alert('Đơn đặt hàng đã được gửi! Cửa sổ Zalo sẽ mở để bạn gửi thông tin đơn hàng.');
            } else {
                // Fallback to Zalo link from settings
                var zaloLink = s.zalo_link || '';
                if (zaloLink) {
                    window.open(zaloLink, '_blank');
                    alert('Vui lòng gửi thông tin đặt hàng qua Zalo!');
                } else {
                    alert('Đặt hàng thành công! Chúng tôi sẽ liên hệ lại với bạn sớm nhất.');
                }
            }
        }
    })();
    </script>

    @yield('scripts')
</body>
</html>
