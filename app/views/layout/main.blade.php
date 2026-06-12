<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Quán Nhậu Anh Em</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #f7f4f0;
            --bg-secondary: #4a2b12;
            --bg-card: #ffffff;
            --bg-hover: #faf6f1;
            --accent: #ffa827;
            --accent-hover: #e5941c;
            --accent-glow: rgba(255, 168, 39, 0.15);
            --text-primary: #2d1a0e;
            --text-secondary: #5c4033;
            --text-muted: #9b8a7a;
            --border-color: #e8ddd0;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --sidebar-width: 260px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            margin: 0;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--bg-secondary);
            border-right: none;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            box-shadow: 4px 0 20px rgba(74, 43, 18, 0.15);
        }

        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--accent), #e5941c);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(255, 168, 39, 0.3);
        }

        .sidebar-brand-text {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
        }

        .sidebar-brand-text small {
            display: block;
            font-size: 11px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.5);
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 12px 0;
        }

        .sidebar-label {
            padding: 10px 20px 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.35);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            margin: 1px 0;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            border-left-color: var(--accent);
        }

        .sidebar-link.active {
            color: var(--accent);
            background: rgba(255, 168, 39, 0.12);
            border-left-color: var(--accent);
            font-weight: 600;
        }

        .sidebar-link i {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        /* ===== SIDEBAR DROPDOWN ===== */
        .sidebar-submenu {
            display: none;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            margin: 4px 10px 4px 20px;
            overflow: hidden;
        }

        .sidebar-submenu.show {
            display: block;
        }

        .sidebar-submenu .sidebar-link {
            padding-left: 20px;
            font-size: 13px;
            opacity: 0.85;
            margin: 0;
            border-left: none;
            border-radius: 0;
        }

        .sidebar-submenu .sidebar-link:hover,
        .sidebar-submenu .sidebar-link.active {
            opacity: 1;
            background: rgba(255, 255, 255, 0.05);
            border-left: none;
        }

        .sidebar-link.has-submenu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .sidebar-link.has-submenu .left-part {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-link.has-submenu i.chevron {
            font-size: 11px;
            transition: transform 0.2s ease;
            width: auto;
            margin-right: 5px;
        }

        /* ===== MAIN CONTENT ===== */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-topbar {
            padding: 16px 28px;
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .topbar-breadcrumb {
            font-size: 12px;
            color: var(--text-muted);
        }

        .topbar-breadcrumb a {
            color: var(--text-secondary);
            text-decoration: none;
        }

        .topbar-breadcrumb a:hover {
            color: var(--accent);
        }

        .admin-content {
            flex: 1;
            padding: 24px 28px;
        }

        /* ===== CARDS ===== */
        .admin-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        }

        .admin-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .admin-card-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        }

        .stat-card:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px var(--accent-glow);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-icon.products { background: rgba(255, 168, 39, 0.12); color: var(--accent); }
        .stat-icon.news { background: rgba(59, 130, 246, 0.1); color: var(--info); }
        .stat-icon.categories { background: rgba(34, 197, 94, 0.1); color: var(--success); }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            color: var(--text-primary);
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ===== TABLE ===== */
        .admin-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .admin-table thead th {
            background: var(--bg-hover);
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            border: none;
            white-space: nowrap;
        }

        .admin-table thead th:first-child { border-radius: 8px 0 0 8px; }
        .admin-table thead th:last-child { border-radius: 0 8px 8px 0; }

        .admin-table tbody td {
            padding: 14px 16px;
            font-size: 13.5px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            color: var(--text-primary);
        }

        .admin-table tbody tr:hover {
            background: var(--bg-hover);
        }

        .admin-table .thumb-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        /* ===== BUTTONS ===== */
        .btn-accent {
            background: linear-gradient(135deg, var(--accent), #e5941c);
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(255, 168, 39, 0.25);
        }

        .btn-accent:hover {
            background: linear-gradient(135deg, #e5941c, var(--accent));
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(255, 168, 39, 0.35);
        }

        .btn-sm-action {
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            transition: all 0.2s;
        }

        .btn-sm-action:hover { border-color: var(--accent); color: var(--accent); background: rgba(255, 168, 39, 0.05); }
        .btn-sm-action.danger:hover { border-color: var(--danger); color: var(--danger); background: rgba(239, 68, 68, 0.05); }

        /* ===== FORMS ===== */
        .form-control, .form-select {
            background: #ffffff !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
            border-radius: 8px !important;
            padding: 10px 14px !important;
            font-size: 13.5px !important;
            transition: border-color 0.2s !important;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 3px var(--accent-glow) !important;
        }

        .form-control::placeholder {
            color: var(--text-muted) !important;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
        }

        .form-select option {
            background: #ffffff;
            color: var(--text-primary);
        }

        /* ===== BADGE ===== */
        .badge-status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-active { background: rgba(34, 197, 94, 0.1); color: var(--success); }
        .badge-inactive { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
        .badge-product { background: rgba(255, 168, 39, 0.12); color: #c47f00; }
        .badge-news { background: rgba(59, 130, 246, 0.1); color: var(--info); }

        /* ===== ALERT ===== */
        .alert-admin {
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 13px;
            border: none;
        }

        .alert-admin.success {
            background: rgba(34, 197, 94, 0.08);
            color: #16a34a;
            border-left: 4px solid var(--success);
        }

        .alert-admin.error {
            background: rgba(239, 68, 68, 0.08);
            color: #dc2626;
            border-left: 4px solid var(--danger);
        }

        /* ===== PRICE FORMAT ===== */
        .price-text {
            color: #c47f00;
            font-weight: 700;
        }

        /* ===== MOBILE TOGGLE ===== */
        .sidebar-toggle {
            display: none;
            background: #ffffff;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
        }

        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: inline-block;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.4);
                z-index: 999;
            }

            .sidebar-overlay.show {
                display: block;
            }
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.3;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">AE</div>
            <div class="sidebar-brand-text">
                Quán Nhậu Anh Em
                <small>Admin Panel</small>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-label">Tổng quan</div>
            <a href="{{ BASE_URL }}admin" class="sidebar-link {{ request_uri() == '/admin' ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>

            <div class="sidebar-label">Quản lý nội dung</div>
            <a href="{{ BASE_URL }}products" class="sidebar-link {{ str_contains(request_uri(), 'product') ? 'active' : '' }}">
                <i class="fas fa-utensils"></i> Sản phẩm
            </a>
            <a href="{{ BASE_URL }}news" class="sidebar-link {{ str_contains(request_uri(), 'news') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Tin tức
            </a>
            @php
                $isCategoryMenu = str_contains(request_uri(), 'categories');
                $isProductCat = isset($_GET['type']) && $_GET['type'] == 'product' || ($isCategoryMenu && !isset($_GET['type']));
                $isNewsCat = isset($_GET['type']) && $_GET['type'] == 'news';
            @endphp
            <div class="sidebar-dropdown">
                <div class="sidebar-link has-submenu {{ $isCategoryMenu ? 'active' : '' }}" onclick="this.nextElementSibling.classList.toggle('show'); let icon = this.querySelector('.chevron'); icon.classList.toggle('fa-chevron-down'); icon.classList.toggle('fa-chevron-up');">
                    <div class="left-part">
                        <i class="fas fa-folder-open"></i> Danh mục
                    </div>
                    <i class="fas chevron {{ $isCategoryMenu ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                </div>
                <div class="sidebar-submenu {{ $isCategoryMenu ? 'show' : '' }}">
                    <a href="{{ BASE_URL }}categories?type=product" class="sidebar-link {{ $isProductCat ? 'active' : '' }}">
                        <i class="fas fa-box"></i> Sản phẩm
                    </a>
                    <a href="{{ BASE_URL }}categories?type=news" class="sidebar-link {{ $isNewsCat ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i> Tin tức
                    </a>
                </div>
            </div>

            <div class="sidebar-label">Cấu hình</div>
            <a href="{{ BASE_URL }}settings" class="sidebar-link {{ str_contains(request_uri(), 'setting') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Cài đặt liên kết
            </a>

            <div class="sidebar-label">Website</div>
            <a href="{{ BASE_URL }}" class="sidebar-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> Xem trang chủ
            </a>

            <div class="sidebar-label">Tài khoản</div>
            <a href="{{ BASE_URL }}logout" class="sidebar-link text-danger" style="border-left-color: transparent !important;">
                <i class="fas fa-sign-out-alt text-danger"></i> <span class="text-danger">Đăng xuất</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="admin-main">
        <div class="admin-topbar">
            <div>
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="topbar-title">@yield('title', 'Dashboard')</span>
                <div class="topbar-breadcrumb">
                    <a href="{{ BASE_URL }}admin">Admin</a> / @yield('breadcrumb', 'Dashboard')
                </div>
            </div>
            <div>
                <span style="font-size: 12px; color: var(--text-muted);">
                    <i class="fas fa-circle" style="color: var(--success); font-size: 8px;"></i> Online
                </span>
            </div>
        </div>

        <div class="admin-content">
            {{-- Flash Messages --}}
            @if(isset($_SESSION['success']))
                <div class="alert-admin success mb-3">
                    <i class="fas fa-check-circle me-2"></i>
                    @if(is_array($_SESSION['success']))
                        @foreach($_SESSION['success'] as $msg)
                            <span>{{ $msg }}</span><br>
                        @endforeach
                    @else
                        {{ $_SESSION['success'] }}
                    @endif
                </div>
                <?php unset($_SESSION['success']); ?>
            @endif

            @if(isset($_SESSION['errors']))
                <div class="alert-admin error mb-3">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    @if(is_array($_SESSION['errors']))
                        @foreach($_SESSION['errors'] as $msg)
                            <span>{{ $msg }}</span><br>
                        @endforeach
                    @else
                        {{ $_SESSION['errors'] }}
                    @endif
                </div>
                <?php unset($_SESSION['errors']); ?>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('adminSidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }
    </script>
    @yield('scripts')
</body>
</html>
