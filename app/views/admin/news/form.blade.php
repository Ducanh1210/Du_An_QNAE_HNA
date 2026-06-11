@extends('layout.main')

@section('title', $news ? 'Sửa tin tức' : 'Thêm tin tức')
@section('breadcrumb')
<a href="{{ BASE_URL }}news">Tin tức</a> / {{ $news ? 'Sửa' : 'Thêm mới' }}
@endsection

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h5 class="admin-card-title">
            <i class="fas fa-{{ $news ? 'pen' : 'plus' }} me-2" style="color: var(--info);"></i>
            {{ $news ? 'Sửa tin tức' : 'Thêm tin tức mới' }}
        </h5>
        <a href="{{ BASE_URL }}news" class="btn btn-outline-light btn-sm" style="border-color: var(--border-color); color: var(--text-secondary);">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>

    <form method="POST" enctype="multipart/form-data" 
          action="{{ $news ? BASE_URL . 'news/' . $news->id . '/update' : BASE_URL . 'news/store' }}">
        <div class="row g-3">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Tiêu đề <span style="color: var(--danger);">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" 
                           value="{{ $news ? $news->title : '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tóm tắt</label>
                    <textarea name="overview" class="form-control" rows="3" placeholder="Tóm tắt">{{ $news ? $news->overview : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nội dung chi tiết</label>
                    <textarea name="content" class="form-control" rows="8" placeholder="Nội dung chi tiết">{{ $news ? $news->content : '' }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Danh mục <span style="color: var(--danger);">*</span></label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Chọn danh mục --</option>
                        @if($categories)
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ ($news && $news->category_id == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh đại diện</label>
                    <input type="file" name="img_thumbnail" class="form-control" accept="image/*" id="imgInput">
                    @if($news && $news->img_thumbnail)
                        <div class="mt-2"><img src="{{ BASE_URL }}{{ $news->img_thumbnail }}" id="imgPreview" style="max-width:100%;max-height:200px;border-radius:8px;border:2px solid var(--border-color);"></div>
                    @else
                        <div class="mt-2"><img src="" id="imgPreview" style="max-width:100%;max-height:200px;border-radius:8px;display:none;"></div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ (!$news || $news->is_active) ? 'checked' : '' }} style="background-color:var(--bg-primary);border-color:var(--border-color);">
                        <label class="form-check-label form-label" for="isActive" style="margin-bottom:0;">Hiển thị</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 mt-3 pt-3" style="border-top:1px solid var(--border-color);">
            <button type="submit" class="btn btn-accent"><i class="fas fa-save me-2"></i>{{ $news ? 'Cập nhật' : 'Thêm tin tức' }}</button>
            <a href="{{ BASE_URL }}news" class="btn btn-outline-light" style="border-color:var(--border-color);color:var(--text-secondary);">Hủy</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('imgInput').addEventListener('change', function(e) {
    var p = document.getElementById('imgPreview');
    if (e.target.files && e.target.files[0]) {
        var r = new FileReader();
        r.onload = function(ev) { p.src = ev.target.result; p.style.display = 'block'; };
        r.readAsDataURL(e.target.files[0]);
    }
});
</script>
@endsection
