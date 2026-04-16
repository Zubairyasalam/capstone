<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Terminal - Capstone</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <style>
        :root {
            --primary: #2bbfbf;
            --success: #2bbfbf;
            --danger: #ef4444;
            --text-main: #000000;
            --heading: #000000;
            --text-muted: #555555;
            --bg-body: #f6f9ff;
            --white: #ffffff;
            --border: #ebeef4;
            --sidebar-width: 300px;
            --header-height: 60px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Open Sans", sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "Nunito", sans-serif;
        }

        /* Top Header */
        .header {
            z-index: 1001;
            height: var(--header-height);
            box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
            background-color: var(--white);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }

        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .toggle-sidebar-btn {
            font-size: 24px;
            cursor: pointer;
            color: var(--heading);
            display: none;
            background: none;
            border: none;
            padding: 5px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            z-index: 1000;
            padding: 80px 15px 30px 15px;
            overflow-y: auto;
            background-color: var(--white);
            box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-nav {
            list-style: none;
        }

        .sidebar-nav .nav-heading {
            font-size: 11px;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 600;
            margin: 15px 0 5px 15px;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 5px;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            font-size: 15px;
            font-weight: 600;
            color: var(--heading);
            background: var(--white);
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            color: var(--primary);
            background: var(--bg-body);
        }

        /* Main */
        main {
            margin-top: var(--header-height);
            margin-left: var(--sidebar-width);
            padding: 30px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .pagetitle {
            margin-bottom: 20px;
        }

        .pagetitle h1 {
            font-size: 24px;
            font-weight: 600;
            color: var(--heading);
        }

        .pagetitle .breadcrumb {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 5px;
        }

        /* Cards */
        .card {
            margin-bottom: 30px;
            border: none;
            border-radius: 8px;
            box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
            background: var(--white);
            overflow: hidden;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            padding-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
            color: var(--heading);
            font-family: "Poppins", sans-serif;
        }

        .stat-val {
            font-size: 32px;
            font-weight: 700;
            color: var(--heading);
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-muted);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col {
            flex: 1;
            min-width: 280px;
            padding: 0 10px;
        }

        /* Tables Responsive Wrapper */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            text-align: left;
            padding: 12px;
            font-size: 12px;
            color: var(--text-muted);
            border-bottom: 2px solid var(--border);
            text-transform: uppercase;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 4px;
            outline: none;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
            padding: 6px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .super-section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .super-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Mobile specific adjustments */
        @media (max-width: 1199px) {
            .sidebar {
                left: -300px;
            }
            main {
                margin-left: 0;
            }
            .toggle-sidebar-btn {
                display: block;
            }
            .sidebar.show {
                left: 0;
            }
            .sidebar-overlay {
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.4);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: 0.3s;
            }
            .sidebar.show + .sidebar-overlay {
                opacity: 1;
                visibility: visible;
            }
        }

        @media (max-width: 575px) {
            main {
                padding: 20px 15px;
            }
            .pagetitle h1 {
                font-size: 20px;
            }
            .stat-val {
                font-size: 24px;
            }
            .logo-wrap span:first-of-type {
                font-size: 18px !important;
            }
            .logo-wrap span:last-of-type {
                font-size: 11px !important;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div style="display: flex; align-items: center; gap: 15px;">
            <button class="toggle-sidebar-btn" onclick="toggleSidebar()">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <a href="#" class="logo-wrap">
                <div
                    style="width: 36px; height: 36px; background: #2bbfbf; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0;">
                    <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px; height:20px;">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                </div>
                <div style="display:flex; flex-direction:column; line-height:1.2;">
                    <span style="font-size: 20px; font-weight: 700; color: #000;">Capstone Global</span>
                    <span style="font-size: 12px; color: #555; font-weight:400;">Super Admin Dashboard</span>
                </div>
            </a>
        </div>
    </header>

    <aside class="sidebar" id="sidebar">
        <ul class="sidebar-nav">
            <li class="nav-item">
                <div class="nav-link active" onclick="switchSuperSection('super-dash', this)">
                    Dashboard
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSuperSection('super-admins', this)">
                    Manage Admins
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSuperSection('super-db', this)">
                    Database
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSuperSection('super-logs', this)">
                    System Logs
                </div>
            </li>

            <li class="nav-heading">External</li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    Visit Home Page
                </a>
            </li>

            <li class="nav-heading">Account</li>
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" style="color: var(--danger); text-decoration: none;">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <main>
        <div class="pagetitle">
            <h1 id="page-title-text">Super Admin Center</h1>
            <div class="breadcrumb" id="breadcrumb-text">Home / Super Admin</div>
        </div>

        @if(session('success'))
            <div
                style="background:#d1fae5; color:#065f46; padding:15px; border-radius:8px; margin-bottom:20px; border:1px solid #a7f3d0;">
                {{ session('success') }}
            </div>
        @endif

        <!-- DASHBOARD -->
        <div id="super-dash" class="super-section active">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Analytics</h5>
                            <div class="stat-val">{{ count($users) }}</div>
                            <div class="stat-label">Registered Administrators</div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">System Health</h5>
                            <div style="font-size:14px; line-height:2.2;">
                                <div>Laravel Version: <strong>{{ app()->version() }}</strong></div>
                                <div>Environment: <strong style="color:var(--danger)">{{ config('app.env') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quick Actions</h5>
                            <form action="{{ route('admin.system.clear-cache') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-primary" style="width:100%; margin-top:5px;">Clear
                                    System Cache</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">DB Summary (Table Counts)</h5>
                    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap:15px;">
                        @foreach($db_stats as $table => $count)
                            <div style="background:var(--bg-body); padding:15px; border-radius:8px; text-align:center; border: 1px solid var(--border);">
                                <div style="font-size:11px; color:var(--text-muted); text-transform:uppercase; letter-spacing: 0.5px;">{{ $table }}
                                </div>
                                <div style="font-size:22px; font-weight:700;">{{ $count }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- MANAGE ADMINS -->
        <div id="super-admins" class="super-section">
            <div class="row">
                <div class="col" style="flex:2.5;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Administrator Directory</h5>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td style="font-weight: 600;">{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <span
                                                        style="padding:3px 10px; border-radius:4px; font-size:11px; font-weight:700; background:{{ $user->role == 'super_admin' ? '#fee2e2' : '#ecfdf5' }}; color:{{ $user->role == 'super_admin' ? '#ef4444' : '#10b981' }};">
                                                        {{ strtoupper(str_replace('_', ' ', $user->role)) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('Delete user?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Admin</h5>
                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf
                                <div class="form-group"><label>Full Name</label><input type="text" name="name"
                                        class="form-control" required placeholder="Ex. John Doe"></div>
                                <div class="form-group"><label>Email</label><input type="email" name="email"
                                        class="form-control" required placeholder="john@example.com"></div>
                                <div class="form-group"><label>Password</label><input type="password" name="password"
                                        class="form-control" required placeholder="••••••••"></div>
                                <div class="form-group"><label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="super_admin">Super Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn-primary" style="width:100%; margin-top:10px;">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DB VIEW -->
        <div id="super-db" class="super-section">
            <div class="row">
                @foreach($db_stats as $table => $count)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($table) }}</h5>
                                <div class="stat-val">{{ $count }}</div>
                                <div class="stat-label">Total Records</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- LOGS -->
        <div id="super-logs" class="super-section">
            <div class="card">
                <div class="card-body"
                    style="background:#0d1117; color:#3fb950; font-family:monospace; padding:20px; border-radius:8px;">
                    <h5 class="card-title" style="color:#ffffff; border-bottom: 1px solid #30363d; padding-bottom: 10px;">Latest Activity Logs</h5>
                    <div style="height:500px; overflow-y:auto; font-size:12px; line-height:1.6;">
                        @foreach($logs as $log)
                            <div style="margin-bottom:8px; border-bottom:1px solid #21262d; padding-bottom:8px; word-break: break-all;">
                                {{ $log }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        function switchSuperSection(id, el) {
            // Close sidebar on mobile after selection
            if (window.innerWidth < 1200) {
                toggleSidebar();
            }

            document.querySelectorAll('.super-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.nav-link').forEach(n => n.classList.remove('active'));

            document.getElementById(id).classList.add('active');
            el.classList.add('active');

            const titles = {
                'super-dash': 'Dashboard Summary',
                'super-admins': 'Administrator Management',
                'super-db': 'Database Statistics',
                'super-logs': 'System Logs'
            };
            document.getElementById('page-title-text').innerText = titles[id];
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>

</html>