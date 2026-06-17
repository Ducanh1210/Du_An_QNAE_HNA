@extends('layout.main')

@section('title', 'Quản lý sản phẩm')
@section('breadcrumb', 'Sản phẩm')

@section('content')
<style>
.search-group {
    display: flex;
    align-items: center;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: #ffffff;
    height: 34px;
    width: 180px;
    transition: all 0.2s;
}
.search-group:focus-within {
    border-color: var(--accent) !important;
    box-shadow: 0 0 0 3px var(--accent-glow) !important;
}
.search-group .search-icon {
    padding: 0 10px;
    color: var(--text-muted);
    font-size: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.search-group .search-input {
    border: none !important;
    background: transparent !important;
    padding: 0 12px 0 0 !important;
    height: 100% !important;
    font-size: 13.5px !important;
    border-radius: 0px !important;
    box-shadow: none !important;
    outline: none !important;
    width: 100%;
    color: var(--text-primary) !important;
}
.search-group .search-input::placeholder {
    color: var(--text-muted) !important;
}
</style>

<div class="admin-card">
    <div class="admin-card-header mb-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <h5 class="admin-card-title m-0"><i class="fas fa-utensils me-2" style="color: var(--accent);"></i>Danh sách sản phẩm</h5>
        
        <div class="d-flex align-items-center flex-wrap gap-2">
            <form method="GET" action="{{ BASE_URL }}products" class="d-flex align-items-center gap-2 m-0">
                <div class="search-group">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <input type="text" name="q" value="{{ $search }}" class="search-input" placeholder="Tìm tên...">
                </div>
                
                <select name="category_id" class="form-select" style="border-color: var(--border-color); width: 185px; padding: 0 30px 0 12px !important; height: 34px !important; font-size: 13.5px !important; border-radius: 8px !important;" onchange="this.form.submit()">
                    <option value="">-- Tất cả danh mục --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                
                <button type="submit" class="btn btn-accent px-2" style="height: 34px !important; font-size: 13px !important; border-radius: 8px !important; padding: 0 12px !important; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-filter"></i></button>
                @if(!empty($search) || !empty($category_id))
                    <a href="{{ BASE_URL }}products" class="btn btn-outline-secondary px-2" style="border-color: var(--border-color); color: var(--text-secondary); height: 34px !important; font-size: 13px !important; border-radius: 8px !important; padding: 0 12px !important; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-sync-alt"></i></a>
                @endif
            </form>
            
            <a href="{{ BASE_URL }}products/create" class="btn btn-accent ms-2" style="height: 34px !important; font-size: 13px !important; border-radius: 8px !important; padding: 0 12px !important; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-plus me-1"></i>Thêm mới</a>
        </div>
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
                    <th style="text-align: right;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div class="d-flex gap-1 align-items-center">
                            <div>
                                @if($item->img_thumbnail)
                                    <img src="{{ BASE_URL }}{{ $item->img_thumbnail }}" class="thumb-img" alt="{{ $item->name }}" title="Ảnh đại diện" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border-color);">
                                @else
                                    <div class="d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: var(--bg-hover); border-radius: 4px; border: 1px solid var(--border-color);" title="Không có ảnh đại diện">
                                        <i class="fas fa-image" style="color: var(--text-muted); font-size: 12px;"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                @if($item->img_transparent)
                                    <img src="{{ BASE_URL }}{{ $item->img_transparent }}" class="thumb-img" alt="{{ $item->name }}" title="Ảnh tách nền" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border-color); background: #e9e9e9;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: var(--bg-hover); border-radius: 4px; border: 1px solid var(--border-color);" title="Không có ảnh tách nền">
                                        <i class="fas fa-image" style="color: var(--text-muted); font-size: 12px; opacity: 0.5;"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong>{{ $item->name }}</strong>
                        @if(!empty($item->video_url))
                            <span class="badge bg-success ms-1" style="font-size: 10px; padding: 2px 6px; background-color: #28a745 !important; border-radius: 4px;"><i class="fas fa-video me-1"></i>Video</span>
                        @endif
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
    <div class="empty-state py-5">
        <i class="fas fa-search d-block mb-3" style="font-size: 40px; opacity: 0.3;"></i>
        @if(!empty($search) || !empty($category_id))
            <p>Không tìm thấy sản phẩm nào phù hợp với bộ lọc tìm kiếm.</p>
            <a href="{{ BASE_URL }}products" class="btn btn-accent btn-sm mt-2"><i class="fas fa-sync-alt me-2"></i>Xem tất cả sản phẩm</a>
        @else
            <p>Chưa có sản phẩm nào</p>
            <a href="{{ BASE_URL }}products/create" class="btn btn-accent btn-sm mt-2">Thêm sản phẩm đầu tiên</a>
        @endif
    </div>
    @endif
</div>
@endsection
