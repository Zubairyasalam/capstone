<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capstone Global Services India Private Limited</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Dynamic Theme Variables from Admin Settings -->
    <style>
        :root {
            --color-primary:
                {{ $settings['color_primary'] ?? '#2bbfbf' }}
            ;
            --color-dark:
                {{ $settings['color_dark'] ?? '#1a1a2e' }}
            ;
            --color-bg:
                {{ $settings['color_bg'] ?? '#f2f2f2' }}
            ;
            --color-btn:
                {{ $settings['color_btn'] ?? '#1a2540' }}
            ;
            --color-accent:
                {{ $settings['color_accent'] ?? '#2bbfbf' }}
            ;
        }

        html,
        body {
            background: var(--color-bg) !important;
        }
    </style>
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            font-family: 'Inter', sans-serif;
            background: #f2f2f2;
            color: #333;
            overflow-x: hidden;
            width: 100%;
            position: relative;
        }

        html {
            scroll-behavior: smooth;
        }

        /* ════════════════════════════
           HEADER / NAV
        ════════════════════════════ */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 15px 8%;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            height: 80px;
        }

        .logo-wrap {
            justify-self: start;
        }

        nav {
            justify-self: center;
        }

        .mobile-toggle {
            justify-self: end;
        }

        .logo-wrap {}

        .logo-top {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--color-dark);
            letter-spacing: -0.02em;
            line-height: 1;
            display: flex;
            align-items: center;
        }

        .logo-top span {
            font-weight: 400;
            color: var(--color-primary);
        }

        .logo-sub {
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #999;
            margin-top: 2px;
        }

        nav {
            display: flex;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 500;
            color: #6c757d;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            transition: color .25s;
        }

        nav a.active,
        nav a:hover {
            color: var(--color-primary);
        }

        .nav-icon {
            color: var(--color-primary);
        }

        /* ════════════════════════════
           HERO SECTION
        ════════════════════════════ */
        .hero {
            min-height: 500px;
            display: flex;
            align-items: center;
            padding-top: 72px;
            overflow: hidden;
        }

        .hero-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            width: 100%;
            padding: 0 8%;
            gap: 40px;
        }

        /* ── LEFT TEXT ── */
        .hero-text {
            animation: fadeUp .9s ease both .1s;
        }

        .hero-tagline {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--color-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hero-tagline::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--color-primary);
        }

        .hero-h1 {
            font-size: clamp(2.8rem, 4vw, 4.2rem);
            font-weight: 700;
            color: #2d3748;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .hero-h1 strong {
            font-weight: 700;
            display: block;
            white-space: nowrap;
        }

        .hero-sub {
            font-size: 1rem;
            color: #8a9ab0;
            line-height: 1.75;
            max-width: 480px;
            margin-bottom: 2.5rem;
        }

        .hero-btns {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            padding: .8rem 2rem;
            background: var(--color-btn);
            color: #fff;
            border: none;
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: none;
            transition: background .25s, transform .2s;
        }

        .btn-primary:hover {
            background: var(--color-primary);
            transform: translateY(-2px);
        }

        .btn-outline {
            padding: .8rem 2rem;
            background: transparent;
            color: #555;
            border: 1.5px solid #bbb;
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: none;
            transition: border-color .25s, color .25s, transform .2s;
        }

        .btn-outline:hover {
            border-color: #1E73BE;
            color: #1E73BE;
            transform: translateY(-2px);
        }

        /* ── RIGHT — 3D rotating cube (rectangular prism) ── */
        .hero-carousel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 520px;
        }

        /* Perspective wrapper */
        .cube-scene {
            perspective: 1100px;
            perspective-origin: 50% 45%;
        }

        /*
          Rectangular prism: W=280px, H=400px, Depth=280px
          Front/Back faces: 280×400, translateZ = 140px
          Left/Right faces: 280×400 wide, rotateY ±90deg, translateZ = 140px
          Top face:  280×280, rotateX(-90deg), translateY(-200px)
        */
        .cube {
            width: 280px;
            height: 400px;
            position: relative;
            transform-style: preserve-3d;
            animation: rotateCube 10s linear infinite;
        }

        @keyframes rotateCube {
            from {
                transform: rotateX(-10deg) rotateY(0deg);
            }

            to {
                transform: rotateX(-10deg) rotateY(360deg);
            }
        }

        /* Pause on hover */
        .cube-scene:hover .cube {
            animation-play-state: paused;
        }

        .cube-face {
            position: absolute;
            overflow: hidden;
            border: 8px solid #fff;
            border-radius: 10px;
            backface-visibility: hidden;
        }

        .cube-face img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Front & Back: full W×H, pushed ±140px on Z */
        .face-front,
        .face-back {
            width: 280px;
            height: 400px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.22);
        }

        .face-front {
            transform: translateZ(140px);
        }

        .face-back {
            transform: rotateY(180deg) translateZ(140px);
        }

        /* Left & Right: same H, width = depth = 280px */
        .face-left,
        .face-right {
            width: 280px;
            height: 400px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.18);
        }

        .face-right {
            transform: rotateY(90deg) translateZ(140px);
        }

        .face-left {
            transform: rotateY(-90deg) translateZ(140px);
        }

        /* Top face: W × Depth = 280×280 */
        .face-top {
            width: 280px;
            height: 280px;
            top: 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            transform: rotateX(90deg) translateZ(200px);
        }

        /* Ground shadow ellipse */
        .cube-shadow {
            width: 300px;
            height: 36px;
            background: radial-gradient(ellipse, rgba(0, 0, 0, 0.18) 0%, transparent 70%);
            margin-top: 18px;
        }

        /* ════════════════════════════
           KEYFRAMES
        ════════════════════════════ */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── ABOUT US SECTION ── */
        .about-section {
            padding: 80px 8%;
            background: #fbfbfb;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .about-image-scatter {
            position: relative;
            height: 550px;
            width: 100%;
            overflow: hidden;
        }

        .scatter-img {
            position: absolute;
            width: 70%;
            border-radius: 12px;
            border: 8px solid #fff;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.12);
            transition: all 0.4s ease;
            object-fit: cover;
        }

        .img-1 {
            top: 0;
            left: 0;
            z-index: 4;
            transform: rotate(-5deg);
            width: 65%;
            height: 260px;
        }

        .img-2 {
            top: 12%;
            right: 0;
            z-index: 3;
            transform: rotate(4deg);
            width: 60%;
            height: 240px;
        }

        .img-3 {
            bottom: 8%;
            left: 5%;
            z-index: 2;
            transform: rotate(-2deg);
            width: 65%;
            height: 250px;
        }

        .img-4 {
            bottom: 0;
            right: -8%;
            z-index: 1;
            transform: rotate(10deg);
            width: 60%;
            height: 230px;
            opacity: 0.4;
        }

        .about-content {
            padding-left: 40px;
        }

        .about-tag-wrap {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .about-line {
            width: 40px;
            height: 2px;
            background: var(--color-primary);
        }

        .about-tag {
            color: var(--color-primary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
        }

        .about-title {
            font-size: 4.2rem;
            font-weight: 800;
            color: var(--color-dark);
            margin-bottom: 40px;
            line-height: 1.1;
        }

        .about-text-lead {
            font-size: 1.15rem;
            color: #1a1a1a;
            font-weight: 700;
            line-height: 1.7;
            margin-bottom: 30px;
            padding-left: 20px;
            border-left: 3px solid #eee;
        }

        .about-text {
            font-size: 1.1rem;
            color: #777;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .btn-navy {
            background: var(--color-dark);
            color: #fff;
            padding: 16px 40px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .btn-navy:hover {
            background: var(--color-primary);
        }

        /* ── MISSION & VISION ── */
        .mv-section {
            padding: 80px 8%;
            background: #fff;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
        }

        .mv-card {
            padding-top: 40px;
            border-top: 3px solid #eee;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .mv-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: 0;
            width: 100%;
            height: 4px;
            background: #2bbfbf;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
            z-index: 5;
        }

        .mv-card.active::before {
            opacity: 1;
            transform: translateY(0);
        }

        .mv-card.active .mv-num {
            color: #2bbfbf;
            transform: scale(1.1);
        }

        .mv-num {
            color: var(--color-primary);
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: block;
            transition: all 0.3s ease;
        }

        .mv-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 30px;
        }

        .mv-title span {
            font-weight: 400;
            color: #777;
        }

        .mv-text {
            color: #666;
            line-height: 1.9;
            font-size: 1rem;
        }

        /* ── WHY CAPSTONE ── */
        .why-section {
            padding: 80px 8% 40px;
            background: #fbfbfb;
        }

        /* ── WHY BANNER ── */
        .why-banner {
            background: #fff;
            border-radius: 40px;
            padding: 60px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 40px 120px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
        }

        .why-banner::after {
            content: '';
            position: absolute;
            right: -50px;
            bottom: -50px;
            width: 300px;
            height: 300px;
            border: 50px solid #f9f9f9;
            border-radius: 50%;
            z-index: 1;
        }

        .why-left {
            width: 35%;
            position: relative;
            z-index: 2;
        }

        .why-title {
            font-size: 4.5rem;
            font-weight: 800;
            color: var(--color-dark);
            line-height: 1.1;
            margin-bottom: 15px;
        }

        .why-tag {
            border-left: 3px solid var(--color-primary);
            padding-left: 20px;
            color: var(--color-primary);
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .why-grid {
            width: 55%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px 60px;
            position: relative;
            z-index: 2;
        }

        .why-item {
            display: flex;
            align-items: center;
            gap: 20px;
            color: #1a1a2e;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .check-icon {
            width: 24px;
            height: 24px;
            background: #e0f6f6;
            color: var(--color-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        /* ── SERVICES SECTION ── */
        .services-section {
            padding: 40px 8% 20px;
            background: #fff;
            text-align: center;
        }

        .services-header {
            margin-bottom: 80px;
        }

        .services-tag {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            color: var(--color-primary);
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.85rem;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        .services-tag::before,
        .services-tag::after {
            content: '';
            width: 50px;
            height: 2px;
            background: var(--color-primary);
        }

        .services-title {
            font-size: 4rem;
            font-weight: 800;
            color: var(--color-dark);
            line-height: 1.1;
        }

        .services-title span {
            font-weight: 300;
            color: #555;
            display: block;
            margin-bottom: 10px;
            font-size: 3rem;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .service-card {
            background: #fbfbfb;
            border-radius: 20px;
            padding: 50px 30px;
            text-align: left;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: #fff;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.06);
        }

        .service-num {
            font-size: 2.5rem;
            font-weight: 800;
            color: #eee;
            margin-bottom: 25px;
            display: block;
            transition: color 0.4s ease;
        }

        .service-card:hover .service-num {
            color: #e0f6f6;
        }

        .service-card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 30px;
            min-height: 3.5rem;
            line-height: 1.3;
        }

        .service-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .service-list li {
            position: relative;
            padding-left: 20px;
            color: #666;
            margin-bottom: 15px;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .service-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 10px;
            width: 8px;
            height: 2px;
            background: var(--color-primary);
        }

        /* ── CAPABILITIES ── */
        .cap-section {
            padding: 20px 8%;
            background: #fff;
        }

        .cap-banner {
            background: linear-gradient(135deg, #1a1a2e 0%, #0f0f1a 100%);
            border-radius: 30px;
            padding: 50px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.12);
        }

        .cap-left {
            width: 35%;
        }

        .cap-icon-wrap {
            width: 40px;
            height: 40px;
            background: rgba(43, 191, 191, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            border: 1px solid rgba(43, 191, 191, 0.3);
        }

        .cap-icon {
            color: #2bbfbf;
            font-size: 1rem;
        }

        .cap-title {
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 15px;
        }

        .cap-title span {
            color: #2bbfbf;
        }

        .cap-tag {
            color: #777;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .cap-grid {
            width: 60%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px 30px;
        }

        .cap-item {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 0.95rem;
            color: #ddd;
        }

        .cap-check {
            width: 18px;
            height: 18px;
            background: rgba(43, 191, 191, 0.2);
            color: #2bbfbf;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            flex-shrink: 0;
        }

        /* ── WHO WE SERVE ── */
        .serve-section {
            padding: 20px 8% 80px;
            background: #fbfbfb;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .serve-left {
            width: 45%;
        }

        .serve-tag {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #777;
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.7rem;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .serve-tag::before {
            content: '';
            width: 20px;
            height: 1px;
            background: #333;
        }

        .serve-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 25px;
            line-height: 1.15;
        }

        .serve-text {
            color: #888;
            margin-bottom: 30px;
            font-size: 0.95rem;
            padding-left: 12px;
            border-left: 2px solid #eee;
        }

        .client-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 15px;
        }

        .client-chip {
            background: #fff;
            padding: 14px 20px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #333;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chip-dot {
            width: 5px;
            height: 5px;
            background: #2bbfbf;
            border-radius: 50%;
        }

        .commitment-card {
            width: 55%;
            background: #1a1a2e;
            border-radius: 30px;
            padding: 40px;
            color: #fff;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.18);
            text-align: left;
        }

        .comm-header {
            margin-bottom: 50px;
        }

        .comm-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .comm-title span {
            color: #2bbfbf;
        }

        .comm-sub {
            color: #888;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .comm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .comm-item {}

        .comm-num {
            color: #2bbfbf;
            font-weight: 700;
            font-size: 0.75rem;
            margin-bottom: 12px;
            display: block;
            opacity: 0.6;
        }

        .comm-name {
            font-weight: 700;
            font-size: 1.1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 15px;
            display: block;
        }

        .comm-item:last-child .comm-name {
            border-bottom: none;
            padding-bottom: 0;
        }

        /* ── CLIENT TICKER ── */
        .client-ticker {
            padding: 60px 0;
            background: #fff;
            overflow: hidden;
            border-top: 1px solid #f2f2f2;
            border-bottom: 1px solid #f2f2f2;
            position: relative;
        }

        .ticker-inner {
            display: flex;
            width: fit-content;
            animation: ticker-slide 30s linear infinite;
        }

        .ticker-group {
            display: flex;
            align-items: center;
            gap: 120px;
            padding-right: 120px;
        }

        .ticker-logo {
            filter: grayscale(1);
            transition: all 0.3s ease;
            white-space: nowrap;
            user-select: none;
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #ddd;
        }

        .ticker-logo:hover {
            filter: grayscale(0);
            transform: scale(1.08);
        }

        /* ── Stylized Logos ── */
        .logo-ibm {
            font-family: sans-serif;
            letter-spacing: -1px;
            font-weight: 900;
            background: linear-gradient(to bottom, transparent 15%, #ddd 15%, #ddd 25%, transparent 25%, transparent 35%, #ddd 35%, #ddd 45%, transparent 45%, transparent 55%, #ddd 55%, #ddd 65%, transparent 65%, transparent 75%, #ddd 75%, #ddd 85%, transparent 85%);
            -webkit-background-clip: text;
            color: transparent;
        }

        .ticker-logo:hover .logo-ibm {
            background: linear-gradient(to bottom, transparent 15%, #006699 15%, #006699 25%, transparent 25%, transparent 35%, #006699 35%, #006699 45%, transparent 45%, transparent 55%, #006699 55%, #006699 65%, transparent 65%, transparent 75%, #006699 75%, #006699 85%, transparent 85%);
            -webkit-background-clip: text;
        }

        .logo-ms {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-family: 'Segoe UI', sans-serif;
        }

        .ms-icon {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px;
            width: 16px;
        }

        .ms-icon div {
            width: 7px;
            height: 7px;
            background: #ddd;
            transition: background 0.3s ease;
        }

        .ticker-logo:hover .logo-ms {
            color: #333;
        }

        .ticker-logo:hover .ms-1 {
            background: #f25022;
        }

        .ticker-logo:hover .ms-2 {
            background: #7fbb00;
        }

        .ticker-logo:hover .ms-3 {
            background: #00a1f1;
        }

        .ticker-logo:hover .ms-4 {
            background: #ffbb00;
        }

        .logo-google {
            font-weight: 600;
            letter-spacing: -1px;
        }

        .logo-google span {
            color: #ddd;
            transition: color 0.3s ease;
        }

        .ticker-logo:hover .logo-google span:nth-child(1) {
            color: #4285F4;
        }

        .ticker-logo:hover .logo-google span:nth-child(2) {
            color: #EA4335;
        }

        .ticker-logo:hover .logo-google span:nth-child(3) {
            color: #FBBC05;
        }

        .ticker-logo:hover .logo-google span:nth-child(4) {
            color: #4285F4;
        }

        .ticker-logo:hover .logo-google span:nth-child(5) {
            color: #34A853;
        }

        .ticker-logo:hover .logo-google span:nth-child(6) {
            color: #EA4335;
        }

        .logo-amazon {
            font-weight: 800;
            font-size: 1.3rem;
            letter-spacing: -0.5px;
            position: relative;
            color: #ddd;
            transition: color 0.3s ease;
            display: inline-block;
            padding-bottom: 5px;
        }

        .ticker-logo:hover .logo-amazon {
            color: #000;
        }

        .amz-smile {
            position: absolute;
            bottom: -8px;
            left: 2px;
            width: 100%;
            height: 12px;
            background: #ddd;
            -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 25'%3E%3Cpath d='M10 5 Q 50 25 90 5 Q 95 15 90 10 Q 50 30 10 10 z' fill='black'/%3E%3C/svg%3E") no-repeat center;
            mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 25'%3E%3Cpath d='M10 5 Q 50 25 90 5 Q 95 15 90 10 Q 50 30 10 10 z' fill='black'/%3E%3C/svg%3E") no-repeat center;
            transition: background 0.3s ease;
        }

        .ticker-logo:hover .amz-smile {
            background: #ff9900;
        }

        .logo-cisco {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            transition: color 0.3s ease;
        }

        .ticker-logo:hover .logo-cisco {
            color: #00bceb;
        }

        .cisco-bars {
            display: flex;
            align-items: flex-end;
            gap: 2px;
            height: 15px;
        }

        .cisco-bars div {
            width: 2px;
            background: #ddd;
            border-radius: 1px;
            transition: background 0.3s ease;
        }

        .b1 {
            height: 6px;
        }

        .b2 {
            height: 10px;
        }

        .b3 {
            height: 14px;
        }

        .b4 {
            height: 10px;
        }

        .b5 {
            height: 6px;
        }

        .ticker-logo:hover .cisco-bars div {
            background: #00bceb;
        }

        /* Oracle, Intel, Adobe colors */
        .logo-oracle,
        .logo-intel,
        .logo-adobe {
            transition: color 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .ticker-logo:hover .logo-oracle {
            color: #f80000;
            font-weight: 800;
            transform: skewX(-5deg);
        }

        .ticker-logo:hover .logo-intel {
            color: #0071c5;
            font-weight: 900;
        }

        .ticker-logo:hover .logo-adobe {
            color: #fa0f00;
            font-weight: 800;
        }

        @keyframes ticker-slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }




        /* ── MEDIA CENTRE ── */
        .media-section {
            padding: 100px 8%;
            background: #fff;
            color: #1a2540;
        }

        .media-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 60px;
        }

        .media-title-group h2 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 15px;
            letter-spacing: -1px;
        }

        .media-title-group p {
            color: #64748b;
            font-size: 1.1rem;
        }

        .visit-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1e40af;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: gap 0.3s ease;
        }

        .visit-link:hover {
            gap: 15px;
        }

        .media-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }

        .media-col-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 35px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Updates List */
        .update-item {
            display: flex;
            gap: 25px;
            margin-bottom: 35px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .update-item:hover {
            transform: translateX(10px);
        }

        .update-img {
            width: 120px;
            height: 90px;
            border-radius: 8px;
            object-fit: cover;
        }

        .update-content span {
            font-size: 0.7rem;
            font-weight: 800;
            color: #d97706;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 8px;
        }

        .update-content h4 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .update-date {
            font-size: 0.85rem;
            color: #94a3b8;
        }

        /* Thought Leadership Cards */
        .thought-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .thought-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .thought-card:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            transform: translateY(-8px);
        }

        .thought-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .thought-body {
            padding: 25px;
        }

        .thought-cat {
            font-size: 0.7rem;
            font-weight: 800;
            color: #1e40af;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: block;
        }

        .thought-card h4 {
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.4;
        }



        /* ── GALLERY ── */
        .gallery-section {
            padding: 60px 8%;
            background: #fff;
            text-align: center;
            overflow: hidden;
        }

        .gallery-header {
            margin-bottom: 40px;
        }

        .gallery-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .gallery-sub {
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 25px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .gallery-tabs {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .gallery-tab {
            padding: 14px 40px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .gallery-tab.active {
            background: #1a2540;
            color: #fff;
            border-color: #1a2540;
            box-shadow: 0 10px 25px rgba(26, 37, 64, 0.2);
        }

        .gallery-tab:not(.active):hover {
            border-color: #1a2540;
            color: #1a2540;
            transform: translateY(-2px);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
            width: 100%;
        }

        .gallery-img-wrap {
            border-radius: 25px;
            overflow: hidden;
            height: 400px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            transition: all 0.5s ease;
        }

        .gallery-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .gallery-img-wrap:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .gallery-img-wrap:hover img {
            transform: scale(1.1);
        }

        /* ── CTA ── */
        .cta-section {
            background: #1a1a2e;
            padding: 80px 8%;
            text-align: center;
        }

        .cta-title {
            font-size: 3.5rem;
            font-weight: 300;
            color: #f8fafc;
            margin-bottom: 40px;
        }

        .cta-title strong {
            font-weight: 700;
        }

        .btn-cta {
            background: #2bbfbf;
            color: #fff;
            padding: 18px 45px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-cta:hover {
            background: #1E73BE;
        }

        /* ── CONTACT ── */
        .contact-section {
            padding: 80px 8%;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .contact-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 10px;
        }

        .contact-sub {
            color: #8a9ab0;
            font-size: 1rem;
        }

        .contact-box {
            display: flex;
            width: 100%;
            max-width: 1000px;
            background: #f8fafc;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .contact-info {
            background: #1a2540;
            width: 40%;
            padding: 50px;
            color: #fff;
            position: relative;
        }

        .info-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .info-item {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.2rem;
        }

        .info-details h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .info-details p {
            font-size: 0.9rem;
            color: #cbd5e1;
            line-height: 1.5;
        }

        .contact-form {
            width: 60%;
            padding: 50px;
            background: #fff;
        }

        .form-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 30px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.95rem;
            color: #333;
            font-family: 'Inter', sans-serif;
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: #94a3b8;
        }

        .btn-submit {
            background: #1a2540;
            color: #fff;
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #2bbfbf;
        }



        /* ── FOOTER ── */
        .footer-section {
            background: #1a1a2e;
            /* Theme Dark Navy */
            padding: 100px 8% 40px;
            color: #94a3b8;
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 60px;
            margin-bottom: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .footer-logo-icon {
            width: 45px;
            height: 45px;
            background: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            color: #1a1a2e;
            font-size: 1.5rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 8px;
        }

        .footer-logo-icon svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .footer-logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
        }

        .footer-logo-text span {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 5px;
        }

        .footer-desc {
            font-size: 0.95rem;
            line-height: 1.8;
            margin-bottom: 30px;
            color: #aaa;
        }

        .footer-socials {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .social-icon:hover {
            background: #2bbfbf;
            border-color: #2bbfbf;
            transform: translateY(-5px);
        }

        .footer-col h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2bbfbf;
            /* Teal Headings */
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #aaa;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-links a::before {
            content: '›';
            font-size: 1.2rem;
            color: #2bbfbf;
        }

        .footer-links a:hover {
            color: #2bbfbf;
            padding-left: 8px;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
        }

        .footer-contact-item .icon {
            width: 36px;
            height: 36px;
            background: rgba(43, 191, 191, 0.1);
            color: #2bbfbf;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 0.9rem;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .footer-contact-item p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #aaa;
            margin: 0;
            overflow-wrap: break-word;
            word-break: break-word;
        }

        .footer-bottom {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 20px;
            font-size: 0.85rem;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin-top: 20px;
        }

        .footer-bottom p {
            color: #666;
            margin: 0;
        }

        .footer-bottom-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px 25px;
            max-width: 100%;
        }

        .footer-bottom-links a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.3s;
            position: relative;
            white-space: nowrap;
        }

        .footer-bottom-links a:hover {
            color: #2bbfbf;
        }

        .footer-bottom-links a::after {
            content: '•';
            position: absolute;
            right: -18px;
            color: #333;
            pointer-events: none;
        }

        .footer-bottom-links a:last-child::after {
            display: none;
        }

        /* ════════════════════════════
           MOBILE RESPONSIVENESS
        ════════════════════════════ */

        /* Hamburger Toggle */
        .mobile-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: 12px;
            background: #f8fafc;
            border-radius: 8px;
            cursor: pointer;
            z-index: 300;
            transition: background 0.3s;
            justify-self: end;
        }

        .mobile-toggle:hover {
            background: #edf2f7;
        }

        .mobile-toggle span {
            width: 22px;
            height: 2px;
            background: #1a2540;
            transition: 0.3s;
        }

        body.nav-open .mobile-toggle span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
            background: #2bbfbf;
        }

        body.nav-open .mobile-toggle span:nth-child(2) {
            opacity: 0;
        }

        body.nav-open .mobile-toggle span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
            background: #2bbfbf;
        }

        body.nav-open {
            overflow: hidden;
        }

        @media (max-width: 992px) {

            /* ── HEADER ── */
            header {
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                padding: 1rem 5% !important;
                background: #fdfdfd !important;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
                width: 100% !important;
                left: 0 !important;
            }

            .logo-wrap {
                margin: 0 !important;
                transform: scale(0.9);
                transform-origin: left;
            }

            .mobile-toggle {
                display: flex !important;
                margin-left: auto !important;
                margin-right: 0 !important;
            }

            /* ── SLIDE-IN NAV ── */
            nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 320px;
                height: 100vh;
                background: #fff;
                display: flex !important;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 2rem;
                transition: right 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
                z-index: 250;
            }

            body.nav-open nav {
                right: 0;
            }

            body.nav-open::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: transparent;
                z-index: 240;
            }

            nav a {
                color: #1a2540 !important;
                font-size: 1.1rem !important;
            }

            /* ── HERO ── */
            .hero-inner {
                grid-template-columns: 1fr !important;
                padding: 40px 5% 20px !important;
                text-align: left !important;
                gap: 15px !important;
            }

            .hero-btns {
                justify-content: center !important;
            }

            .hero-sub {
                margin: 0 0 2rem !important;
                text-align: left !important;
            }

            .hero-h1 {
                font-size: clamp(2rem, 6vw, 3rem) !important;
            }

            .hero-h1 strong {
                white-space: normal !important;
            }

            .hero-carousel {
                height: auto !important;
            }

            .cube-scene {
                transform: scale(0.75);
            }

            /* ── ABOUT ── */
            .about-section {
                grid-template-columns: 1fr !important;
                gap: 40px !important;
                padding: 60px 5% !important;
            }

            .about-image-scatter {
                height: 300px !important;
            }

            .about-content {
                padding: 0 !important;
                text-align: left !important;
            }

            .about-tag-wrap {
                justify-content: flex-start !important;
            }

            .about-title {
                font-size: 2.5rem !important;
            }

            /* ── MISSION & VISION ── */
            .mv-section {
                grid-template-columns: 1fr !important;
                gap: 40px !important;
                padding: 60px 5% !important;
            }

            /* ── WHY CAPSTONE ── */
            .why-section {
                padding: 30px 5% !important;
            }

            .why-banner {
                flex-direction: column !important;
                text-align: center !important;
                gap: 25px !important;
                padding: 30px 5% !important;
                border-radius: 20px !important;
            }

            .why-left {
                width: 100% !important;
            }

            .why-title {
                font-size: 2.8rem !important;
                margin-bottom: 20px !important;
            }

            .why-tag {
                border-left: none !important;
                border-bottom: 2px solid #2bbfbf !important;
                padding-left: 0 !important;
                padding-bottom: 5px !important;
                display: inline-block !important;
                margin-bottom: 30px !important;
            }

            .why-item {
                text-align: left !important;
                display: flex !important;
                align-items: flex-start !important;
                gap: 15px !important;
                font-size: 1rem !important;
            }

            .why-grid {
                width: 100% !important;
                max-width: 300px !important;
                margin: 0 auto !important;
                grid-template-columns: 1fr !important;
                gap: 15px !important;
                text-align: left !important;
            }

            /* ── SERVICES ── */
            .services-section {
                padding: 30px 5% !important;
                text-align: left !important;
            }

            .services-header {
                margin-bottom: 25px !important;
            }

            .services-title {
                font-size: 2.5rem !important;
                line-height: 1.2 !important;
                text-align: left !important;
            }

            .services-title span {
                font-size: 1.8rem !important;
                display: block !important;
                margin-bottom: 5px !important;
            }

            .services-tag {
                justify-content: flex-start !important;
            }

            .services-tag::before,
            .services-tag::after {
                width: 30px !important;
            }

            .services-grid {
                grid-template-columns: 1fr !important;
                gap: 20px !important;
            }

            .service-card {
                padding: 30px 20px !important;
                text-align: left !important;
            }

            .service-card-title {
                min-height: auto !important;
                margin-bottom: 15px !important;
            }

            .service-num {
                font-size: 1.8rem !important;
                margin-bottom: 10px !important;
            }

            /* ── CAPABILITIES ── */
            .cap-section {
                padding: 20px 5% !important;
            }

            .cap-banner {
                flex-direction: column !important;
                padding: 40px 5% !important;
                gap: 30px !important;
                text-align: center !important;
                border-radius: 20px !important;
            }

            .cap-left {
                width: 100% !important;
            }

            .cap-grid {
                width: 100% !important;
                grid-template-columns: 1fr 1fr !important;
                gap: 15px 20px !important;
            }

            .cap-icon-wrap {
                margin: 0 auto 20px !important;
            }

            /* ── WHO WE SERVE ── */
            .serve-section {
                flex-direction: column !important;
                padding: 30px 5% !important;
                gap: 20px !important;
                text-align: center !important;
                align-items: center !important;
            }

            .serve-left {
                width: 100% !important;
            }

            .serve-tag {
                justify-content: center !important;
            }

            .serve-title {
                font-size: 2.2rem !important;
            }

            .client-list {
                grid-template-columns: 1fr !important;
                width: 100% !important;
                max-width: 320px !important;
                margin: 0 auto !important;
                text-align: left !important;
                gap: 12px !important;
            }

            .client-chip {
                justify-content: flex-start !important;
                text-align: left !important;
                padding: 12px 18px !important;
            }

            .commitment-card {
                width: 100% !important;
                margin: 0 auto !important;
                padding: 30px 20px !important;
                border-radius: 20px !important;
                text-align: left !important;
            }

            .comm-grid {
                grid-template-columns: 1fr !important;
                gap: 25px !important;
                text-align: left !important;
            }

            .comm-title {
                font-size: 1.8rem !important;
                text-align: left !important;
            }

            /* ── GALLERY ── */
            .gallery-section {
                padding: 30px 5% !important;
                text-align: left !important;
            }

            .gallery-header {
                margin-bottom: 25px !important;
            }

            .gallery-title {
                font-size: 2.5rem !important;
                text-align: left !important;
            }

            .gallery-tabs {
                justify-content: flex-start !important;
                gap: 10px !important;
                overflow-x: auto;
                padding-bottom: 10px;
                -webkit-overflow-scrolling: touch;
            }

            .gallery-tab {
                padding: 10px 20px !important;
                font-size: 0.75rem !important;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr !important;
                gap: 15px !important;
            }

            .gallery-img-wrap {
                height: 200px !important;
            }

            /* ── CTA ── */
            .cta-section {
                padding: 60px 5% !important;
            }

            .cta-title {
                font-size: 2.2rem !important;
            }

            /* ── CONTACT ── */
            .contact-section {
                padding: 60px 5% !important;
            }

            .contact-title {
                font-size: 2rem !important;
            }

            .contact-box {
                flex-direction: column !important;
            }

            .contact-info,
            .contact-form {
                width: 100% !important;
                padding: 30px !important;
            }

            .info-details p {
                word-break: break-word !important;
                overflow-wrap: break-word !important;
                font-size: 0.85rem !important;
            }

            .form-row {
                flex-direction: column !important;
            }

            /* ── MEDIA CENTRE ── */
            .media-section {
                padding: 60px 5% !important;
            }

            .media-header {
                flex-direction: column !important;
                gap: 20px !important;
                align-items: flex-start !important;
            }

            .media-title-group h2 {
                font-size: 2rem !important;
            }

            .media-grid {
                grid-template-columns: 1fr !important;
            }

            .thought-grid {
                grid-template-columns: 1fr !important;
            }

            /* ── FOOTER ── */
            .footer-section {
                padding: 60px 5% 30px !important;
            }

            .footer-grid {
                grid-template-columns: 1fr !important;
                gap: 40px !important;
                text-align: left !important;
                margin-bottom: 30px !important;
                padding-bottom: 30px !important;
            }

            .footer-col {
                padding-right: 0 !important;
                align-items: flex-start !important;
                text-align: left !important;
            }

            .footer-logo {
                justify-content: flex-start !important;
            }

            .footer-socials {
                justify-content: flex-start !important;
                padding-left: 0 !important;
            }

            .footer-links a {
                justify-content: flex-start !important;
            }

            .footer-contact-item {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 8px !important;
                margin-bottom: 20px !important;
            }

            .footer-contact-item p {
                font-size: 0.85rem !important;
                line-height: 1.4 !important;
                word-break: normal !important;
                overflow-wrap: break-word !important;
            }

            .footer-bottom {
                flex-direction: column !important;
                text-align: left !important;
                gap: 20px !important;
                align-items: flex-start !important;
                padding-top: 20px !important;
            }

            .footer-bottom p {
                font-size: 0.75rem !important;
                line-height: 1.6 !important;
            }

            .footer-bottom-links {
                flex-direction: column !important;
                align-items: flex-start !important;
                justify-content: flex-start !important;
                max-width: 100% !important;
                gap: 12px !important;
            }

            .footer-bottom-links a {
                font-size: 0.75rem !important;
            }
        }

        @media (max-width: 480px) {
            .hero-h1 {
                font-size: 1.8rem !important;
            }

            .about-title {
                font-size: 2rem !important;
            }

            .cube-scene {
                transform: scale(0.6);
            }

            .why-title {
                font-size: 2rem !important;
            }

            .services-title {
                font-size: 1.8rem !important;
            }

            .gallery-grid {
                grid-template-columns: 1fr !important;
            }

            .gallery-img-wrap {
                height: 220px !important;
            }

            .client-list {
                grid-template-columns: 1fr !important;
            }

            .why-grid {
                grid-template-columns: 1fr !important;
            }

            .cap-grid {
                grid-template-columns: 1fr !important;
            }

            .footer-bottom-links a::after {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    @include('sections.header')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.mission')
    @include('sections.why')
    @include('sections.services')
    @include('sections.capabilities')
    @include('sections.serve')
    @include('sections.ticker')
    @include('sections.gallery')
    @include('sections.cta')
    @include('sections.contact')
    @include('sections.footer')


    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.gallery-tab');
            const items = document.querySelectorAll('.filter-item');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Update active tab
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    // Filter images
                    const filter = tab.getAttribute('data-filter');
                    items.forEach(item => {
                        // Check if item belongs to the selected filter
                        if (item.classList.contains(filter)) {
                            item.style.display = 'block';
                            // Apply quick animation
                            item.style.animation = 'none';
                            item.offsetHeight; /* trigger reflow */
                            item.style.animation = 'fadeUp 0.5s ease forwards';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Trigger click on default active tab on load
            const activeTab = document.querySelector('.gallery-tab.active');
            if (activeTab) {
                activeTab.click();
            }

            // Dynamic Nav Highlighting with IntersectionObserver
            const navLinks = document.querySelectorAll('nav a');
            const sections = document.querySelectorAll('section[id]');

            const options = {
                threshold: 0.5,
                rootMargin: "-20% 0px -20% 0px" // Add margins to trigger active state in middle of viewport
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }, options);

            sections.forEach(section => {
                observer.observe(section);
            });

            // Smooth Scroll for Nav Links (Optional but recommended for flow)
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if (target) {
                            window.scrollTo({
                                top: target.offsetTop - 70, // Header height offset
                                behavior: 'smooth'
                            });
                        }
                        // For mobile: close nav on click
                        document.body.classList.remove('nav-open');
                    }
                });
            });

            // Contact Form AJAX
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const formResponse = document.getElementById('formResponse');

            if (contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Sending...';
                    formResponse.innerText = '';
                    formResponse.style.color = '#1E73BE';

                    try {
                        const formData = new FormData(contactForm);
                        const response = await fetch('{{ route("contact.store") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: formData
                        });

                        const result = await response.json();

                        if (result.success) {
                            formResponse.innerText = result.message;
                            formResponse.style.color = '#28a745';
                            contactForm.reset();
                        } else {
                            formResponse.innerText = 'Something went wrong. Please try again.';
                            formResponse.style.color = '#dc3545';
                        }
                    } catch (error) {
                        formResponse.innerText = 'Connection error. Please check your internet.';
                        formResponse.style.color = '#dc3545';
                    } finally {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Submit Message';
                    }
                });
            }
        });
    </script>
</body>

</html>