@extends('layout.main')

@section('title', $product ? 'Sửa sản phẩm' : 'Thêm sản phẩm')
@section('breadcrumb')
<a href="{{ BASE_URL }}products">Sản phẩm</a> / {{ $product ? 'Sửa' : 'Thêm mới' }}
@endsection

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h5 class="admin-card-title">
            <i class="fas fa-{{ $product ? 'pen' : 'plus' }} me-2" style="color: var(--accent);"></i>
            {{ $product ? 'Sửa sản phẩm: ' . $product->name : 'Thêm sản phẩm mới' }}
        </h5>
        <a href="{{ BASE_URL }}products" class="btn btn-outline-light btn-sm" style="border-color: var(--border-color); color: var(--text-secondary);">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>

    <form method="POST" enctype="multipart/form-data" 
          action="{{ $product ? BASE_URL . 'products/' . $product->id . '/update' : BASE_URL . 'products/store' }}">
        <div class="row g-3">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm <span style="color: var(--danger);">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" 
                           value="{{ $product ? $product->name : '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn</label>
                    <textarea name="overview" class="form-control" rows="3" placeholder="Mô tả ngắn về sản phẩm">{{ $product ? $product->overview : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nội dung chi tiết</label>
                    <textarea name="content" class="form-control" rows="6" placeholder="Nội dung chi tiết sản phẩm">{{ $product ? $product->content : '' }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Danh mục <span style="color: var(--danger);">*</span></label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Chọn danh mục --</option>
                        @if($categories)
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ ($product && $product->category_id == $cat->id) ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá (VNĐ)</label>
                    <input type="number" name="price" class="form-control" placeholder="0" min="0"
                           value="{{ $product ? $product->price : 0 }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh đại diện</label>
                    <input type="file" name="img_thumbnail" class="form-control" accept="image/*" id="imgInput">
                    @if($product && $product->img_thumbnail)
                        <div class="mt-2">
                            <img src="{{ BASE_URL }}{{ $product->img_thumbnail }}" id="imgPreview" 
                                 style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color);">
                        </div>
                    @else
                        <div class="mt-2">
                            <img src="" id="imgPreview" style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); display: none;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh tách nền (Hiện ở trang chủ)</label>
                    <input type="file" name="img_transparent" class="form-control" accept="image/*" id="imgTransparentInput">
                    @if($product && $product->img_transparent)
                        <div class="mt-2">
                            <img src="{{ BASE_URL }}{{ $product->img_transparent }}" id="imgTransparentPreview" 
                                 style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); background: #e9e9e9;">
                        </div>
                    @else
                        <div class="mt-2">
                            <img src="" id="imgTransparentPreview" style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); background: #e9e9e9; display: none;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Video sản phẩm (Chạy ở popup chi tiết)</label>
                    <input type="file" name="video_url" class="form-control" accept="video/*" id="videoInput">
                    @if($product && $product->video_url)
                        <div class="mt-2">
                            <video src="{{ BASE_URL }}{{ $product->video_url }}" id="videoPreview" 
                                   controls muted autoplay loop
                                   style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); display: block;">
                            </video>
                        </div>
                    @else
                        <div class="mt-2">
                            <video src="" id="videoPreview" controls muted autoplay loop style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); display: none;"></video>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="isActive" 
                               {{ (!$product || $product->is_active) ? 'checked' : '' }}
                               style="background-color: var(--bg-primary); border-color: var(--border-color);">
                        <label class="form-check-label form-label" for="isActive" style="margin-bottom: 0;">Hiển thị</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 mt-3 pt-3" style="border-top: 1px solid var(--border-color);">
            <button type="submit" class="btn btn-accent">
                <i class="fas fa-save me-2"></i>{{ $product ? 'Cập nhật' : 'Thêm sản phẩm' }}
            </button>
            <a href="{{ BASE_URL }}products" class="btn btn-outline-light" style="border-color: var(--border-color); color: var(--text-secondary);">Hủy</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('imgInput').addEventListener('change', function(e) {
        var preview = document.getElementById('imgPreview');
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    document.getElementById('imgTransparentInput').addEventListener('change', function(e) {
        var preview = document.getElementById('imgTransparentPreview');
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    document.getElementById('videoInput').addEventListener('change', function(e) {
        var preview = document.getElementById('videoPreview');
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endsection
