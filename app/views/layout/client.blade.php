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
    <div class="PopUp-menu parent-class" id="popup-detail-atc" style="display: none; max-width: 850px; width: 100%; padding: 0; background: #faf6ee; border: 3px solid #603813; box-shadow: 8px 8px 0px #FFA827; overflow: hidden; border-radius: 0;">
        <style>
            #popup-detail-atc .detail-grid {
                display: flex;
                flex-direction: column;
            }
            @media (min-width: 768px) {
                #popup-detail-atc .detail-grid {
                    flex-direction: row;
                }
                #popup-detail-atc .galleryBox {
                    width: 50% !important;
                    height: 450px !important;
                    border-bottom: none !important;
                    border-right: 3px solid #603813;
                }
                #popup-detail-atc .info-section {
                    width: 50% !important;
                    padding: 35px 30px !important;
                    justify-content: space-between;
                }
            }
            #popup-detail-atc .detail-media-wrapper {
                display: flex;
                flex-direction: column;
                height: 100%;
                width: 100%;
            }
            #popup-detail-atc .detail-video-container {
                height: 55%;
                width: 100%;
                background: #000;
                border-bottom: 3px solid #603813;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #popup-detail-atc .detail-image-container {
                height: 45%;
                width: 100%;
                background: #fff;
                position: relative;
                overflow: hidden;
            }
            #popup-detail-atc .media-badge {
                position: absolute;
                top: 12px;
                left: 12px;
                background: #603813;
                color: #fff;
                padding: 3px 8px;
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 10px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border: 1.5px solid #603813;
                z-index: 10;
                box-shadow: 2px 2px 0px #FFA827;
            }
            #popup-detail-atc .info-header {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            #popup-detail-atc .product-tag {
                align-self: flex-start;
                background: #FFA827;
                color: #603813;
                font-family: PlusJaS-Bold, sans-serif;
                font-size: 11px;
                padding: 3px 8px;
                text-transform: uppercase;
                border: 1.5px solid #603813;
                letter-spacing: 0.5px;
            }
            #popup-detail-atc .product-desc {
                font-family: PlusJaS-Regular, sans-serif;
                font-size: 14px;
                color: #7a5028;
                line-height: 1.6;
                overflow-y: auto;
                max-height: 180px;
                margin-top: 10px;
                padding-right: 5px;
            }
            #popup-detail-atc .product-desc::-webkit-scrollbar {
                width: 6px;
            }
            #popup-detail-atc .product-desc::-webkit-scrollbar-track {
                background: #faf6ee;
            }
            #popup-detail-atc .product-desc::-webkit-scrollbar-thumb {
                background: #603813;
            }
        </style>
        <div class="popup-detail-content" style="position: relative; height: 100%;">
            <!-- Close Button -->
            <div class="close-popup" data-fancybox-close style="position: absolute; right: 15px; top: 15px; cursor: pointer; z-index: 15;">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="16" cy="16" r="15.1" fill="white" stroke="#603813" stroke-width="1.8" />
                    <path d="M20.6666 11.3335L11.3333 20.6668" stroke="#603813" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="square" />
                    <path d="M20.6666 20.6668L11.3333 11.3335" stroke="#603813" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="square" />
                </svg>
            </div>

            <div class="detail-grid">
                <!-- Gallery Section -->
                <div class="galleryBox" id="popupDetailMediaBox" style="width: 100%; position: relative; background: #fff; border-bottom: 3px solid #603813; height: 350px; overflow: hidden;">
                    <!-- media elements dynamically populated here -->
                </div>

                <!-- Info Section -->
                <div class="info-section" style="padding: 25px; display: flex; flex-direction: column; gap: 20px; text-align: left; background: #faf6ee;">
                    <div class="info-header">
                        <div class="product-tag">Món Ăn</div>
                        <h2 id="popup-detail-product-name" style="font-family: PlusJaS-Bold, sans-serif; font-size: 26px; color: #603813; margin: 0; text-transform: uppercase; line-height: 1.2;"></h2>
                        <div id="popup-detail-product-sapo" class="product-desc"></div>
                    </div>
                    
                    <div class="price-and-action" style="display: flex; flex-direction: column; gap: 20px; margin-top: auto;">
                        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px; border-top: 1.5px dashed rgba(96, 56, 19, 0.2); padding-top: 15px;">
                            <div class="price-box">
                                <span style="font-family: PlusJaS-Regular, sans-serif; font-size: 13px; color: #7a5028; display: block; margin-bottom: 2px;">Giá bán</span>
                                <span id="popup-detail-product-current-price" style="font-family: PlusJaS-Bold, sans-serif; font-size: 28px; color: #FE2C55; line-height: 1;"></span>
                            </div>

                            <div class="action-box" style="display: flex; align-items: center; gap: 15px;">
                                <!-- Quantity selector -->
                                <div class="qty-select-wrapper" style="display: flex; align-items: center; border: 2px solid #603813; background: #fff; height: 44px; overflow: hidden; box-sizing: border-box; box-shadow: 2px 2px 0 #603813;">
                                    <button type="button" id="minusDetail" style="width: 40px; height: 100%; border: none; background: transparent; font-family: PlusJaS-Bold, sans-serif; font-size: 18px; color: #603813; cursor: pointer; display: flex; align-items: center; justify-content: center; outline: none;">-</button>
                                    <input type="text" id="popup-detail-quantity" class="txtQuantity" value="1" readonly style="width: 40px; height: 100%; border: none; border-left: 2px solid #603813; border-right: 2px solid #603813; text-align: center; font-family: PlusJaS-Bold, sans-serif; font-size: 16px; color: #603813; background: transparent; outline: none;" />
                                    <button type="button" id="plusDetail" style="width: 40px; height: 100%; border: none; background: transparent; font-family: PlusJaS-Bold, sans-serif; font-size: 18px; color: #603813; cursor: pointer; display: flex; align-items: center; justify-content: center; outline: none;">+</button>
                                </div>

                                <!-- Add Cart Button -->
                                <button type="button" class="ready-call-add-to-card btn-add-detail-popup" style="background: #FFA827; border: 2px solid #603813; color: #603813; font-family: PlusJaS-Bold, sans-serif; font-size: 15px; height: 44px; padding: 0 25px; cursor: pointer; text-transform: uppercase; box-shadow: 4px 4px 0px #603813; transition: all 0.1s ease; display: inline-flex; align-items: center; justify-content: center; outline: none;">Thêm vào thực đơn</button>
                            </div>
                        </div>
                    </div>
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

                        // Media Section (Stacked layout if both exist, otherwise just image)
                        var mediaBox = popup.find('#popupDetailMediaBox');
                        var mediaHtml = '';
                        var imgUrl = (data.LstImage && data.LstImage.length > 0) ? data.LstImage[0].SrcOrigin : 'images/produc.webp';

                        if (data.ProVideo) {
                            mediaHtml = `
                            <div class="detail-media-wrapper">
                                <div class="detail-video-container">
                                    <span class="media-badge">Video</span>
                                    <video src="${data.ProVideo}" autoplay muted loop playsinline controls style="width: 100%; height: 100%; object-fit: cover;"></video>
                                </div>
                                <div class="detail-image-container">
                                    <span class="media-badge">Hình ảnh</span>
                                    <div style="background-image: url('${imgUrl}'); background-size: cover; background-position: center; height: 100%; width: 100%;"></div>
                                </div>
                            </div>`;
                        } else {
                            mediaHtml = `
                            <div style="background-image: url('${imgUrl}'); background-size: cover; background-position: center; height: 100%; width: 100%;"></div>`;
                        }
                        mediaBox.html(mediaHtml);

                        // Open Fancybox
                        $.fancybox.open({
                            src: '#popup-detail-atc',
                            type: 'inline',
                            opts: {
                                protect: true,
                                animationDuration: 500,
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
                                    // Completely clear media container on close to pause any video/audio
                                    mediaBox.html('');
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
