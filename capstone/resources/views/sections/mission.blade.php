<!-- ══ MISSION & VISION SECTION ══ -->
<section class="mv-section">
    <div class="mv-card active" onclick="activateMV(this)">
        <span class="mv-num">01</span>
        <h3 class="mv-title"><span>Our</span> Foundation</h3>
        <p class="mv-text">
            Built on the principle <strong>"The Stone That Sets Every Angle True"</strong>, we align every business
            operation with precision, integrity, and long-term value.
        </p>
    </div>

    <div class="mv-card" onclick="activateMV(this)">
        <span class="mv-num">02</span>
        <h3 class="mv-title"><span>Our</span> Mission</h3>
        <p class="mv-text">
            To provide innovative, reliable, and scalable solutions that empower businesses to grow globally.
        </p>

    </div>
    <div class="mv-card" onclick="activateMV(this)">
        <span class="mv-num">03</span>
        <h3 class="mv-title"><span>Our</span> Vision</h3>
        <p class="mv-text">
            To become a globally recognized leader in integrated business services and enterprise transformation.
        </p>
    </div>
    <script>
        function activateMV(element) {
            document.querySelectorAll('.mv-card').forEach(card => card.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
</section>