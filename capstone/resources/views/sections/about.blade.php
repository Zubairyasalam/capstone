<!-- ══ ABOUT US SECTION ══ -->
    <section id="about" class="about-section">
        <div class="about-image-scatter">
            <img src="{{ isset($settings['about_img_1']) ? asset('images/' . $settings['about_img_1']) : asset('images/office4.png') }}" alt="Meeting" class="scatter-img img-1">
            <img src="{{ isset($settings['about_img_2']) ? asset('images/' . $settings['about_img_2']) : asset('images/office2.png') }}" alt="Office" class="scatter-img img-2">
            <img src="{{ isset($settings['about_img_3']) ? asset('images/' . $settings['about_img_3']) : asset('images/office1.png') }}" alt="Workspace" class="scatter-img img-3">
            <img src="{{ isset($settings['about_img_4']) ? asset('images/' . $settings['about_img_4']) : asset('images/office3.png') }}" alt="Office View" class="scatter-img img-4">
        </div>

        <div class="about-content">
            <div class="about-tag-wrap">
                <div class="about-line"></div>
                <span class="about-tag">{{ $settings['about_tag'] ?? 'ABOUT US' }}</span>
            </div>
            <h2 class="about-title">{!! $settings['about_title'] ?? 'Who<br>We Are' !!}</h2>
            <div class="about-text-lead">
                {{ $settings['about_description'] ?? 'Capstone Global Services India Private Limited is a Chennai-based integrated business solutions provider.' }}
            </div>
            <p class="about-text">
                {{ $settings['about_mission'] ?? 'To empower businesses through strategic innovation and world-class services.' }}
            </p>
            <a href="#contact" class="btn-navy">{{ $settings['about_btn_text'] ?? 'DISCOVER MORE' }}</a>
        </div>
    </section>