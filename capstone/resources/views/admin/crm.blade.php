<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Capstone Admin</title>

    <!-- Google Fonts to match the authentic look -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

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

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Nunito", sans-serif;
        }

        /* Top Header */
        .header {
            z-index: 997;
            height: 60px;
            box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
            background-color: var(--white);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            /* Consistent 30px gutter */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }

        .logo {
            text-decoration: none;
            display: flex;
            align-items: center;
            width: 280px;
            font-size: 26px;
            font-weight: 700;
            color: var(--heading);
            font-family: "Nunito", sans-serif;
        }

        .logo span {
            color: var(--heading);
        }

        .toggle-sidebar-btn {
            font-size: 24px;
            cursor: pointer;
            color: var(--heading);
            display: none;
            /* Show only on mobile later */
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            /* Sidebar starts exactly from the top */
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            z-index: 996;
            padding: 80px 15px 30px 15px;
            /* Push below header, align content to 30px */
            overflow-y: auto;
            background-color: var(--white);
            box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
        }

        .sidebar-nav {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar-nav .nav-heading {
            font-size: 11px;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 600;
            margin: 15px 0 5px 15px;
            /* Align to 30px */
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
        }

        .sidebar-nav .nav-link i {
            font-size: 16px;
            margin-right: 15px;
            color: var(--text-muted);
            display: inline-block;
            width: 20px;
            text-align: center;
        }

        .sidebar-nav .nav-link:hover {
            color: var(--primary);
            background: var(--bg-body);
        }

        .sidebar-nav .nav-link:hover i {
            color: var(--primary);
        }

        .sidebar-nav .nav-link.active {
            color: var(--primary);
            background: var(--bg-body);
        }

        .sidebar-nav .nav-link.active i {
            color: var(--primary);
        }

        html,
        body {
            overflow-x: hidden;
        }

        /* Main View */
        main {
            margin-top: 60px;
            margin-left: var(--sidebar-width);
            padding: 30px 30px;
            /* Consistent 30px gutter */
            display: block;
            overflow-x: hidden;
        }

        .pagetitle {
            margin-bottom: 20px;
        }

        .pagetitle h1 {
            font-size: 24px;
            margin-bottom: 0;
            font-weight: 600;
            color: var(--heading);
        }

        .pagetitle .breadcrumb {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
            margin-top: 5px;
        }

        /* Cards */
        .card {
            margin-bottom: 30px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
            background: var(--white);
            position: relative;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            padding: 0 0 15px 0;
            font-size: 18px;
            font-weight: 500;
            color: var(--heading);
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: space-between;
        }

        .card-title span {
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 400;
        }

        .card-title .dots {
            color: #aab7cf;
            font-size: 20px;
            line-height: 0.5;
            cursor: pointer;
        }

        /* Stats Dashboard Specific */
        .dashboard .filter {
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .dashboard .info-card {
            padding-bottom: 10px;
        }

        .dashboard .info-card h6 {
            font-size: 28px;
            color: var(--heading);
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        .dashboard .card-icon {
            font-size: 32px;
            line-height: 0;
            width: 64px;
            height: 64px;
            flex-shrink: 0;
            flex-grow: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dashboard .sales-card .card-icon {
            color: var(--primary);
            background: #f6f6fe;
        }

        .dashboard .revenue-card .card-icon {
            color: var(--success);
            background: #e0f8e9;
        }

        .dashboard .customers-card .card-icon {
            color: var(--danger);
            background: #ffecdf;
        }

        .dashboard .info-card .pt-1 {
            padding-top: 5px;
        }

        .dashboard .info-card .text-success {
            color: var(--success);
            font-weight: 700;
            font-size: 14px;
        }

        .dashboard .info-card .text-danger {
            color: #dc3545;
            font-weight: 700;
            font-size: 14px;
        }

        .dashboard .info-card .text-muted {
            font-size: 14px;
        }

        /* Grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md-6 {
            flex: 0 0 calc(50% - 10px);
            max-width: calc(50% - 10px);
        }

        .col-md-4 {
            flex: 0 0 calc(33.333% - 13.333px);
            max-width: calc(33.333% - 13.333px);
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .ps-3 {
            padding-left: 1rem;
        }

        /* General UI Elements */
        .cms-section {
            display: none;
        }

        .cms-section.active {
            display: block;
        }

        /* Tables */
        .table-responsive {
            overflow-x: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px 15px;
            font-size: 14px;
            color: var(--heading);
            border-bottom: 2px solid var(--border);
            background: #fcfcfd;
            font-family: inherit;
            font-weight: 600;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            color: var(--text-main);
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--heading);
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
        }

        .btn-primary:hover {
            background: #2b3bbd;
        }

        .btn-danger {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            margin: 0;
            gap: 5px;
        }

        .page-item .page-link {
            position: relative;
            display: block;
            padding: 5px 12px;
            color: var(--primary);
            text-decoration: none;
            background-color: var(--white);
            border: 1px solid var(--border);
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .page-item.disabled .page-link {
            color: var(--text-muted);
            pointer-events: none;
            background-color: var(--bg-body);
            border-color: var(--border);
        }

        .page-link:hover {
            z-index: 2;
            color: #fff;
            background-color: var(--primary);
            border-color: var(--primary);
        }

        /* Mobile */
        @media (max-width: 1199px) {
            .sidebar {
                left: -300px;
                box-shadow: 5px 0 20px rgba(1, 41, 112, 0.1);
            }

            .sidebar.active {
                left: 0;
            }

            main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .toggle-sidebar-btn {
                display: block;
                margin-left: auto;
            }

            .table-responsive {
                overflow-x: auto !important;
            }
        }

        @media (max-width: 768px) {

            .col-md-6,
            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .row {
                gap: 15px;
            }

            .header {
                padding: 0 15px;
            }

            .logo .logo-title {
                font-size: 18px !important;
            }

            .logo .logo-subtitle {
                font-size: 10px !important;
            }

            .card-title {
                font-size: 16px;
                flex-direction: column;
                gap: 5px;
            }

            .dashboard .info-card h6 {
                font-size: 24px;
            }

            table {
                width: 600px;
            }

            /* Force scroll on tiny phones */
        }
    </style>
</head>

<body class="dashboard">

    <!-- Header -->
    <header id="header" class="header">
        <a href="#" class="logo" style="display:flex; align-items:center; gap:10px;">
            <div
                style="width: 32px; height: 32px; background: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #fff; padding: 5px;">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:100%; height:100%;">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
            </div>
            <div style="display:flex; flex-direction:column; line-height:1.2;">
                <span class="logo-title" style="font-size: 22px;">Capstone Global</span>
                <span class="logo-subtitle" style="font-size: 11px; color: var(--text-muted); font-weight:600;">Admin
                    Dashboard</span>
            </div>
        </a>
        <i class="toggle-sidebar-btn" onclick="toggleSidebar()">☰</i>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav">
            <li class="nav-item">
                <div class="nav-link active" onclick="switchSection('dashboard', this)">
                    <span>Dashboard</span>
                </div>
            </li>

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('messages-cms', this)">
                    <span>Inquiries</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('home-cms', this)">
                    <span>Home Section</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('about-cms', this)">
                    <span>About Section</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('approach-cms', this)">
                    <span>Approach Section</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('services-cms', this)">
                    <span>Services Section</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('clients-cms', this)">
                    <span>Clients Section</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('contact-cms', this)">
                    <span>Contact Section</span>
                </div>
            </li>



            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('media-cms', this)">
                    <span>Media</span>
                </div>
            </li>

            <li class="nav-heading">System</li>

            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('settings-cms', this)">
                    <span>Settings</span>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" onclick="switchSection('email-settings-cms', this)">
                    <span>Email Config</span>
                </div>
            </li>


            <li class="nav-item" style="margin-top: 30px;">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" style="color: var(--danger); text-decoration: none;">
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>

    <main id="main">

        <!-- DASHBOARD -->
        <div id="dashboard" class="cms-section active pt-2">

            <div class="pagetitle">
                <h1>Dashboard</h1>
                <div class="breadcrumb">Home / Dashboard</div>
            </div>

            <div class="row">
                <!-- Sales/Leads Card -->
                <div class="col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Inquiries <span>| Total</span>
                                <div class="filter float-end dots">⋯</div>
                            </h5>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6>{{ $leads->total() }}</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>

        <!-- INQUIRIES -->
        <div id="messages-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Lead Management</h1>
                <div class="breadcrumb">Home / Inquiries</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Inquiries <span>| Submissions</span></h5>
                    <div class="table-responsive">
                        <table style="table-layout: auto;">
                            <thead>
                                <tr>
                                    <th style="width:180px;">Name & Contact</th>
                                    <th>Service</th>
                                    <th>Received</th>
                                    <th>Status</th>
                                    <th style="width:120px; text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                    <tr style="transition: background 0.2s;">
                                        <td>
                                            <div style="font-weight:700; color:var(--heading);">{{ $lead->name }}</div>
                                            <div style="font-size:12px; color:var(--text-muted);">{{ $lead->email }}</div>
                                            <div style="font-size:11px; color:#000000; font-weight:600;">
                                                {{ $lead->phone ?? 'No Phone' }}</div>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <span
                                                style="background:#eef2f7; padding:4px 10px; border-radius:15px; font-size:12px; font-weight:600; color:var(--heading);">{{ $lead->service ?? 'Inquiry' }}</span>
                                        </td>
                                        <td
                                            style="vertical-align: middle; color:var(--text-main); font-size:13px; font-weight: 500;">
                                            <div style="font-weight:700;">
                                                {{ $lead->created_at ? $lead->created_at->format('M d, Y') : 'N/A' }}</div>
                                            <div style="font-size:11px; color:var(--text-muted);">
                                                {{ $lead->created_at ? $lead->created_at->format('h:i A') : '' }}</div>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <span
                                                style="background:#e0f8e9; color:#2bbfbf; padding:3px 8px; border-radius:4px; font-size:11px; font-weight:700; text-transform:uppercase;">New</span>
                                        </td>
                                        <td style="vertical-align: middle; text-align:right;">
                                            <div style="display:flex; justify-content:flex-end; gap:5px;">
                                                <button
                                                    onclick="viewLeadDetail('{{ addslashes($lead->name) }}', '{{ $lead->email }}', '{{ $lead->phone }}', '{{ $lead->service }}', '{{ addslashes($lead->message) }}', '{{ $lead->created_at }}')"
                                                    style="background:var(--primary); color:#fff; border:none; padding:6px 10px; border-radius:4px; cursor:pointer;"
                                                    title="View Message">
                                                    <span class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">visibility</span>
                                                </button>
                                                <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST"
                                                    onsubmit="return confirm('Delete this inquiry?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        style="background:#fef2f2; color:#ef4444; border:1px solid #fee2e2; padding:5px 10px; border-radius:4px; cursor:pointer;">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                        {{ $leads->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- LEAD DETAIL MODAL -->
        <div id="leadModal"
            style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
            <div
                style="background:#fff; width:95%; max-width:600px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow:hidden;">
                <div
                    style="padding:20px; border-bottom:1px solid #eee; display:flex; justify-content:space-between; align-items:center; background:#f8fbfe;">
                    <h3 style="margin:0; font-family:'Nunito'; color:var(--heading);">Message Details</h3>
                    <button onclick="closeLeadModal()"
                        style="background:none; border:none; font-size:24px; cursor:pointer; color:#999;">&times;</button>
                </div>
                <div style="padding:25px;" id="leadModalContent">
                    <!-- Content injected by JS -->
                </div>
                <div style="padding:15px; border-top:1px solid #eee; text-align:right; background:#f8fbfe;">
                    <button onclick="closeLeadModal()" class="btn-primary" style="padding:8px 25px;">Close</button>
                </div>
            </div>
        </div>

        <script>
            function viewLeadDetail(name, email, phone, service, message, date) {
                const content = `
                    <div style="margin-bottom:20px; display:grid; grid-template-columns:1fr 1fr; gap:15px;">
                        <div><label style="display:block; font-size:11px; color:#aaa; text-transform:uppercase; font-weight:700;">From</label><strong>${name}</strong></div>
                        <div><label style="display:block; font-size:11px; color:#aaa; text-transform:uppercase; font-weight:700;">Service</label><strong>${service || 'General'}</strong></div>
                        <div><label style="display:block; font-size:11px; color:#aaa; text-transform:uppercase; font-weight:700;">Email</label><a href="mailto:${email}" style="color:var(--primary);">${email}</a></div>
                        <div><label style="display:block; font-size:11px; color:#aaa; text-transform:uppercase; font-weight:700;">Phone</label><strong>${phone || 'N/A'}</strong></div>
                    </div>
                    <div style="background:#f6f9ff; padding:15px; border-radius:8px; border-left:4px solid var(--primary);">
                        <label style="display:block; font-size:11px; color:#aaa; text-transform:uppercase; font-weight:700; margin-bottom:5px;">Message</label>
                        <div style="line-height:1.6; color:#444; white-space: pre-wrap;">${message || 'No message provided.'}</div>
                    </div>
                    <div style="margin-top:15px; font-size:12px; color:#999;">Received at: ${date}</div>
                `;
                document.getElementById('leadModalContent').innerHTML = content;
                document.getElementById('leadModal').style.display = 'flex';
            }
            function closeLeadModal() {
                document.getElementById('leadModal').style.display = 'none';
            }
        </script>

        <!-- HOME CMS -->
        <div id="home-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Home Section</h1>
                <div class="breadcrumb">Pages / Home</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Hero Content <span>| Landing Page</span></h5>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="form-group"><label>Tagline</label><input type="text" name="hero_tagline"
                                class="form-control" value="{{ $settings['hero_tagline'] ?? '' }}"></div>
                        <div class="form-group"><label>Headline</label><textarea name="hero_headline"
                                class="form-control" rows="3">{{ $settings['hero_headline'] ?? '' }}</textarea></div>
                        <div class="form-group"><label>Subtext</label><textarea name="hero_subtext" class="form-control"
                                rows="3">{{ $settings['hero_subtext'] ?? '' }}</textarea></div>
                        <button type="submit" class="btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ABOUT CMS -->
        <div id="about-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>About Section</h1>
                <div class="breadcrumb">Pages / About</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit About Details <span>| Information</span></h5>
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Small Tag (e.g. ABOUT US)</label>
                                <input type="text" name="about_tag" class="form-control" value="{{ $settings['about_tag'] ?? 'ABOUT US' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Main Title (use &lt;br&gt; for linebreaks)</label>
                                <input type="text" name="about_title" class="form-control" value="{{ $settings['about_title'] ?? 'Who<br>We Are' }}">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Lead Text (Bold text)</label>
                            <textarea name="about_description" class="form-control" rows="3">{{ $settings['about_description'] ?? 'Capstone Global Services India Private Limited is a Chennai-based integrated business solutions provider, delivering comprehensive services across industries with over a decade of expertise.' }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label>Secondary Text (Paragraph)</label>
                            <textarea name="about_mission" class="form-control" rows="3">{{ $settings['about_mission'] ?? 'We act as a global connecting hub, enabling businesses to scale efficiently through strategic consulting, outsourcing, infrastructure development, and technology-driven transformation.' }}</textarea>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 form-group">
                                <label>Button Text</label>
                                <input type="text" name="about_btn_text" class="form-control" value="{{ $settings['about_btn_text'] ?? 'DISCOVER MORE' }}">
                            </div>
                        </div>

                        <h5 class="card-title mt-4">About Images <span>| Office Gallery</span></h5>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Image 1 (Top Left)</label>
                                <input type="file" name="about_img_1" class="form-control">
                                @if(isset($settings['about_img_1'])) <small class="text-success">Current: {{ $settings['about_img_1'] }}</small> @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Image 2 (Top Right)</label>
                                <input type="file" name="about_img_2" class="form-control">
                                @if(isset($settings['about_img_2'])) <small class="text-success">Current: {{ $settings['about_img_2'] }}</small> @endif
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label>Image 3 (Bottom Left)</label>
                                <input type="file" name="about_img_3" class="form-control">
                                @if(isset($settings['about_img_3'])) <small class="text-success">Current: {{ $settings['about_img_3'] }}</small> @endif
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label>Image 4 (Bottom Right)</label>
                                <input type="file" name="about_img_4" class="form-control">
                                @if(isset($settings['about_img_4'])) <small class="text-success">Current: {{ $settings['about_img_4'] }}</small> @endif
                            </div>
                        </div>

                        <button type="submit" class="btn-primary mt-4">Save About Section</button>
                    </form>
                </div>
            </div>
        </div>





        <!-- APPROACH CMS -->
        <div id="approach-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Approach Section</h1>
                <div class="breadcrumb">Pages / Approach</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Approach Details <span>| Why Choose Us</span></h5>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Small Tag</label>
                                <input type="text" name="approach_tag" class="form-control" value="{{ $settings['approach_tag'] ?? 'THE CAPSTONE ADVANTAGE' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Main Title (use &lt;br&gt; for linebreaks)</label>
                                <input type="text" name="approach_title" class="form-control" value="{{ $settings['approach_title'] ?? 'Why<br>Capstone?' }}">
                            </div>
                        </div>

                        <h5 class="card-title mt-4">List Items <span>| Bullet Points</span></h5>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Item 1</label>
                                <input type="text" name="approach_item_1" class="form-control" value="{{ $settings['approach_item_1'] ?? '10+ Years of Proven Experience' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Item 2</label>
                                <input type="text" name="approach_item_2" class="form-control" value="{{ $settings['approach_item_2'] ?? 'End-to-End Service Integration' }}">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label>Item 3</label>
                                <input type="text" name="approach_item_3" class="form-control" value="{{ $settings['approach_item_3'] ?? 'Global Network & Alliances' }}">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label>Item 4</label>
                                <input type="text" name="approach_item_4" class="form-control" value="{{ $settings['approach_item_4'] ?? 'Client-Centric Approach' }}">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label>Item 5</label>
                                <input type="text" name="approach_item_5" class="form-control" value="{{ $settings['approach_item_5'] ?? 'Technology-Driven Solutions' }}">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label>Item 6</label>
                                <input type="text" name="approach_item_6" class="form-control" value="{{ $settings['approach_item_6'] ?? 'Strong Compliance & Governance' }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-primary mt-4">Save Approach Section</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- SERVICES CMS -->
        <div id="services-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Services Section</h1>
                <div class="breadcrumb">Pages / Services</div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Service <span>| Offerings</span></h5>
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Service Title</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. Strategic Consulting" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Icon/Number (Optional)</label>
                                <input type="text" name="icon" class="form-control" placeholder="e.01">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Service Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Describe what this service covers..." required></textarea>
                        </div>
                        <button type="submit" class="btn-primary mt-3">Add Service</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Existing Services <span>| Manage</span></h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr id="service-row-{{ $service->id }}">
                                    <td>{{ $service->icon ?? $loop->iteration }}</td>
                                    <td><strong>{{ $service->title }}</strong></td>
                                    <td>{{ Str::limit($service->description, 50) }}</td>
                                    <td>
                                        <div style="display:flex; gap:6px; align-items:center;">
                                            <button
                                                onclick="openServiceEdit({{ $service->id }}, '{{ addslashes($service->title) }}', '{{ addslashes($service->description) }}', '{{ $service->icon ?? '' }}')"
                                                style="background:#e0f8f8; color:#2bbfbf; border:1px solid #b0e8e8; padding:5px 12px; border-radius:4px; cursor:pointer; font-weight:600; font-size:13px;">
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background:#fef2f2; color:#ef4444; border:1px solid #fee2e2; padding:5px 12px; border-radius:4px; cursor:pointer; font-weight:600; font-size:13px;">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── SERVICE EDIT MODAL ── --}}
        <div id="serviceEditModal" style="display:none; position:fixed; z-index:2000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
            <div style="background:#fff; width:95%; max-width:580px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow:hidden;">
                <div style="padding:18px 24px; border-bottom:1px solid #eee; display:flex; justify-content:space-between; align-items:center; background:#f8fbfe;">
                    <h3 style="margin:0; font-family:'Nunito',sans-serif; color:var(--heading); font-size:18px;">Edit Service</h3>
                    <button onclick="closeServiceEdit()" style="background:none; border:none; font-size:24px; cursor:pointer; color:#999; line-height:1;">&times;</button>
                </div>
                <form id="serviceEditForm" method="POST" style="padding:24px;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_service_id" value="">
                    <div class="form-group">
                        <label style="font-weight:600; font-size:14px; color:var(--heading);">Service Title</label>
                        <input type="text" id="edit_service_title" name="title" class="form-control" required style="margin-top:6px;">
                    </div>
                    <div class="form-group mt-3">
                        <label style="font-weight:600; font-size:14px; color:var(--heading);">Description</label>
                        <textarea id="edit_service_description" name="description" class="form-control" rows="4" required style="margin-top:6px;"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label style="font-weight:600; font-size:14px; color:var(--heading);">Icon / Number <span style="font-weight:400; color:#aaa;">(Optional)</span></label>
                        <input type="text" id="edit_service_icon" name="icon" class="form-control" style="margin-top:6px;">
                    </div>
                    <div style="display:flex; gap:10px; margin-top:24px; justify-content:flex-end;">
                        <button type="button" onclick="closeServiceEdit()" style="padding:9px 22px; border:1px solid #ddd; border-radius:4px; background:#fff; cursor:pointer; font-size:14px; font-weight:600; color:var(--text-muted);">Cancel</button>
                        <button type="submit" class="btn-primary" style="padding:9px 22px;">Update Service</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openServiceEdit(id, title, description, icon) {
                document.getElementById('edit_service_id').value = id;
                document.getElementById('edit_service_title').value = title;
                document.getElementById('edit_service_description').value = description;
                document.getElementById('edit_service_icon').value = icon;
                document.getElementById('serviceEditForm').action = '/admin/services/' + id;
                document.getElementById('serviceEditModal').style.display = 'flex';
            }
            function closeServiceEdit() {
                document.getElementById('serviceEditModal').style.display = 'none';
            }
            // Close modal on backdrop click
            document.getElementById('serviceEditModal').addEventListener('click', function(e) {
                if (e.target === this) closeServiceEdit();
            });
        </script>

        <!-- CLIENTS CMS -->
        <div id="clients-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Clients Section</h1>
                <div class="breadcrumb">Pages / Clients</div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Who We Serve <span>| Section Text</span></h5>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Small Tag</label>
                                <input type="text" name="serve_tag" class="form-control" value="{{ $settings['serve_tag'] ?? 'OUR CLIENTS' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Main Title (use &lt;br&gt; for linebreaks)</label>
                                <input type="text" name="serve_title" class="form-control" value="{{ $settings['serve_title'] ?? 'Who<br>We Serve' }}">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Lead Description</label>
                            <input type="text" name="serve_desc" class="form-control" value="{{ $settings['serve_desc'] ?? 'We proudly partner with a diverse portfolio of clients:' }}">
                        </div>

                        <h5 class="card-title mt-4">Client Categories <span>| List Chips</span></h5>
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label>Chip 1</label>
                                <input type="text" name="serve_chip_1" class="form-control" value="{{ $settings['serve_chip_1'] ?? 'Corporate Enterprises' }}">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label>Chip 2</label>
                                <input type="text" name="serve_chip_2" class="form-control" value="{{ $settings['serve_chip_2'] ?? 'Real Estate Developers' }}">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label>Chip 3</label>
                                <input type="text" name="serve_chip_3" class="form-control" value="{{ $settings['serve_chip_3'] ?? 'Infrastructure Companies' }}">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label>Chip 4</label>
                                <input type="text" name="serve_chip_4" class="form-control" value="{{ $settings['serve_chip_4'] ?? 'Financial Institutions' }}">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label>Chip 5</label>
                                <input type="text" name="serve_chip_5" class="form-control" value="{{ $settings['serve_chip_5'] ?? 'Startups & SMEs' }}">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label>Chip 6</label>
                                <input type="text" name="serve_chip_6" class="form-control" value="{{ $settings['serve_chip_6'] ?? 'Government & Public Sector' }}">
                            </div>
                        </div>

                        <h5 class="card-title mt-4">Client Commitment Card <span>| Dark Card</span></h5>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Commitment Title</label>
                                <input type="text" name="comm_title" class="form-control" value="{{ $settings['comm_title'] ?? 'Client <span>Commitment</span>' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Commitment Subtext</label>
                                <textarea name="comm_subtitle" class="form-control" rows="2">{{ $settings['comm_subtitle'] ?? 'We build long-term partnerships by delivering consistent excellence across every touchpoint.' }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-group">
                                <label>Item 01 Title</label>
                                <input type="text" name="comm_item_1" class="form-control" value="{{ $settings['comm_item_1'] ?? 'Measurable Results' }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Item 02 Title</label>
                                <input type="text" name="comm_item_2" class="form-control" value="{{ $settings['comm_item_2'] ?? 'Scalable Solutions' }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Item 03 Title</label>
                                <input type="text" name="comm_item_3" class="form-control" value="{{ $settings['comm_item_3'] ?? 'Transparent Processes' }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-primary mt-4">Save Section Text</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Add New Logo <span>| Ticker Fallback</span></h5>
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Client Name</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Reliance Industries" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Client Logo</label>
                                <input type="file" name="logo" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary mt-3">Add Client Logo</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Current Partners <span>| Manage</span></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>
                                        @if($client->logo)
                                            <img src="{{ asset('images/' . $client->logo) }}" alt="{{ $client->name }}" style="height:40px; border-radius:4px;">
                                        @else
                                            <span class="text-muted">No Logo</span>
                                        @endif
                                    </td>
                                    <td><strong>{{ $client->name }}</strong></td>
                                    <td>
                                        <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Remove this client?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="background:#dc3545; color:#fff; border:none; padding:5px 10px; border-radius:4px;">
                                                Delete
                                            </button>
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

        <!-- CONTACT CMS -->
        <div id="contact-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Contact Section</h1>
                <div class="breadcrumb">Pages / Contact</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">General Labels <span>| Header</span></h5>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Main Title</label>
                                <input type="text" name="contact_title" class="form-control" value="{{ $settings['contact_title'] ?? 'Get In Touch' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Subtitle</label>
                                <input type="text" name="contact_subtitle" class="form-control" value="{{ $settings['contact_subtitle'] ?? 'Reach out to discover how we can transform your business.' }}">
                            </div>
                        </div>

                        <h5 class="card-title mt-4">Contact Details <span>| Information Bar</span></h5>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Location Address (use &lt;br&gt; for newline)</label>
                                <textarea name="contact_address" class="form-control" rows="2">{{ $settings['contact_address'] ?? 'Chennai, Tamil Nadu<br>India' }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <label>Phone Numbers (use &lt;br&gt; for multiples)</label>
                                <textarea name="contact_phones" class="form-control" rows="2">{{ $settings['contact_phones'] ?? '+91 90032 21519<br>+91 96000 31509' }}</textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email Address</label>
                                <input type="text" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? 'info@capstoneglobalservices.com' }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-primary mt-4">Save Contact Section</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- MEDIA -->
        <div id="media-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Media Library</h1>
                <div class="breadcrumb">Pages / Media Files</div>
            </div>

            @if(session('success'))
                <div
                    style="background:#e0f8e9; color:#2bbfbf; border:1px solid #2bbfbf; padding:12px 18px; border-radius:5px; margin-bottom:20px; font-weight:600;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Upload Card -->
            <div class="card" style="margin-bottom:25px;">
                <div class="card-body">
                    <h5 class="card-title">Upload Files <span>| From Your Computer</span></h5>
                    <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data"
                        id="mediaUploadForm">
                        @csrf

                        <!-- Drag & Drop Zone -->
                        <div id="dropZone" onclick="document.getElementById('mediaFileInput').click()"
                            style="border: 2px dashed var(--primary); border-radius: 10px; padding: 50px 20px; text-align: center; background: #f6f9ff; cursor: pointer; transition: background 0.2s;">
                            <div style="font-size: 48px; margin-bottom: 10px;">📁</div>
                            <p style="font-size: 16px; font-weight: 700; color: var(--heading); margin-bottom: 5px;">
                                Click to Browse Files</p>
                            <p style="font-size: 13px; color: var(--text-muted);">or drag & drop files here</p>
                            <p style="font-size: 12px; color: #bbb; margin-top: 8px;">Supports: JPG, PNG, GIF, WEBP,
                                SVG, PDF — Max 10MB per file</p>
                            <input type="file" id="mediaFileInput" name="media_files[]" multiple
                                accept=".jpg,.jpeg,.png,.gif,.webp,.svg,.pdf" style="display:none"
                                onchange="previewFiles(this)">
                        </div>

                        <!-- Preview Area -->
                        <div id="previewArea" style="display:none; margin-top:20px;">
                            <p style="font-weight:700; color:var(--heading); margin-bottom:12px; font-size:14px;">
                                Selected Files:</p>
                            <div id="previewGrid"
                                style="display:grid; grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); gap:12px;">
                            </div>
                            <div style="margin-top:20px; display:flex; gap:10px; align-items:center;">
                                <button type="submit" class="btn-primary" style="padding:10px 24px;">Upload All
                                    Files</button>
                                <button type="button" onclick="clearPreview()"
                                    style="background:none; border:1px solid #ddd; padding:10px 18px; border-radius:4px; cursor:pointer; font-size:14px;">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Media Library Grid -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Uploaded Files <span>| {{ count($media) }} file(s)</span>
                    </h5>
                    @if(count($media) > 0)
                        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap:15px;">
                            @foreach($media as $img)
                                <div
                                    style="border-radius:8px; overflow:hidden; border:1px solid #ebeef4; background:#fafafa; position:relative; group;">
                                    @if(in_array(pathinfo($img, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']))
                                        <img src="{{ asset('images/' . $img) }}"
                                            style="width:100%; height:120px; object-fit:cover; display:block;">
                                    @else
                                        <div
                                            style="width:100%; height:120px; display:flex; align-items:center; justify-content:center; font-size:36px; background:#f0f0f0;">
                                            📄</div>
                                    @endif
                                    <div style="padding:8px;">
                                        <p
                                            style="font-size:11px; color:#666; word-break:break-all; margin-bottom:6px; line-height:1.3;">
                                            {{ $img }}</p>
                                        <div style="display:flex; gap:6px;">
                                            <a href="{{ asset('images/' . $img) }}" target="_blank"
                                                style="flex:1; text-align:center; font-size:11px; padding:4px; background:#f6f9ff; color:var(--primary); border-radius:3px; text-decoration:none; font-weight:600;">View</a>
                                            <form action="{{ route('admin.media.destroy', $img) }}" method="POST"
                                                style="flex:1;" onsubmit="return confirm('Delete this file?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    style="width:100%; font-size:11px; padding:4px; background:#fef2f2; color:#ef4444; border:none; border-radius:3px; cursor:pointer; font-weight:600;">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div style="text-align:center; padding:60px 20px; color:#aaa;">
                            <div style="font-size:60px; margin-bottom:15px;">🖼️</div>
                            <p style="font-size:16px; font-weight:600;">No files uploaded yet</p>
                            <p style="font-size:13px;">Use the upload section above to add images</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <style>
            #dropZone:hover {
                background: #edf5ff !important;
            }

            #dropZone.dragover {
                background: #d8f5f5 !important;
                border-color: #1a9696 !important;
            }
        </style>

        <script>
            // Drag & Drop
            const dz = document.getElementById('dropZone');
            if (dz) {
                dz.addEventListener('dragover', e => { e.preventDefault(); dz.classList.add('dragover'); });
                dz.addEventListener('dragleave', () => dz.classList.remove('dragover'));
                dz.addEventListener('drop', e => {
                    e.preventDefault();
                    dz.classList.remove('dragover');
                    const input = document.getElementById('mediaFileInput');
                    const dt = new DataTransfer();
                    [...e.dataTransfer.files].forEach(f => dt.items.add(f));
                    input.files = dt.files;
                    previewFiles(input);
                });
            }

            function previewFiles(input) {
                const files = input.files;
                if (!files.length) return;
                const grid = document.getElementById('previewGrid');
                const area = document.getElementById('previewArea');
                grid.innerHTML = '';
                [...files].forEach(file => {
                    const div = document.createElement('div');
                    div.style.cssText = 'border:1px solid #eee; border-radius:6px; overflow:hidden; background:#fafafa;';
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = e => {
                            div.innerHTML = '<img src="' + e.target.result + '" style="width:100%;height:90px;object-fit:cover;display:block;"><p style="font-size:10px;padding:5px;color:#666;word-break:break-all;line-height:1.2;">' + file.name + '</p>';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        div.innerHTML = '<div style="height:90px;display:flex;align-items:center;justify-content:center;font-size:30px;">📄</div><p style="font-size:10px;padding:5px;color:#666;word-break:break-all;line-height:1.2;">' + file.name + '</p>';
                    }
                    grid.appendChild(div);
                });
                area.style.display = 'block';
            }

            function clearPreview() {
                document.getElementById('mediaFileInput').value = '';
                document.getElementById('previewGrid').innerHTML = '';
                document.getElementById('previewArea').style.display = 'none';
            }
        </script>


        <!-- SETTINGS -->
        <!-- SETTINGS -->
        <div id="settings-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Settings</h1>
                <div class="breadcrumb">System / Settings</div>
            </div>

            @if(session('success'))
                <div
                    style="background:#e0f8e9; color:#2bbfbf; border:1px solid #2bbfbf; padding:12px 18px; border-radius:5px; margin-bottom:20px; font-weight:600;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Settings Tabs -->
            <div style="display:flex; gap:8px; margin-bottom:20px; flex-wrap:wrap;">
                <button onclick="switchSettingsTab('company')" id="stab-company" class="stab stab-active">Company
                    Info</button>
                <button onclick="switchSettingsTab('contact')" id="stab-contact" class="stab">Contact Details</button>
                <button onclick="switchSettingsTab('social')" id="stab-social" class="stab">Social Media</button>
                <button onclick="switchSettingsTab('seo')" id="stab-seo" class="stab">SEO &amp; Meta</button>
                <button onclick="switchSettingsTab('appearance')" id="stab-appearance" class="stab">Appearance</button>
            </div>

            <style>
                .stab {
                    padding: 8px 18px;
                    border: 1px solid var(--border);
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 13px;
                    font-weight: 600;
                    background: var(--white);
                    color: var(--heading);
                }

                .stab-active {
                    background: var(--primary);
                    color: #fff;
                    border-color: var(--primary);
                }

                .settings-tab {
                    display: none;
                }

                .settings-tab.active {
                    display: block;
                }
            </style>

            <!-- Tab: Company Info -->
            <div id="stab-content-company" class="settings-tab active">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Company Information <span>| Brand Identity</span></h5>
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="row" style="gap:0;">
                                <div class="col-md-6">
                                    <div class="form-group"><label>Company Name</label><input type="text"
                                            name="site_title" class="form-control"
                                            value="{{ $settings['site_title'] ?? '' }}"
                                            placeholder="e.g. Capstone Global"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Tagline</label><input type="text" name="site_tagline"
                                            class="form-control" value="{{ $settings['site_tagline'] ?? '' }}"
                                            placeholder="e.g. Building Tomorrow's Solutions"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Company Email</label><input type="email"
                                            name="site_email" class="form-control"
                                            value="{{ $settings['site_email'] ?? '' }}" placeholder="info@company.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Company Website</label><input type="url"
                                            name="site_url" class="form-control"
                                            value="{{ $settings['site_url'] ?? '' }}"
                                            placeholder="https://capstoneglobal.com"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label>Company Description</label><textarea
                                            name="site_description" class="form-control"
                                            rows="3">{{ $settings['site_description'] ?? '' }}</textarea></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Founded Year</label><input type="text"
                                            name="founded_year" class="form-control"
                                            value="{{ $settings['founded_year'] ?? '' }}" placeholder="e.g. 2015"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Copyright Text</label><input type="text"
                                            name="copyright_text" class="form-control"
                                            value="{{ $settings['copyright_text'] ?? '' }}"
                                            placeholder="2025 Capstone Global. All rights reserved."></div>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">Save Company Info</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: Contact Details -->
            <div id="stab-content-contact" class="settings-tab">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Details <span>| Location &amp; Reach</span></h5>
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="row" style="gap:0;">
                                <div class="col-md-6">
                                    <div class="form-group"><label>Phone (Primary)</label><input type="text"
                                            name="contact_phone" class="form-control"
                                            value="{{ $settings['contact_phone'] ?? '' }}"
                                            placeholder="+91 98765 43210"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Phone (Secondary)</label><input type="text"
                                            name="contact_phone2" class="form-control"
                                            value="{{ $settings['contact_phone2'] ?? '' }}"
                                            placeholder="+91 87654 32109"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Support Email</label><input type="email"
                                            name="contact_email" class="form-control"
                                            value="{{ $settings['contact_email'] ?? '' }}"
                                            placeholder="support@company.com"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>WhatsApp Number</label><input type="text"
                                            name="contact_whatsapp" class="form-control"
                                            value="{{ $settings['contact_whatsapp'] ?? '' }}"
                                            placeholder="+91 98765 43210"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label>Address (Full)</label><textarea
                                            name="contact_address" class="form-control"
                                            rows="3">{{ $settings['contact_address'] ?? '' }}</textarea></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>City</label><input type="text" name="contact_city"
                                            class="form-control" value="{{ $settings['contact_city'] ?? '' }}"
                                            placeholder="Mumbai"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Country</label><input type="text"
                                            name="contact_country" class="form-control"
                                            value="{{ $settings['contact_country'] ?? '' }}" placeholder="India"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Google Maps URL</label><input type="text"
                                            name="contact_map_url" class="form-control"
                                            value="{{ $settings['contact_map_url'] ?? '' }}"
                                            placeholder="https://maps.google.com/..."></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Working Hours</label><input type="text"
                                            name="working_hours" class="form-control"
                                            value="{{ $settings['working_hours'] ?? '' }}"
                                            placeholder="Mon - Sat: 9:00 AM - 6:00 PM"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">Save Contact Details</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: Social Media -->
            <div id="stab-content-social" class="settings-tab">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Social Media Links <span>| Online Presence</span></h5>
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="row" style="gap:0;">
                                <div class="col-md-6">
                                    <div class="form-group"><label>LinkedIn</label><input type="url"
                                            name="social_linkedin" class="form-control"
                                            value="{{ $settings['social_linkedin'] ?? '' }}"
                                            placeholder="https://linkedin.com/company/..."></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Facebook</label><input type="url"
                                            name="social_facebook" class="form-control"
                                            value="{{ $settings['social_facebook'] ?? '' }}"
                                            placeholder="https://facebook.com/..."></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Instagram</label><input type="url"
                                            name="social_instagram" class="form-control"
                                            value="{{ $settings['social_instagram'] ?? '' }}"
                                            placeholder="https://instagram.com/..."></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Twitter / X</label><input type="url"
                                            name="social_twitter" class="form-control"
                                            value="{{ $settings['social_twitter'] ?? '' }}"
                                            placeholder="https://twitter.com/..."></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>YouTube</label><input type="url"
                                            name="social_youtube" class="form-control"
                                            value="{{ $settings['social_youtube'] ?? '' }}"
                                            placeholder="https://youtube.com/..."></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>WhatsApp Link</label><input type="url"
                                            name="social_whatsapp" class="form-control"
                                            value="{{ $settings['social_whatsapp'] ?? '' }}"
                                            placeholder="https://wa.me/919876543210"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">Save Social Links</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: SEO & Meta -->
            <div id="stab-content-seo" class="settings-tab">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">SEO &amp; Meta Tags <span>| Search Engine</span></h5>
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="form-group"><label>Meta Title</label><input type="text" name="meta_title"
                                    class="form-control" value="{{ $settings['meta_title'] ?? '' }}"
                                    placeholder="Capstone Global | IT Solutions"></div>
                            <div class="form-group"><label>Meta Description</label><textarea name="meta_description"
                                    class="form-control" rows="3">{{ $settings['meta_description'] ?? '' }}</textarea>
                            </div>
                            <div class="form-group"><label>Meta Keywords</label><input type="text" name="meta_keywords"
                                    class="form-control" value="{{ $settings['meta_keywords'] ?? '' }}"
                                    placeholder="IT services, consulting, India"></div>
                            <div class="form-group"><label>Google Analytics ID</label><input type="text"
                                    name="google_analytics_id" class="form-control"
                                    value="{{ $settings['google_analytics_id'] ?? '' }}" placeholder="G-XXXXXXXXXX">
                            </div>
                            <div class="form-group"><label>Facebook Pixel ID</label><input type="text"
                                    name="facebook_pixel_id" class="form-control"
                                    value="{{ $settings['facebook_pixel_id'] ?? '' }}" placeholder="1234567890"></div>
                            <button type="submit" class="btn-primary">Save SEO Settings</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: Appearance -->
            <div id="stab-content-appearance" class="settings-tab">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Appearance <span>| Site Look &amp; Feel</span></h5>
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div
                                style="background:#f6f9ff; border-radius:8px; padding:20px; margin-bottom:25px; border:1px solid var(--border);">
                                <p style="font-weight:700; color:var(--heading); margin-bottom:15px; font-size:14px;">
                                    Site Color Palette - changes reflect on homepage after save</p>
                                <div class="row" style="gap:0;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Primary / Accent Color</label>
                                            <div style="display:flex; gap:10px; align-items:center;">
                                                <input type="color" name="color_primary"
                                                    value="{{ $settings['color_primary'] ?? '#2bbfbf' }}"
                                                    style="width:48px;height:40px;border:1px solid #ced4da;border-radius:4px;cursor:pointer;padding:2px;"
                                                    oninput="this.nextElementSibling.value=this.value">
                                                <input type="text" value="{{ $settings['color_primary'] ?? '#2bbfbf' }}"
                                                    class="form-control" style="flex:1;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Dark / Heading Color</label>
                                            <div style="display:flex; gap:10px; align-items:center;">
                                                <input type="color" name="color_dark"
                                                    value="{{ $settings['color_dark'] ?? '#1a1a2e' }}"
                                                    style="width:48px;height:40px;border:1px solid #ced4da;border-radius:4px;cursor:pointer;padding:2px;"
                                                    oninput="this.nextElementSibling.value=this.value">
                                                <input type="text" value="{{ $settings['color_dark'] ?? '#1a1a2e' }}"
                                                    class="form-control" style="flex:1;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Page Background</label>
                                            <div style="display:flex; gap:10px; align-items:center;">
                                                <input type="color" name="color_bg"
                                                    value="{{ $settings['color_bg'] ?? '#f2f2f2' }}"
                                                    style="width:48px;height:40px;border:1px solid #ced4da;border-radius:4px;cursor:pointer;padding:2px;"
                                                    oninput="this.nextElementSibling.value=this.value">
                                                <input type="text" value="{{ $settings['color_bg'] ?? '#f2f2f2' }}"
                                                    class="form-control" style="flex:1;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Button Color</label>
                                            <div style="display:flex; gap:10px; align-items:center;">
                                                <input type="color" name="color_btn"
                                                    value="{{ $settings['color_btn'] ?? '#1a2540' }}"
                                                    style="width:48px;height:40px;border:1px solid #ced4da;border-radius:4px;cursor:pointer;padding:2px;"
                                                    oninput="this.nextElementSibling.value=this.value">
                                                <input type="text" value="{{ $settings['color_btn'] ?? '#1a2540' }}"
                                                    class="form-control" style="flex:1;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="gap:0;">
                                <div class="col-md-6">
                                    <div class="form-group"><label>Hero Banner Title</label><input type="text"
                                            name="hero_tagline" class="form-control"
                                            value="{{ $settings['hero_tagline'] ?? '' }}"
                                            placeholder="e.g. Welcome to Capstone Global"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Hero Button Text</label><input type="text"
                                            name="hero_btn_text" class="form-control"
                                            value="{{ $settings['hero_btn_text'] ?? '' }}"
                                            placeholder="e.g. Get Started"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label>Hero Headline</label><textarea name="hero_headline"
                                            class="form-control"
                                            rows="2">{{ $settings['hero_headline'] ?? '' }}</textarea></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label>Hero Subtext</label><textarea name="hero_subtext"
                                            class="form-control"
                                            rows="2">{{ $settings['hero_subtext'] ?? '' }}</textarea></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label>About Section Text</label><textarea
                                            name="about_description" class="form-control"
                                            rows="4">{{ $settings['about_description'] ?? '' }}</textarea></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Footer Note</label><input type="text"
                                            name="footer_note" class="form-control"
                                            value="{{ $settings['footer_note'] ?? '' }}"
                                            placeholder="e.g. Delivering excellence since 2015"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Maintenance Mode</label>
                                        <select name="maintenance_mode" class="form-control">
                                            <option value="off" {{ ($settings['maintenance_mode'] ?? 'off') == 'off' ? 'selected' : '' }}>Off (Site Live)</option>
                                            <option value="on" {{ ($settings['maintenance_mode'] ?? 'off') == 'on' ? 'selected' : '' }}>On (Under Maintenance)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">Save Appearance</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- EMAIL CONFIG -->
        <div id="email-settings-cms" class="cms-section pt-2">
            <div class="pagetitle">
                <h1>Email Config</h1>
                <div class="breadcrumb">System / Configuration</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SMTP Mail Configuration <span>| Credentials</span></h5>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="form-group"><label>Host</label><input type="text" name="mail_host"
                                class="form-control" value="{{ $settings['mail_host'] ?? '' }}"></div>
                        <div class="form-group"><label>Port</label><input type="text" name="mail_port"
                                class="form-control" value="{{ $settings['mail_port'] ?? '587' }}"></div>
                        <div class="form-group"><label>Username</label><input type="text" name="mail_username"
                                class="form-control" value="{{ $settings['mail_username'] ?? '' }}"></div>
                        <div class="form-group"><label>Password</label><input type="password" name="mail_password"
                                class="form-control" value="{{ $settings['mail_password'] ?? '' }}"></div>
                        <div class="form-group"><label>Recipient</label><input type="email" name="mail_to_address"
                                class="form-control" value="{{ $settings['mail_to_address'] ?? '' }}"></div>
                        <button type="submit" class="btn-primary">Update Email Config</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function switchSettingsTab(tab) {
            document.querySelectorAll('.settings-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.stab').forEach(b => b.classList.remove('stab-active'));
            document.getElementById('stab-content-' + tab).classList.add('active');
            document.getElementById('stab-' + tab).classList.add('stab-active');
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        function switchSection(sectionId, el) {
            document.querySelectorAll('.cms-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));

            document.getElementById(sectionId).classList.add('active');
            if (el) el.classList.add('active');
            
            sessionStorage.setItem('activeCmsSection', sectionId);

            if (window.innerWidth <= 1199) {
                document.getElementById('sidebar').classList.remove('active');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);
            let activeSection = sessionStorage.getItem('activeCmsSection');
            
            // If paginating, force the inquiries tab
            if(params.has('page')) {
                activeSection = 'messages-cms';
            }

            if (activeSection) {
                const links = document.querySelectorAll('.nav-link');
                links.forEach(l => {
                    const onclickAttr = l.getAttribute('onclick');
                    if(onclickAttr && onclickAttr.includes("switchSection('" + activeSection + "'")) {
                        switchSection(activeSection, l);
                    }
                });
            }
        });
    </script>
</body>

</html>