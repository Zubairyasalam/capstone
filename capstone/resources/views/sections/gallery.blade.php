<!-- ══ GALLERY SECTION ══ -->
    <section id="projects" class="gallery-section">
        <div class="gallery-header">
            <h2 class="gallery-title">Gallery</h2>
            <p class="gallery-sub">Showcasing Our Work, Events, and Infrastructure</p>
        </div>
        <div class="gallery-tabs">
            <button class="gallery-tab active" data-filter="projects">PROJECT SHOWCASE</button>
            <button class="gallery-tab" data-filter="events">CORPORATE EVENTS</button>
            <button class="gallery-tab" data-filter="infrastructure">INFRASTRUCTURE DEVELOPMENTS</button>
        </div>
        <div class="gallery-grid">
            <!-- Project Showcase -->
            <div class="gallery-img-wrap filter-item projects"><img src="{{ asset('images/project1.png') }}" alt="Project 1"></div>
            <div class="gallery-img-wrap filter-item projects"><img src="{{ asset('images/project2.png') }}" alt="Project 2"></div>
            <div class="gallery-img-wrap filter-item projects"><img src="{{ asset('images/project3.png') }}" alt="Project 3"></div>
            <div class="gallery-img-wrap filter-item projects"><img src="{{ asset('images/project4.png') }}" alt="Project 4"></div>
            <div class="gallery-img-wrap filter-item projects"><img src="{{ asset('images/project5.png') }}" alt="Project 5"></div>

            <!-- Corporate Events -->
            <div class="gallery-img-wrap filter-item events" style="display:none;"><img src="{{ asset('images/event1.png') }}" alt="Event 1"></div>
            <div class="gallery-img-wrap filter-item events" style="display:none;"><img src="{{ asset('images/event2.png') }}" alt="Event 2"></div>
            <div class="gallery-img-wrap filter-item events" style="display:none;"><img src="{{ asset('images/project3.png') }}" alt="Event 3"></div>
            <div class="gallery-img-wrap filter-item events" style="display:none;"><img src="{{ asset('images/project4.png') }}" alt="Event 4"></div>
            <div class="gallery-img-wrap filter-item events" style="display:none;"><img src="{{ asset('images/project5.png') }}" alt="Event 5"></div>

            <!-- Infrastructure Developments -->
            <div class="gallery-img-wrap filter-item infrastructure" style="display:none;"><img src="{{ asset('images/project2.png') }}" alt="Infra 1"></div>
            <div class="gallery-img-wrap filter-item infrastructure" style="display:none;"><img src="{{ asset('images/project5.png') }}" alt="Infra 2"></div>
            <div class="gallery-img-wrap filter-item infrastructure" style="display:none;"><img src="{{ asset('images/project1.png') }}" alt="Infra 3"></div>
            <div class="gallery-img-wrap filter-item infrastructure" style="display:none;"><img src="{{ asset('images/project3.png') }}" alt="Infra 4"></div>
            <div class="gallery-img-wrap filter-item infrastructure" style="display:none;"><img src="{{ asset('images/project4.png') }}" alt="Infra 5"></div>
        </div>
    </section>