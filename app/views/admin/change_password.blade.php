@extends('layout.main')

@section('title', 'Đổi mật khẩu')
@section('breadcrumb', 'Đổi mật khẩu')

@section('content')
<style>
.password-group {
    display: flex;
    align-items: center;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: #ffffff;
    height: 42px;
    transition: all 0.2s;
}
.password-group:focus-within {
    border-color: var(--accent) !important;
    box-shadow: 0 0 0 3px var(--accent-glow) !important;
}
.password-group .form-control-pass {
    border: none !important;
    background: transparent !important;
    padding: 0 14px !important;
    height: 100% !important;
    font-size: 13.5px !important;
    border-radius: 0px !important;
    box-shadow: none !important;
    outline: none !important;
    width: 100%;
    color: var(--text-primary) !important;
}
.password-group .form-control-pass::placeholder {
    color: var(--text-muted) !important;
}
.password-group .toggle-pass {
    background: transparent;
    border: none;
    padding: 0 14px;
    color: var(--text-muted);
    cursor: pointer;
    font-size: 14px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
    outline: none;
}
.password-group .toggle-pass:hover {
    color: var(--accent);
}
</style>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title">
                    <i class="fas fa-key me-2" style="color:var(--accent);"></i>Đổi mật khẩu tài khoản
                </h5>
            </div>

            <form method="POST" action="{{ BASE_URL }}change-password">
                <div class="mb-3">
                    <label class="form-label">Mật khẩu hiện tại</label>
                    <div class="password-group">
                        <input type="password" name="old_password" class="form-control-pass" required placeholder="Nhập mật khẩu hiện tại">
                        <button type="button" class="toggle-pass"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu mới</label>
                    <div class="password-group">
                        <input type="password" name="new_password" class="form-control-pass" required minlength="6" placeholder="Nhập mật khẩu mới (tối thiểu 6 ký tự)">
                        <button type="button" class="toggle-pass"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Xác nhận mật khẩu mới</label>
                    <div class="password-group">
                        <input type="password" name="confirm_password" class="form-control-pass" required placeholder="Nhập lại mật khẩu mới">
                        <button type="button" class="toggle-pass"><i class="fas fa-eye"></i></button>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid var(--border-color);">
                    <button type="submit" class="btn btn-accent">
                        <i class="fas fa-save me-2"></i>Cập nhật mật khẩu
                    </button>
                    <a href="{{ BASE_URL }}admin" class="btn btn-outline-secondary btn-sm d-flex align-items-center" style="border-color: var(--border-color); color: var(--text-secondary);">
                        Hủy bỏ
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.toggle-pass').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        const icon = this.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});
</script>
@endsection
