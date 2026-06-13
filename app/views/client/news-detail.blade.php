@extends('layout.client')

@section('title', $detail->title . ' - Quán Nhậu Anh Em')
@section('meta_description', $detail->overview)

@section('content')
<div class="news-detail-wrapper" style="background: #fdfdfd; padding-bottom: 60px;">
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area" style="border-bottom: 1px solid #eaeaea; background: #fff; padding: 15px 0;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0" style="background: none; padding: 0; font-size: 14px; display: flex; list-style: none;">
                    <li class="breadcrumb-item"><a href="{{ BASE_URL }}" style="color: #666; text-decoration: none;"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item" style="margin: 0 10px; color: #ccc;">/</li>
                    <li class="breadcrumb-item"><a href="{{ BASE_URL }}tin-tuc" style="color: #666; text-decoration: none;">Tin tức</a></li>
                    <li class="breadcrumb-item" style="margin: 0 10px; color: #ccc;">/</li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #ffa827; font-weight: 600;">{{ $detail->category_name ?? 'Tin tức' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container" style="max-width: 1200px; margin: 40px auto 0; padding: 0 15px;">
        <div class="row">
            <!-- Main Content (8 cols) -->
            <div class="col-lg-8 main-article-container">
                <article class="news-article" style="background: #fff; padding: 40px; border-radius: 12px; border: 1px solid #eaeaea; box-shadow: 0 5px 20px rgba(0,0,0,0.02);">
                    <header class="article-header" style="margin-bottom: 30px;">
                        <div class="article-meta" style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; margin-bottom: 20px; border-bottom: 2px solid #f4f4f4;">
                            <div class="meta-left" style="font-size: 14px; color: #777;">
                                <span style="color: #ffa827; font-weight: 700; text-transform: uppercase; margin-right: 15px; letter-spacing: 1px;">
                                    {{ $detail->category_name ?? 'Sự kiện nổi bật' }}
                                </span>
                                <span><i class="far fa-clock"></i> {{ date('H:i, d/m/Y', strtotime($detail->created_at)) }}</span>
                            </div>
                            <div class="meta-right social-share">
                                <a href="javascript:;" style="color: #3b5998; margin-left: 10px; font-size: 18px; transition: opacity 0.3s;"><i class="fab fa-facebook-square"></i></a>
                                <a href="javascript:;" style="color: #00aced; margin-left: 10px; font-size: 18px; transition: opacity 0.3s;"><i class="fab fa-twitter-square"></i></a>
                                <a href="javascript:;" style="color: #007bb6; margin-left: 10px; font-size: 18px; transition: opacity 0.3s;"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>

                        <h1 class="article-title" style="font-family: 'Times New Roman', Times, serif; font-size: 38px; font-weight: 700; color: #111; line-height: 1.35; margin-bottom: 25px;">
                            {{ $detail->title }}
                        </h1>
                    </header>

                    <div class="article-overview" style="font-size: 18px; font-weight: 600; color: #333; line-height: 1.65; margin-bottom: 35px; background: #f9f9f9; padding: 20px 25px; border-left: 4px solid #ffa827;">
                        {{ $detail->overview }}
                    </div>

                    <div class="article-content" style="font-size: 17px; line-height: 1.85; color: #222;">
                        {!! $detail->content !!}
                    </div>

                    <footer class="article-footer" style="margin-top: 50px; padding-top: 25px; border-top: 1px solid #eaeaea;">
                        <div class="tags" style="display: flex; align-items: center; flex-wrap: wrap; gap: 10px;">
                            <span style="font-weight: 600; color: #111;"><i class="fas fa-tags" style="color:#ffa827; margin-right:5px;"></i> Chủ đề:</span>
                            <a href="javascript:;" class="tag-item">Quán Nhậu Anh Em</a>
                            <a href="javascript:;" class="tag-item">{{ $detail->category_name ?? 'Tin tức' }}</a>
                            <a href="javascript:;" class="tag-item">Sự kiện</a>
                        </div>
                    </footer>
                </article>
            </div>

            <!-- Sidebar (4 cols) -->
            <div class="col-lg-4 sidebar-container">
                <div class="sticky-sidebar" style="position: sticky; top: 100px;">
                    <div class="sidebar-widget" style="background: #fff; border: 1px solid #eaeaea; border-radius: 12px; padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.02);">
                        <h3 class="widget-title" style="font-size: 18px; font-weight: 800; text-transform: uppercase; color: #111; border-left: 4px solid #ffa827; padding-left: 12px; margin-bottom: 25px; line-height: 1.2;">
                            Tin Đáng Chú Ý
                        </h3>
                        
                        <div class="widget-content">
                            @if(count($relatedNews) > 0)
                                @foreach($relatedNews as $index => $news)
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
                                    <div class="side-news-item" style="display: flex; gap: 15px; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px dashed #eaeaea;">
                                        <div class="thumb" style="width: 110px; height: 80px; flex-shrink: 0; overflow: hidden; border-radius: 6px;">
                                            <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}">
                                                <img src="{{ $imgUrl }}" alt="{{ $news->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s;">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 style="font-size: 15px; font-weight: 700; line-height: 1.4; margin: 0 0 8px 0; font-family: 'Inter', sans-serif;">
                                                <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}" style="color: #222; text-decoration: none; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.2s;">
                                                    {{ $news->title }}
                                                </a>
                                            </h4>
                                            <div class="date" style="font-size: 12px; color: #888;">
                                                <i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($news->created_at)) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    
                    <!-- Decorative Banner or Menu Link -->
                    <div class="sidebar-banner" style="margin-top: 30px; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05); position: relative;">
                        <div style="background: linear-gradient(135deg, #111, #333); padding: 40px 30px; text-align: center; color: #fff;">
                            <h4 style="font-size: 22px; font-weight: 800; margin-bottom: 15px; color: #ffa827;">Khám phá thực đơn</h4>
                            <p style="font-size: 14px; opacity: 0.9; margin-bottom: 20px;">Trải nghiệm những món ăn nhậu độc đáo và hấp dẫn nhất tại Quán Nhậu Anh Em.</p>
                            <a href="{{ BASE_URL }}thuc-don" style="display: inline-block; padding: 10px 25px; background: #ffa827; color: #fff; font-weight: bold; border-radius: 30px; text-decoration: none; text-transform: uppercase; font-size: 13px; letter-spacing: 1px;">Xem Thực Đơn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling specifically for the rich text content */
    .article-content img {
        max-width: 100%;
        height: auto !important;
        border-radius: 8px;
        margin: 25px auto;
        display: block;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .article-content p {
        margin-bottom: 20px;
        text-align: justify;
    }
    .article-content ul, .article-content ol {
        margin-bottom: 22px;
        padding-left: 25px;
    }
    .article-content li {
        margin-bottom: 10px;
    }
    .article-content table {
        width: 100% !important;
        border-collapse: collapse;
        margin: 30px 0;
    }
    .article-content table th {
        background: #f8f9fa;
        font-weight: bold;
    }
    .article-content table th, .article-content table td {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
    }
    .article-content h2, .article-content h3, .article-content h4 {
        font-family: 'Times New Roman', Times, serif;
        font-weight: 700;
        color: #111;
        margin: 35px 0 20px;
        line-height: 1.4;
    }
    .article-content h2 { font-size: 28px; }
    .article-content h3 { font-size: 24px; }
    .article-content blockquote {
        border-left: 5px solid #ffa827;
        background: #f9f9f9;
        padding: 20px 25px;
        font-style: italic;
        margin: 30px 0;
        font-size: 18px;
        color: #555;
        border-radius: 0 8px 8px 0;
    }
    .article-content a {
        color: #ffa827;
        text-decoration: none;
    }
    .article-content a:hover {
        text-decoration: underline;
    }
    
    /* Tags styling */
    .tag-item {
        display: inline-block;
        padding: 6px 14px;
        background: #f4f4f4;
        color: #555;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        border-radius: 20px;
        transition: all 0.2s;
    }
    .tag-item:hover {
        background: #ffa827;
        color: #fff;
    }
    
    /* Social Share */
    .social-share a:hover {
        opacity: 0.7;
    }

    /* Sidebar Animations */
    .side-news-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .side-news-item:hover .thumb img {
        transform: scale(1.1);
    }
    .side-news-item:hover h4 a {
        color: #ffa827 !important;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .article-title {
            font-size: 30px !important;
        }
        .sidebar-container {
            margin-top: 40px;
        }
        .news-article {
            padding: 25px !important;
        }
    }
    @media (max-width: 768px) {
        .article-title {
            font-size: 26px !important;
        }
        .article-meta {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 15px;
        }
        .meta-right {
            margin-left: 0 !important;
        }
        .meta-right a:first-child {
            margin-left: 0 !important;
        }
        .news-article {
            padding: 15px !important;
            border-radius: 8px;
        }
    }
</style>
@endsection
