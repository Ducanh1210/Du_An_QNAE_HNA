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
                            <th style="text-align:center;">Số lượng</th>
                            <th style="text-align:center;">Trang chủ</th>
                            <th style="text-align:right;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-categories">
                        @foreach($data as $index => $item)
                        <tr data-id="{{ $item->id }}">
                            <td>
                                <i class="fas fa-grip-vertical drag-handle me-2" style="cursor: grab; color: var(--text-muted); padding: 5px;"></i>
                                <span class="row-number">{{ $index + 1 }}</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ BASE_URL }}categories/{{ $item->id }}/update" class="d-inline-flex gap-2 align-items-center" style="width:100%;">
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control form-control-sm" style="max-width:200px;">
                                    <input type="hidden" name="type" value="{{ $item->type }}">
                                    <input type="hidden" name="sort_order" value="{{ $item->sort_order }}">
                                    <button type="submit" class="btn btn-sm-action" title="Lưu tên"><i class="fas fa-check"></i></button>
                                </form>
                            </td>
                            <td style="font-size:12px;color:var(--text-muted);">{{ $item->slug }}</td>
                            <td style="text-align:center;font-weight:600;">
                                @if($type == 'product')
                                    {{ $item->product_count ?? 0 }}
                                @else
                                    {{ $item->news_count ?? 0 }}
                                @endif
                            </td>
                            <td style="text-align:center;">
                                <form method="POST" action="{{ BASE_URL }}categories/{{ $item->id }}/update" class="d-inline-block m-0">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="type" value="{{ $item->type }}">
                                    <input type="hidden" name="toggle_home" value="1">
                                    <label style="cursor:pointer;" title="Click để thay đổi hiển thị trang chủ">
                                        <input type="checkbox" name="show_home" value="1" class="d-none" {{ $item->show_home == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                        <i class="fa-star {{ $item->show_home == 1 ? 'fas text-warning' : 'far text-muted' }}" style="font-size:18px;"></i>
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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('sortable-categories');
    if (el) {
        Sortable.create(el, {
            handle: '.drag-handle',
            animation: 150,
            ghostClass: 'bg-light',
            onEnd: function() {
                // Get all row IDs in their new order
                const rows = el.querySelectorAll('tr');
                const order = Array.from(rows).map(row => row.getAttribute('data-id'));
                
                // Update numbering in UI
                rows.forEach((row, index) => {
                    row.querySelector('.row-number').innerText = index + 1;
                });
                
                // Send AJAX request to update sort_order in database
                fetch('{{ BASE_URL }}categories/reorder', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ order: order })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, 'success');
                    } else {
                        showToast(data.message || 'Có lỗi xảy ra', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Không thể kết nối đến máy chủ', 'error');
                });
            }
        });
    }

    function showToast(message, type) {
        const existingToast = document.querySelector('.alert-admin-toast');
        if (existingToast) existingToast.remove();

        const toast = document.createElement('div');
        toast.className = `alert-admin alert-admin-toast ${type} show`;
        toast.style.position = 'fixed';
        toast.style.top = '24px';
        toast.style.right = '24px';
        toast.style.zIndex = '9999';
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
        
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        toast.innerHTML = `<i class="fas ${icon} me-2"></i><span>${message}</span>`;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.remove('show');
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 400);
        }, 3000);
    }
});
</script>
@endsection
