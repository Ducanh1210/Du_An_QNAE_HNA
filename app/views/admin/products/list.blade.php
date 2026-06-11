@extends('layout.main')

@section('title', 'Quản lý sản phẩm')
@section('breadcrumb', 'Sản phẩm')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h5 class="admin-card-title"><i class="fas fa-utensils me-2" style="color: var(--accent);"></i>Danh sách sản phẩm</h5>
        <a href="{{ BASE_URL }}products/create" class="btn btn-accent"><i class="fas fa-plus me-2"></i>Thêm mới</a>
    </div>

    @if($data && count($data) > 0)
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Thứ tự</th>
                    <th style="text-align: right;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->img_thumbnail)
                            <img src="{{ BASE_URL }}{{ $item->img_thumbnail }}" class="thumb-img" alt="{{ $item->name }}">
                        @else
                            <div class="thumb-img d-flex align-items-center justify-content-center" style="background: var(--bg-hover);">
                                <i class="fas fa-image" style="color: var(--text-muted);"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $item->name }}</strong>
                        @if($item->overview)
                            <br><small style="color: var(--text-muted);">{{ mb_substr($item->overview, 0, 60) }}...</small>
                        @endif
                    </td>
                    <td><span class="badge-status badge-product">{{ $item->category_name ?? 'Chưa phân loại' }}</span></td>
                    <td class="price-text">{{ number_format($item->price, 0, ',', '.') }}đ</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge-status badge-active">Hiển thị</span>
                        @else
                            <span class="badge-status badge-inactive">Ẩn</span>
                        @endif
                    </td>
                    <td>{{ $item->sort_order }}</td>
                    <td style="text-align: right; white-space: nowrap;">
                        <a href="{{ BASE_URL }}products/{{ $item->id }}/edit" class="btn btn-sm-action" title="Sửa">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ BASE_URL }}products/{{ $item->id }}/delete" class="btn btn-sm-action danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-utensils d-block"></i>
        <p>Chưa có sản phẩm nào</p>
        <a href="{{ BASE_URL }}products/create" class="btn btn-accent">Thêm sản phẩm đầu tiên</a>
    </div>
    @endif
</div>
@endsection
