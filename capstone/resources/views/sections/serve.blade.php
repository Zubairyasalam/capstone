<!-- ══ WHO WE SERVE SECTION ══ -->
<section id="clients" class="serve-section">
    <div class="serve-left">
        <div class="serve-tag">{{ $settings['serve_tag'] ?? 'OUR CLIENTS' }}</div>
        <h2 class="serve-title">{!! $settings['serve_title'] ?? 'Who<br>We Serve' !!}</h2>
        <p class="serve-text">{{ $settings['serve_desc'] ?? 'We proudly partner with a diverse portfolio of clients:' }}</p>
        <div class="client-list">
            <div class="client-chip">
                <div class="chip-dot"></div> {{ $settings['serve_chip_1'] ?? 'Corporate Enterprises' }}
            </div>
            <div class="client-chip">
                <div class="chip-dot"></div> {{ $settings['serve_chip_2'] ?? 'Real Estate Developers' }}
            </div>
            <div class="client-chip">
                <div class="chip-dot"></div> {{ $settings['serve_chip_3'] ?? 'Infrastructure Companies' }}
            </div>
            <div class="client-chip">
                <div class="chip-dot"></div> {{ $settings['serve_chip_4'] ?? 'Financial Institutions' }}
            </div>
            <div class="client-chip">
                <div class="chip-dot"></div> {{ $settings['serve_chip_5'] ?? 'Startups & SMEs' }}
            </div>
            <div class="client-chip">
                <div class="chip-dot"></div> {{ $settings['serve_chip_6'] ?? 'Government & Public Sector' }}
            </div>
        </div>
    </div>

    <div class="commitment-card">
        <div class="comm-header">
            <h3 class="comm-title">{!! $settings['comm_title'] ?? 'Client <span>Commitment</span>' !!}</h3>
            <p class="comm-sub">
                {{ $settings['comm_subtitle'] ?? 'We build long-term partnerships by delivering consistent excellence across every touchpoint.' }}
            </p>
        </div>
        <div class="comm-grid">
            <div class="comm-item">
                <span class="comm-num">01</span>
                <span class="comm-name">{{ $settings['comm_item_1'] ?? 'Measurable Results' }}</span>
            </div>
            <div class="comm-item">
                <span class="comm-num">02</span>
                <span class="comm-name">{{ $settings['comm_item_2'] ?? 'Scalable Solutions' }}</span>
            </div>
            <div class="comm-item">
                <span class="comm-num">03</span>
                <span class="comm-name">{{ $settings['comm_item_3'] ?? 'Transparent Processes' }}</span>
            </div>
        </div>
    </div>
</section>