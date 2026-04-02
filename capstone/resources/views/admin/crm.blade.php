<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capstone Admin CMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2bbfbf;
            --navy: #1a1a2e;
            --white: #ffffff;
            --light-bg: #f4f7fa;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --sidebar-width: 260px;
            --header-height: 70px;
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            position: relative;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--light-bg);
            color: var(--text-main);
            line-height: 1.5;
        }

        .layout {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar */
        aside {
            width: var(--sidebar-width);
            background: var(--navy);
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 1000;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-brand {
            padding: 25px 30px;
            font-size: 1.5rem;
            font-weight: 800;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-brand span {
            color: var(--primary);
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 12px 20px;
            margin-bottom: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 0.95rem;
            color: #94a3b8;
        }

        .sidebar-menu li:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .sidebar-menu li.active {
            background: var(--primary);
            color: #fff;
        }

        /* Main Content */
        main {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 40px;
            min-width: 0;
            transition: margin 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            background: var(--white);
            padding: 20px 40px;
            margin: -40px -40px 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .mobile-header {
            display: none;
            background: var(--white);
            padding: 10px 20px;
            margin: 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1100;
            height: 60px;
        }

        .mobile-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.2rem;
            font-weight: 800;
        }

        .mobile-brand span {
            color: var(--primary);
        }

        .menu-toggle {
            cursor: pointer;
            padding: 5px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--navy);
            transition: 0.3s;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-info {
            text-align: right;
        }

        .profile-info span {
            display: block;
            font-size: 0.85rem;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eee;
            border: 2px solid var(--border);
        }

        /* Widgets */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            padding: 20px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s ease;
        }

        .stat-info h3 {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .stat-info p {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--navy);
            line-height: 1.2;
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            flex-shrink: 0;
            background: rgba(43, 191, 191, 0.12);
            color: var(--primary);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            transition: 0.3s;
        }

        /* Tabs Content */
        .cms-section {
            display: none;
        }

        .cms-section.active {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--navy);
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-muted);
        }

        .form-control {
            width: 100%;
            max-width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            box-sizing: border-box;
            resize: vertical;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(43, 191, 191, 0.1);
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px;
            color: var(--text-muted);
            font-size: 0.85rem;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--border);
            font-size: 0.95rem;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-success {
            background: #dcfce7;
            color: #15803d;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        /* Media Manager Mockup */
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
        }

        .media-item:hover {
            border-color: var(--primary);
        }

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 990;
            display: none;
            opacity: 0;
            transition: 0.3s;
        }

        /* Responsive Breakpoints */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 991px) {
            aside {
                transform: translateX(-100%);
            }

            .sidebar-open aside {
                transform: translateX(0);
            }

            .sidebar-open .sidebar-overlay {
                display: block;
                opacity: 1;
            }

            main {
                margin-left: 0;
                padding: 25px;
                padding-top: 85px; /* Compesate for fixed header */
            }

            .header-bar {
                display: none;
            }

            .mobile-header {
                display: flex;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .card {
                padding: 20px;
            }

            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-info p {
                font-size: 1.5rem;
            }

            .sidebar-brand {
                padding: 20px;
            }

            .cms-section h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <div class="layout">
        <aside id="sidebar">
            <div class="sidebar-brand">
                <div>Capstone</div>
                <div class="menu-toggle" style="color: #fff;" onclick="toggleSidebar()">
                    <span style="background: #fff;"></span>
                    <span style="background: #fff;"></span>
                    <span style="background: #fff;"></span>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="active" onclick="switchSection('dashboard', this)">Dashboard</li>
                    <li onclick="switchSection('home-cms', this)">Home Page</li>
                    <li onclick="switchSection('about-cms', this)">About</li>
                    <li onclick="switchSection('services-cms', this)">Services</li>
                    <li onclick="switchSection('projects-cms', this)">Projects</li>
                    <li onclick="switchSection('clients-cms', this)">Clients</li>
                    <li onclick="switchSection('messages-cms', this)">Contact Messages</li>
                    <li onclick="switchSection('media-cms', this)">Media Library</li>
                    <li onclick="switchSection('settings-cms', this)">Settings</li>
                    <li style="margin-top: 50px; color: #ef4444;">Logout</li>
                </ul>
            </div>
        </aside>

        <main>
            <div class="mobile-header">
                <div class="menu-toggle" onclick="toggleSidebar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="mobile-brand">
                    Capstone
                </div>
                <div class="profile-img" style="width: 32px; height: 32px; margin-right: 0;"></div>
            </div>
            <div class="header-bar">
                <h1>Administration</h1>
                <div class="admin-profile">
                    <span>Admin <strong>User</strong></span>
                    <div class="profile-img"></div>
                </div>
            </div>

            <!-- DASHBOARD SECTION -->
            <div id="dashboard" class="cms-section active">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">🛠️</div>
                        <div class="stat-info">
                            <h3>Total Services</h3>
                            <p>12</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🏗️</div>
                        <div class="stat-info">
                            <h3>Total Projects</h3>
                            <p>48</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-info">
                            <h3>Total Clients</h3>
                            <p>25</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">✉️</div>
                        <div class="stat-info">
                            <h3>Messages</h3>
                            <p>{{ count($leads) }}</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Recent Activity</h2>
                    </div>
                    <p style="color: #64748b;">No recent activities to show.</p>
                </div>
            </div>

            <!-- HOME PAGE CMS -->
            <div id="home-cms" class="cms-section">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">Manage Hero Content</h2></div>
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group"><label>Tagline (Top Label)</label><input type="text" name="hero_tagline" class="form-control" value="{{ $settings['hero_tagline'] ?? '' }}"></div>
                        <div class="form-group"><label>Main Headline (Use \n for new lines)</label><textarea name="hero_headline" class="form-control" rows="3">{{ $settings['hero_headline'] ?? '' }}</textarea></div>
                        <div class="form-group"><label>Hero Subtext</label><textarea name="hero_subtext" class="form-control" rows="3">{{ $settings['hero_subtext'] ?? '' }}</textarea></div>
                        <div class="form-group"><label>Button Label</label><input type="text" name="hero_btn_text" class="form-control" value="{{ $settings['hero_btn_text'] ?? '' }}"></div>
                        
                        <div class="form-group">
                            <label>Update Hero Images (3D Cube Faces)</label>
                            <input type="file" class="form-control" multiple>
                            <div class="media-grid" style="margin-top: 15px;">
                                <div class="media-item"><img src="{{ asset('images/office1.png') }}" style="width:100%; height:100%; object-fit:cover;"></div>
                                <div class="media-item"><img src="{{ asset('images/office2.png') }}" style="width:100%; height:100%; object-fit:cover;"></div>
                                <div class="media-item"><img src="{{ asset('images/office3.png') }}" style="width:100%; height:100%; object-fit:cover;"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Hero Updates</button>
                    </form>
                </div>
            </div>

            <!-- ABOUT PAGE CMS -->
            <div id="about-cms" class="cms-section">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">Edit About Content</h2></div>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="form-group"><label>Core Description (Who We Are)</label><textarea name="about_description" class="form-control" rows="5">{{ $settings['about_description'] ?? '' }}</textarea></div>
                        <div class="form-group"><label>Our Mission Statement</label><textarea name="about_mission" class="form-control" rows="3">{{ $settings['about_mission'] ?? '' }}</textarea></div>
                        <div class="form-group"><label>Upload New Company Image</label><input type="file" class="form-control"></div>
                        <button type="submit" class="btn btn-primary">Update About Section</button>
                    </form>
                </div>
            </div>

            <!-- SERVICES CMS -->
            <div id="services-cms" class="cms-section">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">Add New Service</h2></div>
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="grid-2">
                            <div class="form-group"><label>Service Title</label><input type="text" name="title" class="form-control" required></div>
                            <div class="form-group"><label>Service Number/Icon</label><input type="text" name="icon" class="form-control" placeholder="E.g. 09 or ⚙️"></div>
                        </div>
                        <div class="form-group"><label>Description</label><textarea name="description" class="form-control" rows="3" required></textarea></div>
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header"><h2 class="card-title">Existing Services</h2></div>
                    @if(count($services) > 0)
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr><th>#</th><th>Title</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->icon }}</td>
                                    <td><strong>{{ $service->title }}</strong></td>
                                    <td>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" style="background:none; border:none; color:#ef4444; font-weight:700; cursor:pointer;" onclick="return confirm('Delete this service?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

            <!-- PROJECTS CMS -->
            <div id="projects-cms" class="cms-section">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">Add New Project</h2></div>
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                            <div class="form-group"><label>Project Title</label><input type="text" name="title" class="form-control" required></div>
                            <div class="form-group"><label>Category</label><input type="text" name="category" class="form-control" placeholder="E.g. Commercial"></div>
                        </div>
                        <div class="form-group"><label>Project Image</label><input type="file" name="image" class="form-control"></div>
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </form>
                </div>
                <div class="card">
                    <h2 class="card-title" style="margin-bottom:20px;">Active Portfolio</h2>
                    <div class="media-grid" style="grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));">
                        @foreach($projects as $project)
                        <div class="card" style="padding: 10px; border: 1px solid var(--border); box-shadow: none;">
                            <div style="height: 100px; background: #eee; border-radius: 8px; margin-bottom: 10px; overflow:hidden;">
                                @if($project->image)
                                <img src="{{ asset('images/'.$project->image) }}" style="width:100%; height:100%; object-fit:cover;">
                                @endif
                            </div>
                            <h4 style="font-size: 0.9rem;">{{ $project->title }}</h4>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="margin-top:10px;">
                                @csrf @method('DELETE')
                                <button type="submit" style="color:#ef4444; font-size:0.7rem; background:none; border:none; font-weight:700; cursor:pointer;">Remove</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- CLIENTS CMS -->
            <div id="clients-cms" class="cms-section">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">Manage Clients</h2></div>
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" style="margin-bottom:30px;">
                        @csrf
                        <div class="form-group"><label>Client Name</label><input type="text" name="name" class="form-control" required></div>
                        <div class="form-group"><label>Client Logo</label><input type="file" name="logo" class="form-control"></div>
                        <button type="submit" class="btn btn-primary">Add Client Logo</button>
                    </form>
                    <div class="media-grid" style="grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));">
                        @foreach($clients as $client)
                        <div class="media-item" style="border: 1px solid var(--border); background: #fff; padding: 10px; display: flex; flex-direction:column; align-items: center; justify-content: center;">
                            <span style="font-size: 0.7rem; font-weight: 700;">{{ $client->name }}</span>
                            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="margin-top:10px;">
                                @csrf @method('DELETE')
                                <button type="submit" style="color:red; font-size:0.6rem; border:none; background:none; cursor:pointer;">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- CONTACT MESSAGES -->
            <div id="messages-cms" class="cms-section">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Website Inquiries</h2>
                    </div>
                    @if(count($leads) > 0)
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact Info</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)
                                        <tr>
                                            <td><strong>{{ $lead->name }}</strong></td>
                                            <td>
                                                <div style="font-size: 0.9rem;">{{ $lead->email }}</div>
                                                <div style="color: #64748b; font-size: 0.8rem;">{{ $lead->phone }}</div>
                                            </td>
                                            <td><span class="badge badge-success">{{ $lead->service ?? 'General' }}</span></td>
                                            <td style="color: #64748b; white-space: nowrap;">{{ $lead->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <button class="btn btn-primary" style="padding: 6px 12px; font-size: 0.8rem;"
                                                    onclick="alert('Inquiry Details:\nName: {{ $lead->name }}\nMessage: {{ $lead->message }}')">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <p>No contact messages have been received through the website yet.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- MEDIA LIBRARY -->
            <div id="media-cms" class="cms-section">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Media Manager (Site Assets)</h2>
                        <button class="btn btn-primary">Upload Images</button>
                    </div>
                    @if(count($media) > 0)
                    <div class="media-grid">
                        @foreach($media as $image)
                        <div class="media-item">
                            <img src="{{ asset('images/' . $image) }}" style="width:100%; height:100%; object-fit:cover;">
                            <div style="position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.5); color:#fff; font-size:0.6rem; padding:4px; text-overflow:ellipsis; overflow:hidden; white-space:nowrap;">
                                {{ $image }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="empty-state">
                        <p>No images found in your media directory.</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- SETTINGS CMS -->
            <div id="settings-cms" class="cms-section">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">General Website Settings</h2></div>
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group"><label>Website Branding Name</label><input type="text" name="site_title" class="form-control" value="{{ $settings['site_title'] ?? 'Capstone Global Services' }}"></div>
                        
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                            <div class="form-group"><label>Official Business Email</label><input type="email" name="site_email" class="form-control" value="{{ $settings['site_email'] ?? 'info@capstoneglobalservices.com' }}"></div>
                            <div class="form-group"><label>Official Phone Number</label><input type="text" name="site_phone" class="form-control" value="{{ $settings['site_phone'] ?? '+91 000 000 0000' }}"></div>
                        </div>

                        <div class="form-group"><label>Main Office Address</label><textarea name="site_address" class="form-control" rows="2">{{ $settings['site_address'] ?? 'Unit No. 123, Global Tech Park, Chennai, India.' }}</textarea></div>
                        
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                            <div class="form-group"><label>LinkedIn Company URL</label><input type="url" name="site_linkedin" class="form-control" value="{{ $settings['site_linkedin'] ?? 'https://linkedin.com/company/capstone' }}"></div>
                            <div class="form-group"><label>Instagram Profile URL</label><input type="url" name="site_instagram" class="form-control" value="{{ $settings['site_instagram'] ?? '' }}"></div>
                        </div>

                        <div class="form-group">
                            <label>Site Branding Color (Theme Header/Footer)</label>
                            <input type="color" name="site_theme_color" value="{{ $settings['site_theme_color'] ?? '#2bbfbf' }}" style="height: 50px; width: 100px; padding: 5px; border: 1px solid var(--border); border-radius: 8px; cursor: pointer;">
                        </div>

                        <div class="form-group">
                            <label>Update Website Logo (Dark Theme Version)</label>
                            <input type="file" name="site_logo" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Save All Settings</button>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.body.classList.toggle('sidebar-open');
        }

        function switchSection(sectionId, el) {
            // Remove active classes
            document.querySelectorAll('.cms-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.sidebar-menu li').forEach(l => l.classList.remove('active'));

            // Set current active
            document.getElementById(sectionId).classList.add('active');
            el.classList.add('active');

            // Close sidebar on mobile after selection
            if (window.innerWidth <= 991) {
                toggleSidebar();
            }
        }
    </script>
</body>

</html>