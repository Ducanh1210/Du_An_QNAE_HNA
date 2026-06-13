@extends('layout.client')

@section('title', $detail->title . ' - Quán Nhậu Anh Em')
@section('meta_description', $detail->overview)

@section('content')
<div class="news-detail-wrapper">
    @php
        $imgUrl = $detail->img_thumbnail;
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

    <!-- HERO HEADER -->
    <div class="article-hero" style="background-image: url('{{ $imgUrl }}');">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-category">{{ $detail->category_name ?? 'Tin tức' }}</div>
            <h1 class="hero-title">{{ $detail->title }}</h1>
            <div class="hero-meta">
                <span><i class="far fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($detail->created_at)) }}</span>
                <span><i class="far fa-clock"></i> {{ date('H:i', strtotime($detail->created_at)) }}</span>
            </div>
        </div>
    </div>

    <div class="article-container">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb" class="article-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ BASE_URL }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ BASE_URL }}tin-tuc">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $detail->title }}</li>
            </ol>
        </nav>

        <div class="article-body">
            <!-- SOCIAL SHARE SIDEBAR (DESKTOP) -->
            <div class="social-sidebar">
                <div class="share-label">Chia sẻ</div>
                <a href="javascript:;" class="share-btn fb"><i class="fab fa-facebook-f"></i></a>
                <a href="javascript:;" class="share-btn tw"><i class="fab fa-twitter"></i></a>
                <a href="javascript:;" class="share-btn link"><i class="fas fa-link"></i></a>
            </div>

            <!-- MAIN CONTENT AREA -->
            <div class="article-main">
                <div class="article-overview">
                    {{ $detail->overview }}
                </div>
                
                <div class="article-rich-text">
                    {!! $detail->content !!}
                </div>
                
                <div class="article-tags">
                    <span class="tag-label"><i class="fas fa-tags"></i> Tags:</span>
                    <a href="javascript:;" class="tag-item">Quán Nhậu Anh Em</a>
                    <a href="javascript:;" class="tag-item">{{ $detail->category_name ?? 'Sự kiện' }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- RELATED NEWS -->
    @if(count($relatedNews) > 0)
    <div class="related-section">
        <div class="container-inner">
            <h3 class="related-title">Bài Viết Khác</h3>
            <div class="related-grid">
                @foreach($relatedNews as $news)
                    @php
                        $rImgUrl = $news->img_thumbnail;
                        if ($rImgUrl) {
                            if (!preg_match('/^(images\/|https?:\/\/)/', $rImgUrl)) {
                                $rImgUrl = BASE_URL . 'storage/uploads/news/' . basename($rImgUrl);
                            } else {
                                $rImgUrl = BASE_URL . $rImgUrl;
                            }
                        } else {
                            $rImgUrl = BASE_URL . 'images/Untitled-3.webp';
                        }
                    @endphp
                    <div class="related-card">
                        <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}" class="card-thumb">
                            <img src="{{ $rImgUrl }}" alt="{{ $news->title }}">
                            <div class="card-cat">{{ $news->category_name ?? 'Tin tức' }}</div>
                        </a>
                        <div class="card-body">
                            <div class="card-date">{{ date('d/m/Y', strtotime($news->created_at)) }}</div>
                            <h4 class="card-title"><a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}">{{ $news->title }}</a></h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    :root {
        --text-dark: #111;
        --text-body: #333;
        --accent: #ffa827;
        --bg-light: #f9f9f9;
        --border-color: #eaeaea;
    }

    .news-detail-wrapper {
        background-color: #fff;
        font-family: 'PlusJaS-Regular', sans-serif;
    }

    /* HERO SECTION */
    .article-hero {
        position: relative;
        width: 100%;
        height: 60vh;
        min-height: 400px;
        max-height: 600px;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: flex-end;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.1) 100%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
        width: 100%;
        padding: 40px 30px;
        color: #fff;
        text-align: center;
    }

    .hero-category {
        display: inline-block;
        background-color: var(--accent);
        color: #fff;
        padding: 6px 16px;
        font-family: 'PlusJaS-Bold', sans-serif;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .hero-title {
        font-family: 'PlusJaS-Bold', sans-serif;
        font-size: 42px;
        line-height: 1.3;
        margin-bottom: 20px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .hero-meta {
        font-size: 14px;
        color: #ddd;
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .hero-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* CONTAINER & LAYOUT */
    .article-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 30px;
        transform: translateY(-40px);
        position: relative;
        z-index: 10;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .article-breadcrumb {
        padding: 20px 30px;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 30px;
    }

    .article-breadcrumb .breadcrumb {
        background: none;
        padding: 0;
        margin: 0;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .article-breadcrumb a {
        color: #888;
        text-decoration: none;
        transition: color 0.2s;
    }

    .article-breadcrumb a:hover {
        color: var(--accent);
    }

    .breadcrumb-item.active {
        color: var(--accent);
        font-weight: 600;
    }

    .article-body {
        display: flex;
        padding: 0 30px 60px 30px;
        gap: 40px;
    }

    /* SOCIAL SIDEBAR */
    .social-sidebar {
        width: 60px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        position: sticky;
        top: 100px;
        height: max-content;
    }

    .share-label {
        font-size: 11px;
        text-transform: uppercase;
        color: #999;
        font-weight: 600;
        margin-bottom: 10px;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        letter-spacing: 2px;
    }

    .share-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-decoration: none;
        font-size: 15px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .share-btn.fb { background: #3b5998; }
    .share-btn.tw { background: #1da1f2; }
    .share-btn.link { background: #666; }

    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        color: #fff;
    }

    /* MAIN CONTENT */
    .article-main {
        flex-grow: 1;
        max-width: 800px;
    }

    .article-overview {
        font-family: 'PlusJaS-Bold', sans-serif;
        font-size: 20px;
        line-height: 1.6;
        color: var(--text-dark);
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 2px solid var(--accent);
    }

    .article-rich-text {
        font-size: 18px;
        line-height: 1.85;
        color: var(--text-body);
    }

    .article-rich-text p {
        margin-bottom: 25px;
    }

    .article-rich-text img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 30px 0;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .article-rich-text h2, .article-rich-text h3 {
        font-family: 'PlusJaS-Bold', sans-serif;
        color: var(--text-dark);
        margin: 40px 0 20px 0;
        line-height: 1.4;
    }

    .article-rich-text blockquote {
        margin: 30px 0;
        padding: 20px 30px;
        border-left: 5px solid var(--accent);
        background: var(--bg-light);
        font-style: italic;
        font-size: 22px;
        color: #555;
    }

    .article-rich-text ul, .article-rich-text ol {
        margin-bottom: 25px;
        padding-left: 20px;
    }

    .article-rich-text li {
        margin-bottom: 10px;
    }

    .article-tags {
        margin-top: 50px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
    }

    .tag-label {
        font-weight: 600;
        color: #555;
        margin-right: 10px;
    }

    .tag-item {
        background: var(--bg-light);
        color: #666;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .tag-item:hover {
        background: var(--accent);
        color: #fff;
    }

    /* RELATED SECTION */
    .related-section {
        background: var(--bg-light);
        padding: 80px 0;
        margin-top: -40px; /* To slide under the floating container */
        padding-top: 120px;
    }

    .container-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .related-title {
        font-family: 'PlusJaS-Bold', sans-serif;
        font-size: 28px;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 40px;
        color: var(--text-dark);
        position: relative;
    }

    .related-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 3px;
        background: var(--accent);
        margin: 15px auto 0;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .related-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .related-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .card-thumb {
        display: block;
        position: relative;
        aspect-ratio: 16/10;
        overflow: hidden;
    }

    .card-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .related-card:hover .card-thumb img {
        transform: scale(1.05);
    }

    .card-cat {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--accent);
        color: #fff;
        padding: 4px 12px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 4px;
        z-index: 2;
    }

    .card-body {
        padding: 25px;
    }

    .card-date {
        font-size: 13px;
        color: #999;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .card-title {
        font-family: 'PlusJaS-Bold', sans-serif;
        font-size: 18px;
        line-height: 1.4;
        margin: 0;
    }

    .card-title a {
        color: var(--text-dark);
        text-decoration: none;
        transition: color 0.2s;
    }

    .card-title a:hover {
        color: var(--accent);
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .hero-title { font-size: 32px; }
        .article-body { flex-direction: column; }
        .social-sidebar { 
            flex-direction: row; 
            width: 100%; 
            position: static; 
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 20px;
        }
        .share-label { writing-mode: horizontal-tb; transform: none; margin: 0 10px 0 0; }
        .related-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 26px; }
        .article-container { transform: translateY(0); border-radius: 0; box-shadow: none; padding: 0 15px; }
        .hero-content { padding: 40px 15px; }
        .article-body { padding: 0 0 40px 0; }
        .article-breadcrumb { padding: 15px 0; }
        .article-overview { font-size: 17px; }
        .article-rich-text { font-size: 16px; }
        .related-grid { grid-template-columns: 1fr; }
        .related-section { margin-top: 0; padding-top: 60px; }
        .article-hero { height: 50vh; min-height: 300px; background-attachment: scroll; }
    }
</style>
@endsection
