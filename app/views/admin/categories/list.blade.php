@extends('layout.main')

@section('title', 'Quản lý danh mục')
@section('breadcrumb', 'Danh mục')

@section('content')
<div class="row g-4">
    <!-- Add Form -->
    <div class="col-lg-4">
        <div class="admin-card">
            <h5 class="admin-card-title mb-3"><i class="fas fa-plus me-2" style="color:var(--success);"></i>Thêm danh mục</h5>
            <form method="POST" action="{{ BASE_URL }}categories/store">
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Loại</label>
                    <select name="type" class="form-select">
                        <option value="product">Sản phẩm</option>
                        <option value="news">Tin tức</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Thứ tự</label>
                    <input type="number" name="sort_order" class="form-control" value="0" min="0">
                </div>
                <button type="submit" class="btn btn-accent w-100"><i class="fas fa-plus me-2"></i>Thêm</button>
            </form>
        </div>
    </div>

    <!-- List -->
    <div class="col-lg-8">
        <div class="admin-card">
            <h5 class="admin-card-title mb-3"><i class="fas fa-folder-open me-2" style="color:var(--accent);"></i>Danh sách danh mục</h5>
            @if($data && count($data) > 0)
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Loại</th>
                            <th>Slug</th>
                            <th>Thứ tự</th>
                            <th style="text-align:right;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $item)
                        <tr id="row-{{ $item->id }}">
                            <td>{{ $i + 1 }}</td>
                            <td>
                                <form method="POST" action="{{ BASE_URL }}categories/{{ $item->id }}/update" class="d-inline-flex gap-2 align-items-center" style="width:100%;">
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control form-control-sm" style="max-width:150px;">
                                    <input type="hidden" name="type" value="{{ $item->type }}">
                                    <input type="number" name="sort_order" value="{{ $item->sort_order }}" class="form-control form-control-sm" style="max-width:60px;" min="0">
                                    <button type="submit" class="btn btn-sm-action" title="Lưu"><i class="fas fa-check"></i></button>
                                </form>
                            </td>
                            <td>
                                @if($item->type == 'product')
                                    <span class="badge-status badge-product">Sản phẩm</span>
                                @else
                                    <span class="badge-status badge-news">Tin tức</span>
                                @endif
                            </td>
                            <td style="font-size:12px;color:var(--text-muted);">{{ $item->slug }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td style="text-align:right;">
                                <a href="{{ BASE_URL }}categories/{{ $item->id }}/delete" class="btn btn-sm-action danger" onclick="return confirm('Xóa danh mục này?')">
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
                <i class="fas fa-folder-open d-block"></i>
                <p>Chưa có danh mục nào</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
