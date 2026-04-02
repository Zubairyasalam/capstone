<!-- ══ HERO ══ -->
<section id="hero" class="hero">
    <div class="hero-inner">

        <!-- Left: Text -->
        <div class="hero-text">
            <p class="hero-tagline">{{ $settings['hero_tagline'] ?? '"The Stone That Sets Every Angle True"' }}</p>
            <h1 class="hero-h1">
                @php
                    $headline = $settings['hero_headline'] ?? "Global Business\nSolutions.\nSeamlessly Delivered.";
                    $lines = explode("\n", $headline);
                    $lastLine = array_pop($lines);
                    $remainingLines = implode("<br>", $lines);
                @endphp
                {!! $remainingLines !!} @if($remainingLines)<br>@endif
                <strong>{{ $lastLine }}</strong>
            </h1>
            <p class="hero-sub">
                {{ $settings['hero_subtext'] ?? 'A trusted global connecting centre providing end-to-end business solutions, transforming organizations through innovation, strategy, and operational excellence since 2016.' }}
            </p>
            <div class="hero-btns">
                <a href="#" class="btn-primary">{{ $settings['hero_btn_text'] ?? 'Get Started' }}</a>
                <a href="#contact" class="btn-outline">Contact Us</a>
            </div>
        </div>

        <!-- Right: 3D Rotating Cube -->
        <div class="hero-carousel">
            <div class="cube-scene">
                <div class="cube">
                    <div class="cube-face face-front">
                        <img src="{{ asset('images/office1.png') }}" alt="Office 1">
                    </div>
                    <div class="cube-face face-right">
                        <img src="{{ asset('images/office2.png') }}" alt="Office 2">
                    </div>
                    <div class="cube-face face-back">
                        <img src="{{ asset('images/office3.png') }}" alt="Office 3">
                    </div>
                    <div class="cube-face face-left">
                        <img src="{{ asset('images/office4.png') }}" alt="Office 4">
                    </div>
                    <div class="cube-face face-top">
                        <img src="{{ asset('images/office5.png') }}" alt="Office 5">
                    </div>
                </div>
            </div>
            <div class="cube-shadow"></div>
        </div>

    </div>
</section>