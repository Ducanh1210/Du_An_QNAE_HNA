@extends('layout.main')

@php
    $pageTitle = $type == 'news' ? 'Danh mục tin tức' : 'Danh mục sản phẩm';
@endphp

@section('title', 'Quản lý ' . mb_strtolower($pageTitle, 'UTF-8'))
@section('breadcrumb', $pageTitle)

@section('content')
<div class="row g-4">
    <!-- Add Form -->
    <div class="col-lg-4">
        <div class="admin-card">
            <h5 class="admin-card-title mb-3"><i class="fas fa-plus me-2" style="color:var(--success);"></i>Thêm danh mục</h5>
            <form method="POST" action="{{ BASE_URL }}categories/store">
                <input type="hidden" name="type" value="{{ $type }}">
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên" required>
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" name="sort_order" value="1" class="form-check-input" id="checkHomeAdd">
                    <label class="form-check-label" for="checkHomeAdd" style="cursor:pointer;">
                        <i class="fas fa-star text-warning me-1"></i> Hiển thị ở trang chủ
                    </label>
                </div>
                <button type="submit" class="btn btn-accent w-100"><i class="fas fa-plus me-2"></i>Thêm</button>
            </form>
        </div>
    </div>

    <!-- Lists -->
    <div class="col-lg-8">
        <div class="admin-card">
            <h5 class="admin-card-title mb-3">
                @if($type == 'product')
                    <i class="fas fa-box me-2" style="color:var(--accent);"></i>Danh mục sản phẩm
                @else
                    <i class="fas fa-newspaper me-2" style="color:var(--info);"></i>Danh mục tin tức
                @endif
            </h5>
            @if(count($data) > 0)
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th style="text-align:center;">Trang chủ</th>
                            <th style="text-align:right;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $item)
                        <tr id="row-{{ $item->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <form method="POST" action="{{ BASE_URL }}categories/{{ $item->id }}/update" class="d-inline-flex gap-2 align-items-center" style="width:100%;">
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control form-control-sm" style="max-width:200px;">
                                    <input type="hidden" name="type" value="{{ $item->type }}">
                                    <input type="hidden" name="sort_order" value="{{ $item->sort_order }}">
                                    <button type="submit" class="btn btn-sm-action" title="Lưu tên"><i class="fas fa-check"></i></button>
                                </form>
                            </td>
                            <td style="font-size:12px;color:var(--text-muted);">{{ $item->slug }}</td>
                            <td style="text-align:center;">
                                <form method="POST" action="{{ BASE_URL }}categories/{{ $item->id }}/update" class="d-inline-block m-0">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="type" value="{{ $item->type }}">
                                    <label style="cursor:pointer;" title="Click để thay đổi hiển thị trang chủ">
                                        <input type="checkbox" name="sort_order" value="1" class="d-none" {{ $item->sort_order == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                        <i class="fa-star {{ $item->sort_order == 1 ? 'fas text-warning' : 'far text-muted' }}" style="font-size:18px;"></i>
                                    </label>
                                </form>
                            </td>
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
            <div class="empty-state py-3">
                <p class="mb-0 text-muted">Chưa có danh mục nào</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
