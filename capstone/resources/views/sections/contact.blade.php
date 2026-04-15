<!-- ══ CONTACT SECTION ══ -->
<section id="contact" class="contact-section">
    <div class="contact-header">
        <h2 class="contact-title">{{ $settings['contact_title'] ?? 'Get In Touch' }}</h2>
        <p class="contact-sub">
            {{ $settings['contact_subtitle'] ?? 'Reach out to discover how we can transform your business.' }}</p>
    </div>
    <div class="contact-box">
        <div class="contact-info">
            <h3 class="info-title">Contact Information</h3>
            <div class="info-item">
                <div class="info-icon">📍</div>
                <div class="info-details">
                    <h4>Our Location</h4>
                    <p>{!! $settings['contact_address'] ?? 'Chennai, Tamil Nadu<br>India' !!}</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">📞</div>
                <div class="info-details">
                    <h4>Call Us</h4>
                    <p>{!! $settings['contact_phones'] ?? '+91 90032 21519<br>+91 96000 31509' !!}</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">✉️</div>
                <div class="info-details">
                    <h4>Email Us</h4>
                    <p>{{ $settings['contact_email'] ?? 'info@capstoneglobalservices.com' }}</p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <h3 class="form-title">Send Us a Message</h3>
            <form id="contactForm" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX">
                    </div>
                    <div class="form-group">
                        <label>Service Required</label>
                        <select name="service" class="form-control">
                            <option value="Business Consulting">Business Consulting</option>
                            <option value="IT Services">IT Services</option>
                            <option value="HR Solutions">HR Solutions</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Message</label>
                    <textarea name="message" class="form-control" rows="4"
                        placeholder="Tell us about your requirements..."></textarea>
                </div>
                <button type="submit" class="btn-submit" id="submitBtn">Submit Message</button>
                <div id="formResponse" style="margin-top: 15px; font-weight: 600; font-size: 0.9rem;"></div>
            </form>
        </div>
    </div>
</section>