@extends('layout.main')

@section('title', 'Dashboard')
@section('breadcrumb', 'Tổng quan')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon products">
                <i class="fas fa-utensils"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalProducts ?? 0 }}</div>
                <div class="stat-label">Sản phẩm</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon news">
                <i class="fas fa-newspaper"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalNews ?? 0 }}</div>
                <div class="stat-label">Tin tức</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon categories">
                <i class="fas fa-folder-open"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalCategories ?? 0 }}</div>
                <div class="stat-label">Danh mục</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Products -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="fas fa-utensils me-2" style="color: var(--accent);"></i>Sản phẩm mới nhất</h5>
                <a href="{{ BASE_URL }}products" class="btn btn-accent btn-sm">Xem tất cả</a>
            </div>
            @if($recentProducts && count($recentProducts) > 0)
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentProducts as $p)
                        <tr>
                            <td>
                                @if($p->img_thumbnail)
                                    <img src="{{ BASE_URL }}{{ $p->img_thumbnail }}" class="thumb-img" alt="">
                                @else
                                    <div class="thumb-img d-flex align-items-center justify-content-center" style="background: var(--bg-hover);">
                                        <i class="fas fa-image" style="color: var(--text-muted);"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $p->name }}</td>
                            <td class="price-text">{{ number_format($p->price, 0, ',', '.') }}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-utensils d-block"></i>
                    <p>Chưa có sản phẩm nào</p>
                    <a href="{{ BASE_URL }}products/create" class="btn btn-accent btn-sm">Thêm sản phẩm</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Recent News -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="fas fa-newspaper me-2" style="color: var(--info);"></i>Tin tức mới nhất</h5>
                <a href="{{ BASE_URL }}news" class="btn btn-accent btn-sm">Xem tất cả</a>
            </div>
            @if($recentNews && count($recentNews) > 0)
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Ngày</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentNews as $n)
                        <tr>
                            <td>
                                @if($n->img_thumbnail)
                                    <img src="{{ BASE_URL }}{{ $n->img_thumbnail }}" class="thumb-img" alt="">
                                @else
                                    <div class="thumb-img d-flex align-items-center justify-content-center" style="background: var(--bg-hover);">
                                        <i class="fas fa-image" style="color: var(--text-muted);"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ mb_substr($n->title, 0, 40) }}...</td>
                            <td style="font-size: 12px; color: var(--text-muted);">{{ date('d/m/Y', strtotime($n->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-newspaper d-block"></i>
                    <p>Chưa có tin tức nào</p>
                    <a href="{{ BASE_URL }}news/create" class="btn btn-accent btn-sm">Thêm tin tức</a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="admin-card mt-4">
    <h5 class="admin-card-title mb-3"><i class="fas fa-bolt me-2" style="color: var(--warning);"></i>Thao tác nhanh</h5>
    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ BASE_URL }}products/create" class="btn btn-accent"><i class="fas fa-plus me-2"></i>Thêm sản phẩm</a>
        <a href="{{ BASE_URL }}news/create" class="btn btn-accent"><i class="fas fa-plus me-2"></i>Thêm tin tức</a>
        <a href="{{ BASE_URL }}categories" class="btn btn-outline-light btn-sm" style="border-color: var(--border-color); color: var(--text-secondary);"><i class="fas fa-folder me-2"></i>Quản lý danh mục</a>
        <a href="{{ BASE_URL }}settings" class="btn btn-outline-light btn-sm" style="border-color: var(--border-color); color: var(--text-secondary);"><i class="fas fa-link me-2"></i>Cài đặt liên kết</a>
    </div>
</div>
@endsection
