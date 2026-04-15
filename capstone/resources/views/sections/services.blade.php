<!-- ══ SERVICES SECTION ══ -->
    <section id="services" class="services-section">
        <div class="services-header">
            <div class="services-tag">OUR SERVICES</div>
            <h2 class="services-title">
                <span>Comprehensive</span>
                Global Solutions
            </h2>
        </div>

        <div class="services-grid">
            @forelse($services->take(8) as $i => $service)
            <div class="service-card">
                <span class="service-num">{{ $service->icon ?? str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="service-card-title">{{ $service->title }}</h3>
                <p class="service-text">{{ $service->description }}</p>
            </div>
            @empty
            <p>Our solutions range from Professional Services to global infrastructure development.</p>
            @endforelse
        </div>
    </section>