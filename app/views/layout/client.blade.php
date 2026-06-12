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
    <link href="{{ BASE_URL }}Static/css/custom.css?v=639156730100000007" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/fonts.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/fix-notice-mob.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/editkhoisw.css" rel="stylesheet" />
    <link href="{{ BASE_URL }}Static/css/premium-header.css?v=37" rel="stylesheet" />
    <!-- END: Core CSS-->

    @yield('styles')

    <!-- BEGIN: Template JS-->
    <script src="{{ BASE_URL }}Static/js/jquery.min.js"></script>
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
    <script src="{{ BASE_URL }}Static/min/anhem.js?v=639156723241637552_fixed"></script>
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
                        popup.data("id", data.ProId);
                        popup.data("name", data.ProName);
                        popup.data("price", data.ProOriginPrice);
                        
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

                        // Gallery
                        var galleryWrapper = popup.find('.swiper-gallery .swiper-wrapper');
                        if (galleryWrapper.length > 0 && data.LstImage && data.LstImage.length > 0) {
                            var galleryHtml = '';
                            data.LstImage.forEach(function(img) {
                                galleryHtml += `
                                <div class="swiper-slide">
                                    <div class="images-food">
                                        <i class="img-background" style="background-image: url('${img.SrcOrigin}'); background-size: cover; background-position: center; padding-top: 100%; display: block;"></i>
                                    </div>
                                </div>`;
                            });
                            galleryWrapper.html(galleryHtml);
                        }

                        // Open Fancybox
                        $.fancybox.open({
                            src: '#popup-detail-atc',
                            type: 'inline',
                            opts: {
                                protect: true,
                                animationDuration: 500,
                                touch: false,
                                beforeShow: function () {
                                    $('body').addClass('popup-active');
                                },
                                afterShow: function () {
                                    if (window.Swiper) {
                                        window.popupSwiperGallery = new Swiper(".swiper-gallery", {
                                            slidesPerView: 1,
                                            spaceBetween: 0,
                                            pagination: {
                                                el: ".galleryBox .swiper-pagination",
                                                type: "fraction"
                                            }
                                        });
                                    }
                                },
                                afterClose: function() {
                                    $('body').removeClass('popup-active');
                                    $("#popup-detail-atc").data("id", 0);
                                    if (window.popupSwiperGallery) {
                                        window.popupSwiperGallery.destroy();
                                    }
                                }
                            }
                        });
                    }
                }
            });
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
