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
                <div class="mb-3">
                    <label class="form-label">Thư viện ảnh sản phẩm (Nhiều ảnh)</label>
                    <input type="file" name="product_images[]" class="form-control mb-2" accept="image/*" multiple id="albumInput">
                    <small class="text-muted d-block mb-2">Chọn một hoặc nhiều hình ảnh cùng lúc.</small>
                    <div class="row g-2 mt-2" id="albumPreviewContainer">
                        @if($product && !empty($product->images))
                            @php
                                $album = json_decode($product->images, true);
                            @endphp
                            @if(is_array($album) && count($album) > 0)
                                @foreach($album as $imgPath)
                                    <div class="col-3 position-relative album-item mb-2">
                                        <img src="{{ BASE_URL }}{{ $imgPath }}" class="img-thumbnail" style="width: 100%; height: 110px; object-fit: cover; border-radius: 6px;">
                                        <input type="hidden" name="existing_images[]" value="{{ $imgPath }}">
                                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-album-btn" style="padding: 2px 6px; font-size: 10px; border-radius: 4px; border: none;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div>
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
                    <label class="form-label">Ảnh sản phẩm (Tách nền PNG)</label>
                    <div class="input-group {{ ($product && $product->img_transparent) ? 'has-clear' : '' }}">
                        <input type="file" name="img_transparent" class="form-control" accept="image/*" id="imgTransparentInput">
                        <button type="button" class="btn btn-outline-danger" id="clearImgTransparentBtn" style="{{ ($product && $product->img_transparent) ? '' : 'display: none;' }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <input type="hidden" name="delete_img_transparent" id="deleteImgTransparent" value="0">
                    <div class="mt-2" id="imgTransparentPreviewContainer" style="{{ ($product && $product->img_transparent) ? '' : 'display: none;' }}">
                        <img src="{{ $product && $product->img_transparent ? BASE_URL . $product->img_transparent : '' }}" id="imgTransparentPreview" 
                             style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); background: #fbf0d9; object-fit: contain;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Video sản phẩm (Chạy ở popup chi tiết)</label>
                    <div class="input-group {{ ($product && $product->video_url) ? 'has-clear' : '' }}">
                        <input type="file" name="video_url" class="form-control" accept="video/*" id="videoInput">
                        <button type="button" class="btn btn-outline-danger" id="clearVideoBtn" style="{{ ($product && $product->video_url) ? '' : 'display: none;' }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <input type="hidden" name="delete_video_url" id="deleteVideoUrl" value="0">
                    <div class="mt-2" id="videoPreviewContainer" style="{{ ($product && $product->video_url) ? '' : 'display: none;' }}">
                        <video src="{{ $product && $product->video_url ? BASE_URL . $product->video_url : '' }}" id="videoPreview" 
                               controls muted autoplay loop
                               style="max-width: 100%; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color); display: block;">
                        </video>
                    </div>
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
    // Helper function to setup file input preview and delete action
    function setupFileField(inputId, previewContainerId, previewId, clearBtnId, deleteHiddenId, isVideo = false) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(previewContainerId);
        const preview = document.getElementById(previewId);
        const clearBtn = document.getElementById(clearBtnId);
        const deleteHidden = document.getElementById(deleteHiddenId);
        const inputGroup = input.closest('.input-group');

        input.addEventListener('change', function(e) {
            deleteHidden.value = '0';
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    preview.src = ev.target.result;
                    container.style.display = 'block';
                    preview.style.display = 'block';
                    clearBtn.style.display = 'block';
                    if (inputGroup) inputGroup.classList.add('has-clear');
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        clearBtn.addEventListener('click', function() {
            deleteHidden.value = '1';
            input.value = '';
            container.style.display = 'none';
            preview.src = '';
            if (isVideo) {
                preview.removeAttribute('src');
                preview.load();
            }
            clearBtn.style.display = 'none';
            if (inputGroup) inputGroup.classList.remove('has-clear');
        });
    }


    setupFileField('imgTransparentInput', 'imgTransparentPreviewContainer', 'imgTransparentPreview', 'clearImgTransparentBtn', 'deleteImgTransparent');
    setupFileField('videoInput', 'videoPreviewContainer', 'videoPreview', 'clearVideoBtn', 'deleteVideoUrl', true);

    // Handle new album images preview
    document.getElementById('albumInput').addEventListener('change', function(e) {
        var container = document.getElementById('albumPreviewContainer');
        
        // Remove previous temp previews
        var tempPreviews = container.querySelectorAll('.temp-preview');
        tempPreviews.forEach(el => el.remove());
        
        if (e.target.files) {
            Array.from(e.target.files).forEach(file => {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    var col = document.createElement('div');
                    col.className = 'col-3 position-relative temp-preview mb-2';
                    col.innerHTML = `
                        <img src="${ev.target.result}" class="img-thumbnail" style="width: 100%; height: 110px; object-fit: cover; border-radius: 6px; border: 2px dashed #FFA827;">
                        <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-1" style="font-size: 9px; padding: 2px 4px;">Mới</span>
                    `;
                    container.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        }
    });

    // Delete existing images handler
    document.getElementById('albumPreviewContainer').addEventListener('click', function(e) {
        var btn = e.target.closest('.remove-album-btn');
        if (btn) {
            e.preventDefault();
            var item = btn.closest('.album-item');
            if (item) {
                item.remove();
            }
        }
    });
</script>
@endsection
