@extends('layout.client')

@section('title', $detail->title . ' - Quán Nhậu Anh Em')
@section('meta_description', $detail->overview)

@section('content')
<div class="news-detail-page">
    <div class="container" style="max-width: 1000px; padding: 40px 15px; margin: 0 auto;">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
            <ol class="breadcrumb" style="background: none; padding: 0; font-size: 14px;">
                <li class="breadcrumb-item"><a href="{{ BASE_URL }}" style="color: #666; text-decoration: none;">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ BASE_URL }}tin-tuc" style="color: #666; text-decoration: none;">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #ffa827;">{{ $detail->title }}</li>
            </ol>
        </nav>

        <!-- Article Header -->
        <div class="article-header" style="margin-bottom: 30px;">
            <div class="post-meta" style="color: #ffa827; font-weight: bold; font-size: 14px; margin-bottom: 10px; text-transform: uppercase;">
                {{ $detail->category_name ?? 'Tin tức' }} 
                <span style="color: #999; font-weight: normal; margin-left: 10px;"><i class="far fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($detail->created_at)) }}</span>
            </div>
            <h1 class="article-title" style="font-size: 32px; font-weight: bold; color: #222; line-height: 1.4; margin-bottom: 20px;">
                {{ $detail->title }}
            </h1>
            <div class="article-overview" style="font-size: 16px; color: #555; font-style: italic; border-left: 4px solid #ffa827; padding-left: 15px; margin-bottom: 30px;">
                {{ $detail->overview }}
            </div>
        </div>

        <!-- Article Content -->
        <div class="article-content" style="font-size: 16px; line-height: 1.8; color: #333;">
            {!! $detail->content !!}
        </div>

        <!-- Related News -->
        @if(count($relatedNews) > 0)
        <div class="related-news" style="margin-top: 60px; border-top: 1px solid #eee; padding-top: 40px;">
            <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 30px; border-left: 4px solid #ffa827; padding-left: 15px;">Bài viết liên quan</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
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
                    <div class="related-item" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}" style="display: block; aspect-ratio: 16/9; overflow: hidden;">
                            <img src="{{ $imgUrl }}" alt="{{ $news->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                        <div style="padding: 20px;">
                            <div style="color: #ffa827; font-size: 12px; font-weight: bold; margin-bottom: 10px;">{{ date('d/m/Y', strtotime($news->created_at)) }}</div>
                            <h4 style="font-size: 16px; font-weight: bold; line-height: 1.4; margin: 0;">
                                <a href="{{ BASE_URL }}tin-tuc/{{ $news->slug }}" style="color: #222; text-decoration: none;">{{ $news->title }}</a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Styling specifically for the rich text content */
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }
    .article-content p {
        margin-bottom: 20px;
    }
    .article-content ul, .article-content ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }
    .article-content table {
        width: 100% !important;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .article-content table, .article-content th, .article-content td {
        border: 1px solid #ddd;
    }
    .article-content th, .article-content td {
        padding: 10px;
        text-align: left;
    }
    .related-item:hover {
        transform: translateY(-5px);
    }
    .related-item h4 a:hover {
        color: #ffa827 !important;
    }
</style>
@endsection
