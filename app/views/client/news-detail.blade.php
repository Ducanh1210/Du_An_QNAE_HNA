@extends('layout.client')

@section('title', $detail->title . ' - Quán Nhậu Anh Em')
@section('meta_description', $detail->overview)

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area" style="background: #fff; padding: 25px 0 15px; margin-top: 10px;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0" style="background: none; padding: 0; font-size: 14px; display: flex; list-style: none; font-family: Arial, Helvetica, sans-serif;">
                <li class="breadcrumb-item"><a href="{{ BASE_URL }}" style="color: #666; text-decoration: none;"><i class="fas fa-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item" style="margin: 0 10px; color: #ccc;">/</li>
                <li class="breadcrumb-item"><a href="{{ BASE_URL }}tin-tuc" style="color: #666; text-decoration: none;">Tin tức</a></li>
                <li class="breadcrumb-item" style="margin: 0 10px; color: #ccc;">/</li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #cc2027; font-weight: bold;">{{ $detail->category_name ?? 'Tin tức' }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="news-page-container" style="background: #fff; padding: 15px 0 60px;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        
        <!-- Main Row -->
        <div class="row">
            
            <!-- Cột trái: Nội dung chính -->
            <div class="col-lg-8" style="padding-right: 30px;">
                
                <!-- Tiêu đề bài viết -->
                <h1 class="news-title" style="font-family: 'Times New Roman', Times, serif; font-size: 38px; font-weight: 700; color: #333; line-height: 1.3; margin-bottom: 20px;">
                    {{ $detail->title }}
                </h1>
                
                <!-- Hàng Meta (Ngày giờ và Nút chia sẻ) -->
                <div class="meta-row" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <div class="meta-left" style="font-size: 14px; color: #555; font-family: Arial, Helvetica, sans-serif;">
                        @php
                            $days = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
                            $dayOfWeek = $days[date('w', strtotime($detail->created_at))];
                        @endphp
                        {{ $dayOfWeek }}, {{ date('d/m/Y H:i', strtotime($detail->created_at)) }} | <span style="font-weight: 600;">{{ $detail->category_name ?? 'Tin Tức' }}</span>
                    </div>
                </div>
                
                <hr style="border: 0; border-top: 1px solid #eee; margin: 0 0 20px 0;">
                
                <!-- Đoạn Sapo (Tóm tắt) -->
                <div class="news-sapo" style="font-family: Arial, Helvetica, sans-serif; font-size: 17px; font-weight: bold; line-height: 1.6; color: #333; margin-bottom: 25px;">
                    {{ $detail->overview }}
                </div>
                
                <!-- Phần Layout chia đôi bên trong Cột Trái -->
                <div class="content-split-layout" style="display: flex;">
                    
                    <!-- Cột chia sẻ bên trái -->
                    <div class="social-col" style="width: 40px; margin-right: 25px; flex-shrink: 0; display: flex; flex-direction: column; gap: 10px;">
                        <a href="{{ BASE_URL }}" class="s-btn s-home" style="background: #cc2027; color: #fff; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 18px; transition: 0.2s;"><i class="fas fa-home"></i></a>
                        <a href="#" class="s-btn s-fb" style="background: #e2e8f0; color: #3b5998; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 18px; transition: 0.2s;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="s-btn s-zalo" style="background: #e2e8f0; color: #008fe5; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 12px; font-weight: bold; font-family: Arial; transition: 0.2s;">Zalo</a>
                        <a href="#" class="s-btn s-mail" style="background: #e2e8f0; color: #555; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 18px; transition: 0.2s;"><i class="fas fa-envelope"></i></a>
                    </div>
                    
                    <!-- Nội dung bài viết bên phải -->
                    <div class="body-col" style="flex: 1; overflow: hidden; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 1.7; color: #222;">
                        {!! $detail->content !!}
                        
                        <div class="tags-area" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee;">
                            <span style="font-weight: bold; font-size: 14px; margin-right: 10px;">Tags:</span>
                            <a href="javascript:;" style="display: inline-block; background: #f5f5f5; color: #555; padding: 4px 12px; font-size: 13px; text-decoration: none; margin-right: 5px; border-radius: 3px;">Quán Nhậu Anh Em</a>
                            <a href="javascript:;" style="display: inline-block; background: #f5f5f5; color: #555; padding: 4px 12px; font-size: 13px; text-decoration: none; border-radius: 3px;">{{ $detail->category_name ?? 'Tin tức' }}</a>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!-- Cột phải: Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-wrapper">
                    <!-- Block Tin Đọc Nhiều Nhất -->
                    <div class="sidebar-block" style="margin-bottom: 30px;">
                        <div class="block-header" style="background-color: #d12128; color: #fff; padding: 8px 15px; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: bold; border-left: 4px solid #991015;">
                            TIN ĐỌC NHIỀU NHẤT
                        </div>
                        
                        <div class="block-content" style="padding-top: 15px;">
                            @if(count($relatedNews) > 0)
                                @foreach($relatedNews as $news)
                                    @php
                                        $imgUrl = $news->img_thumbnail;
                                        if ($imgUrl) {
                                            if (!preg_match('/^(images\/|https?:\/\/)/', $imgUrl)) {
                                                $imgUrl = BASE_URL . 'storage/uploads/news/' . basename($imgUrl);
                                            } else {
                                                $imgUrl = BASE_URL . $imgUrl;
                                            }
                                        } else {
                                            $imgUrl = BASE_URL . 'images/Untitled-3.webp';
                                        }
                                    @endphp
                                    <!-- Tin bài item -->
                                    <div class="sb-news-item" style="display: flex; padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px solid #eee;">
                                        <div class="sb-thumb" style="width: 120px; height: 75px; flex-shrink: 0; margin-right: 15px;">
                                            <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}">
                                                <img src="{{ $imgUrl }}" alt="{{ $news->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="sb-info" style="flex: 1;">
                                            <h4 style="margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 700; line-height: 1.4;">
                                                <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}" style="color: #333; text-decoration: none; transition: color 0.2s;" class="hover-red">
                                                    {{ $news->title }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    
                    <!-- Banner QC hoặc Liên kết (Tuỳ chọn) -->
                    <div class="sidebar-banner" style="background: #f9f9f9; border: 1px solid #eee; padding: 20px; text-align: center;">
                        <h4 style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #cc2027;">Khám phá thực đơn</h4>
                        <p style="font-family: Arial, sans-serif; font-size: 13px; color: #555; margin-bottom: 15px;">Thưởng thức các món ngon tại Quán Nhậu Anh Em ngay hôm nay!</p>
                        <a href="{{ BASE_URL }}thuc-don" style="display: inline-block; background: #cc2027; color: #fff; padding: 6px 15px; text-decoration: none; font-size: 13px; font-weight: bold; border-radius: 3px;">Xem Thực Đơn</a>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    /* Reset & Fonts cho giao diện báo */
    body {
        background-color: #fff;
    }
    
    .hover-red:hover {
        color: #cc2027 !important;
    }

    .s-btn:hover {
        opacity: 0.8;
    }

    /* Định dạng bài viết */
    .body-col img {
        max-width: 100%;
        height: auto !important;
        display: block;
        margin: 20px auto;
    }
    
    .body-col p {
        margin-bottom: 15px;
        text-align: justify;
    }
    
    .body-col h2, .body-col h3, .body-col h4 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #222;
        margin: 25px 0 15px;
    }
    
    .body-col h2 { font-size: 22px; }
    .body-col h3 { font-size: 20px; }

    /* Responsive */
    @media (max-width: 991px) {
        .col-lg-8 {
            padding-right: 15px !important;
            margin-bottom: 40px;
        }
        .content-split-layout {
            flex-direction: column;
        }
        .social-col {
            flex-direction: row !important;
            width: 100% !important;
            margin-bottom: 20px;
            margin-right: 0 !important;
        }
    }
    
    @media (max-width: 768px) {
        .news-title {
            font-size: 28px !important;
        }
        .meta-row {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
        }
        .sb-news-item {
            flex-direction: column;
        }
        .sb-thumb {
            width: 100% !important;
            height: 180px !important;
            margin-bottom: 10px;
        }
    }
</style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            App.initHelpers([""]);
            if (typeof fixPositionStickyMenu === 'function') {
                fixPositionStickyMenu();
            }
        });
    </script>
@endsection
