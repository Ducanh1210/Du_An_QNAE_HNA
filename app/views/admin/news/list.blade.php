@extends('layout.main')

@section('title', 'Quản lý tin tức')
@section('breadcrumb', 'Tin tức')

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
        <h5 class="admin-card-title m-0"><i class="fas fa-newspaper me-2" style="color: var(--info);"></i>Danh sách tin tức</h5>
        
        <div class="d-flex align-items-center flex-wrap gap-2">
            <form method="GET" action="{{ BASE_URL }}news" class="d-flex align-items-center gap-2 m-0">
                <div class="search-group">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <input type="text" name="q" value="{{ $search }}" class="search-input" placeholder="Tìm tiêu đề...">
                </div>
                
                <select name="category_id" class="form-select" style="border-color: var(--border-color); width: 185px; padding: 0 30px 0 12px !important; height: 34px !important; font-size: 13.5px !important; border-radius: 8px !important;" onchange="this.form.submit()">
                    <option value="">-- Tất cả danh mục --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                
                <button type="submit" class="btn btn-accent px-2" style="height: 34px !important; font-size: 13px !important; border-radius: 8px !important; padding: 0 12px !important; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-filter"></i></button>
                @if(!empty($search) || !empty($category_id))
                    <a href="{{ BASE_URL }}news" class="btn btn-outline-secondary px-2" style="border-color: var(--border-color); color: var(--text-secondary); height: 34px !important; font-size: 13px !important; border-radius: 8px !important; padding: 0 12px !important; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-sync-alt"></i></a>
                @endif
            </form>
            
            <a href="{{ BASE_URL }}news/create" class="btn btn-accent ms-2" style="height: 34px !important; font-size: 13px !important; border-radius: 8px !important; padding: 0 12px !important; display: inline-flex; align-items: center; justify-content: center;"><i class="fas fa-plus me-1"></i>Thêm mới</a>
        </div>
    </div>

    @if($data && count($data) > 0)
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th style="text-align: right;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->img_thumbnail)
                            <img src="{{ BASE_URL }}{{ $item->img_thumbnail }}" class="thumb-img" alt="">
                        @else
                            <div class="thumb-img d-flex align-items-center justify-content-center" style="background: var(--bg-hover);">
                                <i class="fas fa-image" style="color: var(--text-muted);"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ mb_substr($item->title, 0, 50) }}{{ mb_strlen($item->title) > 50 ? '...' : '' }}</strong>
                        @if($item->overview)
                            <br><small style="color: var(--text-muted);">{{ mb_substr($item->overview, 0, 60) }}...</small>
                        @endif
                    </td>
                    <td><span class="badge-status badge-news">{{ $item->category_name ?? 'Chưa phân loại' }}</span></td>
                    <td>
                        @if($item->is_active)
                            <span class="badge-status badge-active">Hiển thị</span>
                        @else
                            <span class="badge-status badge-inactive">Ẩn</span>
                        @endif
                    </td>
                    <td style="font-size: 12px; color: var(--text-muted);">{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                    <td style="text-align: right; white-space: nowrap;">
                        <a href="{{ BASE_URL }}news/{{ $item->id }}/edit" class="btn btn-sm-action" title="Sửa">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ BASE_URL }}news/{{ $item->id }}/delete" class="btn btn-sm-action danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa tin tức này?')">
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
            <p>Không tìm thấy tin tức nào phù hợp với bộ lọc tìm kiếm.</p>
            <a href="{{ BASE_URL }}news" class="btn btn-accent btn-sm mt-2"><i class="fas fa-sync-alt me-2"></i>Xem tất cả tin tức</a>
        @else
            <p>Chưa có tin tức nào</p>
            <a href="{{ BASE_URL }}news/create" class="btn btn-accent btn-sm mt-2">Thêm tin tức đầu tiên</a>
        @endif
    </div>
    @endif
</div>
@endsection
