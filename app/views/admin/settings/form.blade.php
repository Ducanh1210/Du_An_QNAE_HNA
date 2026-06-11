@extends('layout.main')

@section('title', 'Cài đặt liên kết')
@section('breadcrumb', 'Cài đặt')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h5 class="admin-card-title"><i class="fas fa-link me-2" style="color:var(--accent);"></i>Cài đặt đường dẫn & Liên kết</h5>
    </div>

    <form method="POST" action="{{ BASE_URL }}settings/update">
        <div class="row g-4">
            <!-- Social Links -->
            <div class="col-lg-6">
                <h6 style="color:var(--text-secondary);font-weight:700;margin-bottom:16px;">
                    <i class="fas fa-share-alt me-2" style="color:var(--info);"></i>Mạng xã hội
                </h6>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-comment-dots me-1" style="color:#0068FF;"></i> Link Zalo</label>
                    <input type="text" name="zalo_link" class="form-control" placeholder="https://zalo.me/..." value="{{ $data['zalo_link'] ?? '' }}">
                    <small style="color:var(--text-muted);">Link Zalo OA hoặc Zalo cá nhân</small>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fab fa-facebook me-1" style="color:#1877F2;"></i> Link Facebook</label>
                    <input type="text" name="facebook_link" class="form-control" placeholder="https://facebook.com/..." value="{{ $data['facebook_link'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fab fa-tiktok me-1"></i> Link TikTok</label>
                    <input type="text" name="tiktok_link" class="form-control" placeholder="https://tiktok.com/@..." value="{{ $data['tiktok_link'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fab fa-instagram me-1" style="color:#E4405F;"></i> Link Instagram</label>
                    <input type="text" name="instagram_link" class="form-control" placeholder="https://instagram.com/..." value="{{ $data['instagram_link'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fab fa-youtube me-1" style="color:#FF0000;"></i> Link YouTube</label>
                    <input type="text" name="youtube_link" class="form-control" placeholder="https://youtube.com/@..." value="{{ $data['youtube_link'] ?? '' }}">
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6">
                <h6 style="color:var(--text-secondary);font-weight:700;margin-bottom:16px;">
                    <i class="fas fa-phone-alt me-2" style="color:var(--success);"></i>Thông tin liên hệ
                </h6>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-concierge-bell me-1"></i> SĐT Đặt bàn</label>
                    <input type="text" name="phone_datban" class="form-control" placeholder="0812282282" value="{{ $data['phone_datban'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-shipping-fast me-1"></i> SĐT Đặt ship</label>
                    <input type="text" name="phone_datship" class="form-control" placeholder="0835129999" value="{{ $data['phone_datship'] ?? '' }}">
                </div>

                <h6 style="color:var(--text-secondary);font-weight:700;margin-bottom:16px;margin-top:28px;">
                    <i class="fas fa-robot me-2" style="color:var(--warning);"></i>Zalo OA (Gửi form đặt bàn)
                </h6>
                <div class="mb-3">
                    <label class="form-label">Zalo OA ID</label>
                    <input type="text" name="zalo_oa_id" class="form-control" placeholder="VD: 4318012345678" value="{{ $data['zalo_oa_id'] ?? '' }}">
                    <small style="color:var(--text-muted);">ID của trang Zalo OA doanh nghiệp. Khi khách đặt bàn/ship sẽ mở Zalo chat với OA này kèm nội dung đơn.</small>
                </div>

                <div class="mt-4 p-3" style="background:var(--bg-hover);border-radius:10px;border:1px solid var(--border-color);">
                    <h6 style="font-size:13px;font-weight:700;color:var(--accent);margin-bottom:8px;">
                        <i class="fas fa-info-circle me-1"></i> Hướng dẫn tìm Zalo OA ID
                    </h6>
                    <ol style="font-size:12px;color:var(--text-muted);padding-left:16px;margin:0;">
                        <li>Mở Zalo &gt; Tìm trang doanh nghiệp của bạn</li>
                        <li>Copy link trang: <code style="color:var(--accent);">https://zalo.me/431801xxxx</code></li>
                        <li>Số sau <code>zalo.me/</code> chính là OA ID</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid var(--border-color);">
            <button type="submit" class="btn btn-accent"><i class="fas fa-save me-2"></i>Lưu cài đặt</button>
        </div>
    </form>
</div>

<div class="admin-card mt-3">
    <h6 style="color:var(--text-secondary);font-weight:700;margin-bottom:12px;">
        <i class="fas fa-eye me-2" style="color:var(--info);"></i>Xem trước icon contact trên website
    </h6>
    <p style="font-size:13px;color:var(--text-muted);">
        Sau khi lưu cài đặt, các link sẽ được cập nhật vào file <code>gdquannhau/data/settings.json</code>. 
        Frontend sẽ tự động đọc file này để cập nhật đường dẫn các icon contact (Zalo, Facebook, TikTok...) 
        trên tất cả trang web.
    </p>
</div>
@endsection
