<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Admin Panel' }} — Unlock Themes Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ======= CSS VARIABLES ======= */
        :root {
            --primary:       #6366f1;
            --primary-dark:  #4f46e5;
            --primary-light: #eef2ff;
            --secondary:     #8b5cf6;
            --success:       #22c55e;
            --danger:        #ef4444;
            --warning:       #f59e0b;
            --info:          #06b6d4;
            --sidebar-bg:    #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active:#6366f1;
            --sidebar-text:  #94a3b8;
            --sidebar-title: #e2e8f0;
            --sidebar-width: 260px;
            --topbar-height: 64px;
            --content-bg:    #f1f5f9;
            --card-bg:       #ffffff;
            --border-color:  #e2e8f0;
            --text-primary:  #1e293b;
            --text-secondary:#64748b;
            --text-muted:    #94a3b8;
            --shadow-sm: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -1px rgba(0,0,0,.06);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,.1), 0 4px 6px -2px rgba(0,0,0,.05);
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --transition: all .2s ease;
        }

        /* ======= RESET & BASE ======= */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 15px; scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ======= LAYOUT ======= */
        .admin-wrapper { display: flex; min-height: 100vh; }

        /* ======= SIDEBAR ======= */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            position: fixed;
            top: 0; left: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: var(--transition);
            overflow: hidden;
        }
        .sidebar__logo {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255,255,255,.06);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            min-height: var(--topbar-height);
        }
        .sidebar__logo-icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 16px;
            flex-shrink: 0;
        }
        .sidebar__logo-text {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--sidebar-title);
            letter-spacing: -0.3px;
        }
        .sidebar__logo-text span { color: var(--primary); }

        .sidebar__nav { flex: 1; overflow-y: auto; padding: 16px 0; }
        .sidebar__nav::-webkit-scrollbar { width: 4px; }
        .sidebar__nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); border-radius: 4px; }

        .nav-section { margin-bottom: 8px; }
        .nav-section__title {
            font-size: .68rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 24px 6px;
        }
        .nav-item { display: block; }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 24px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: .88rem;
            font-weight: 500;
            border-radius: 0;
            transition: var(--transition);
            position: relative;
        }
        .nav-link:hover {
            background: var(--sidebar-hover);
            color: var(--sidebar-title);
        }
        .nav-link.active {
            background: rgba(99,102,241,.15);
            color: var(--primary);
        }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
            background: var(--primary);
            border-radius: 0 3px 3px 0;
        }
        .nav-link .nav-icon {
            width: 20px; height: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: .9rem; flex-shrink: 0;
        }
        .nav-badge {
            margin-left: auto;
            background: var(--primary);
            color: #fff;
            font-size: .65rem;
            font-weight: 600;
            padding: 2px 7px;
            border-radius: 20px;
        }

        .sidebar__footer {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,.06);
        }
        .sidebar-admin {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-admin__avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .8rem; font-weight: 700;
            flex-shrink: 0;
        }
        .sidebar-admin__info { flex: 1; min-width: 0; }
        .sidebar-admin__name {
            font-size: .82rem; font-weight: 600;
            color: var(--sidebar-title);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar-admin__role { font-size: .72rem; color: var(--text-muted); }
        .sidebar-admin__logout {
            color: var(--text-muted);
            font-size: .9rem;
            transition: var(--transition);
            text-decoration: none;
        }
        .sidebar-admin__logout:hover { color: var(--danger); }

        /* ======= MAIN CONTENT ======= */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: var(--transition);
        }

        /* ======= TOPBAR ======= */
        .topbar {
            height: var(--topbar-height);
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }
        .topbar__left { display: flex; align-items: center; gap: 16px; }
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-secondary);
            font-size: 1.2rem;
            padding: 6px;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }
        .sidebar-toggle:hover { background: var(--content-bg); }
        .topbar__breadcrumb {
            display: flex; align-items: center; gap: 8px;
            font-size: .82rem; color: var(--text-muted);
        }
        .topbar__breadcrumb span { color: var(--text-primary); font-weight: 600; }
        .topbar__right { display: flex; align-items: center; gap: 12px; }
        .topbar-btn {
            width: 38px; height: 38px;
            display: flex; align-items: center; justify-content: center;
            border: none; background: var(--content-bg);
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            cursor: pointer;
            font-size: .9rem;
            transition: var(--transition);
            position: relative;
            text-decoration: none;
        }
        .topbar-btn:hover { background: var(--primary-light); color: var(--primary); }
        .topbar-notif-dot {
            position: absolute;
            top: 7px; right: 7px;
            width: 7px; height: 7px;
            background: var(--danger);
            border-radius: 50%;
            border: 2px solid var(--card-bg);
        }
        .topbar-divider { width: 1px; height: 24px; background: var(--border-color); }

        /* ======= PAGE CONTENT ======= */
        .page-content { flex: 1; padding: 28px; }

        /* ======= PAGE HEADER ======= */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .page-header__title { font-size: 1.3rem; font-weight: 700; color: var(--text-primary); }
        .page-header__subtitle { font-size: .82rem; color: var(--text-muted); margin-top: 2px; }

        /* ======= CARDS ======= */
        .card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }
        .card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }
        .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        .card-body { padding: 24px; }

        /* ======= STAT CARDS ======= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 22px 24px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            transition: var(--transition);
        }
        .stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
        .stat-card__info {}
        .stat-card__label {
            font-size: .78rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 6px;
        }
        .stat-card__value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
        }
        .stat-card__change {
            font-size: .75rem;
            margin-top: 6px;
            font-weight: 500;
        }
        .stat-card__change.up { color: var(--success); }
        .stat-card__change.down { color: var(--danger); }
        .stat-card__icon {
            width: 50px; height: 50px;
            border-radius: var(--radius-md);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        .icon-primary { background: var(--primary-light); color: var(--primary); }
        .icon-success { background: #dcfce7; color: var(--success); }
        .icon-warning { background: #fef3c7; color: var(--warning); }
        .icon-danger  { background: #fee2e2; color: var(--danger); }
        .icon-info    { background: #cffafe; color: var(--info); }
        .icon-secondary { background: #ede9fe; color: var(--secondary); }

        /* ======= TABLE ======= */
        .table-wrapper { overflow-x: auto; }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th {
            text-align: left;
            padding: 12px 18px;
            font-size: .75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .5px;
            background: #f8fafc;
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }
        .data-table td {
            padding: 14px 18px;
            font-size: .87rem;
            color: var(--text-primary);
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .data-table tr:last-child td { border-bottom: none; }
        .data-table tbody tr:hover td { background: #f8fafc; }
        .data-table .product-thumb {
            width: 44px; height: 44px;
            border-radius: var(--radius-sm);
            object-fit: cover;
            border: 1px solid var(--border-color);
        }
        .product-info-cell { display: flex; align-items: center; gap: 12px; }
        .product-info-cell__name { font-weight: 600; font-size: .87rem; }
        .product-info-cell__sub { font-size: .75rem; color: var(--text-muted); margin-top: 2px; }

        /* ======= BADGES ======= */
        .badge {
            display: inline-flex; align-items: center;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: .73rem;
            font-weight: 600;
        }
        .badge-success { background: #dcfce7; color: #16a34a; }
        .badge-danger  { background: #fee2e2; color: #dc2626; }
        .badge-warning { background: #fef3c7; color: #d97706; }
        .badge-info    { background: #cffafe; color: #0891b2; }
        .badge-primary { background: var(--primary-light); color: var(--primary); }

        /* ======= BUTTONS ======= */
        .btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-size: .85rem; font-weight: 600;
            cursor: pointer; border: none; text-decoration: none;
            transition: var(--transition); white-space: nowrap;
            font-family: inherit;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-danger  { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: #dc2626; }
        .btn-success { background: var(--success); color: #fff; }
        .btn-success:hover { background: #16a34a; }
        .btn-warning { background: var(--warning); color: #fff; }
        .btn-warning:hover { background: #d97706; }
        .btn-secondary { background: #f1f5f9; color: var(--text-primary); }
        .btn-secondary:hover { background: #e2e8f0; }
        .btn-ghost { background: transparent; color: var(--text-secondary); border: 1px solid var(--border-color); }
        .btn-ghost:hover { background: #f8fafc; }
        .btn-sm { padding: 6px 12px; font-size: .78rem; }
        .btn-icon { width: 34px; height: 34px; padding: 0; border-radius: var(--radius-sm); display: inline-flex; align-items: center; justify-content: center; font-size: .85rem; }

        /* ======= FORMS ======= */
        .form-group { margin-bottom: 20px; }
        .form-label {
            display: block;
            font-size: .82rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 7px;
        }
        .form-label .required { color: var(--danger); margin-left: 3px; }
        .form-control, .form-select {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--border-color);
            border-radius: var(--radius-sm);
            font-size: .87rem;
            color: var(--text-primary);
            background: var(--card-bg);
            font-family: inherit;
            transition: var(--transition);
            outline: none;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        }
        .form-control::placeholder { color: var(--text-muted); }
        .form-hint { font-size: .75rem; color: var(--text-muted); margin-top: 5px; }
        textarea.form-control { resize: vertical; min-height: 120px; }
        .form-check {
            display: flex; align-items: center; gap: 10px;
            cursor: pointer;
        }
        .form-check input[type="checkbox"] {
            width: 18px; height: 18px; cursor: pointer;
            accent-color: var(--primary);
        }
        .form-check-label { font-size: .87rem; font-weight: 500; cursor: pointer; }

        /* ======= FORM GRID ======= */
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; }

        /* ======= ALERTS ======= */
        .alert {
            padding: 14px 18px;
            border-radius: var(--radius-md);
            font-size: .87rem;
            font-weight: 500;
            display: flex; align-items: flex-start; gap: 10px;
            margin-bottom: 20px;
        }
        .alert i { margin-top: 1px; }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .alert-danger  { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .alert-warning { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .alert-info    { background: #cffafe; color: #164e63; border: 1px solid #a5f3fc; }

        /* ======= PAGINATION ======= */
        .pagination-wrapper { padding: 16px 24px; border-top: 1px solid var(--border-color); }

        /* ======= AVATAR ======= */
        .user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .78rem; font-weight: 700;
            flex-shrink: 0;
        }

        /* ======= SIDEBAR OVERLAY (mobile) ======= */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            z-index: 999;
            backdrop-filter: blur(2px);
        }

        /* ======= RESPONSIVE ======= */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
                box-shadow: 4px 0 20px rgba(0,0,0,.3);
            }
            .sidebar-overlay.open { display: block; }
            .main-content { margin-left: 0; }
            .sidebar-toggle { display: flex; }
            .page-content { padding: 20px 16px; }
            .topbar { padding: 0 16px; }
            .form-row { grid-template-columns: 1fr; }
            .form-row-3 { grid-template-columns: 1fr; }
        }
        @media (max-width: 600px) {
            .stats-grid { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .card-header { flex-direction: column; align-items: flex-start; }
            .topbar__breadcrumb { display: none; }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-wrapper">

    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar" id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar__logo">
            <div class="sidebar__logo-icon"><i class="fas fa-bolt"></i></div>
            <div class="sidebar__logo-text">Viser<span>Lab</span></div>
        </a>

        <nav class="sidebar__nav">
            <div class="nav-section">
                <div class="nav-section__title">Main</div>
                <div class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-home"></i></span> Dashboard
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section__title">Catalog</div>
                <div class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-box"></i></span> Products
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-tags"></i></span> Categories
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.lubricant.index') }}" class="nav-link {{ request()->routeIs('admin.lubricant.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-oil-can"></i></span> Lubricants
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section__title">Gateways</div>
                <div class="nav-item">
                    <a href="{{ route('admin.gateway.manual.index') }}" class="nav-link {{ request()->routeIs('admin.gateway.manual.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-credit-card"></i></span> Manual Gateways
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section__title">Deposits</div>
                <div class="nav-item">
                    <a href="{{ route('admin.deposit.index') }}" class="nav-link {{ request()->routeIs('admin.deposit.index') && !request()->has('status') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-money-bill-wave"></i></span> All Deposits
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.deposit.index', ['status' => 'pending']) }}" class="nav-link {{ request()->get('status') === 'pending' ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-clock"></i></span> Pending
                        @php $pendingDepCount = \App\Models\Deposit::pending()->count(); @endphp
                        @if($pendingDepCount > 0)
                        <span class="nav-badge">{{ $pendingDepCount }}</span>
                        @endif
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.deposit.index', ['status' => 'approved']) }}" class="nav-link {{ request()->get('status') === 'approved' ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-check-circle"></i></span> Approved
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.deposit.index', ['status' => 'rejected']) }}" class="nav-link {{ request()->get('status') === 'rejected' ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-times-circle"></i></span> Rejected
                    </a>
                </div>
            </div>


            <div class="nav-section">
                <div class="nav-section__title">Users</div>
                <div class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-users"></i></span> All Users
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section__title">Support Tickets</div>
                <div class="nav-item">
                    <a href="{{ route('admin.ticket.index') }}" class="nav-link {{ request()->routeIs('admin.ticket.index') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-ticket-alt"></i></span> All Tickets
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.ticket.pending') }}" class="nav-link {{ request()->routeIs('admin.ticket.pending') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-spinner"></i></span> Pending Tickets
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.ticket.closed') }}" class="nav-link {{ request()->routeIs('admin.ticket.closed') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-times-circle"></i></span> Closed Tickets
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.ticket.answered') }}" class="nav-link {{ request()->routeIs('admin.ticket.answered') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-check-circle"></i></span> Answered Tickets
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section__title">Contact</div>
                <div class="nav-item">
                    <a href="{{ route('admin.contact.index') }}" class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-envelope"></i></span> Contact Messages
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section__title">System</div>
                <div class="nav-item">
                    <a href="{{ route('admin.setting.index') }}" class="nav-link {{ request()->routeIs('admin.setting.*') ? 'active' : '' }}">
                        <span class="nav-icon"><i class="fas fa-cog"></i></span> Settings
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span> Logout
                    </a>
                </div>
            </div>
        </nav>

        <div class="sidebar__footer">
            <div class="sidebar-admin">
                <div class="sidebar-admin__avatar">
                    {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 2)) }}
                </div>
                <div class="sidebar-admin__info">
                    <div class="sidebar-admin__name">{{ auth('admin')->user()->name ?? 'Admin' }}</div>
                    <div class="sidebar-admin__role">Super Admin</div>
                </div>
                <a href="{{ route('admin.logout') }}" class="sidebar-admin__logout" title="Logout">
                    <i class="fas fa-power-off"></i>
                </a>
            </div>
        </div>
    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar__left">
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="topbar__breadcrumb">
                    <i class="fas fa-home" style="font-size:.75rem"></i>
                    <i class="fas fa-chevron-right" style="font-size:.65rem"></i>
                    <span>{{ $pageTitle ?? 'Dashboard' }}</span>
                </div>
            </div>
            <div class="topbar__right">
                <a href="{{ route('home') }}" class="topbar-btn" target="_blank" title="View Site">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <div class="topbar-divider"></div>
                <a href="#" class="topbar-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="topbar-notif-dot"></span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="page-content">
            @if(session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger"><i class="fas fa-times-circle"></i> {{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul style="margin:0;padding-left:16px">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    sidebar.classList.toggle('open');
    overlay.classList.toggle('open');
}
</script>
@stack('scripts')
</body>
</html>
