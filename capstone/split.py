import re
import os

filepath = r"c:\Users\DELL\.gemini\antigravity\scratch\capstone\capstone\resources\views\welcome.blade.php"
outdir = r"c:\Users\DELL\.gemini\antigravity\scratch\capstone\capstone\resources\views\sections"

if not os.path.exists(outdir):
    os.makedirs(outdir)

with open(filepath, "r", encoding="utf-8") as f:
    content = f.read()

# Pattern to find all top-level elements that we want to extract
# Things we extract: <header>, <section>, <footer>
# And we leave them as @include('sections.header') etc.

sections = [
    ("header", r"(<!-- ══ HEADER ══ -->\s*<header>.*?</header>)"),
    ("hero", r"(<!-- ══ HERO ══ -->\s*<section class=\"hero\">.*?</section>)"),
    ("about", r"(<!-- ══ ABOUT US SECTION ══ -->\s*<section id=\"about\" class=\"about-section\">.*?</section>)"),
    ("mission", r"(<!-- ══ MISSION & VISION SECTION ══ -->\s*<section class=\"mv-section\">.*?</section>)"),
    ("why", r"(<!-- ══ WHY CAPSTONE SECTION ══ -->\s*<section class=\"why-section\">.*?</section>)"),
    ("services", r"(<!-- ══ SERVICES SECTION ══ -->\s*<section id=\"services\" class=\"services-section\">.*?</section>)"),
    ("capabilities", r"(<!-- ══ ADVANCED CAPABILITIES SECTION ══ -->\s*<section class=\"cap-section\">.*?</section>)"),
    ("serve", r"(<!-- ══ WHO WE SERVE SECTION ══ -->\s*<section class=\"serve-section\">.*?</section>)"),
    ("ticker", r"(<!-- ══ CLIENT LOGO TICKER ══ -->\s*<section class=\"client-ticker\">.*?</section>)"),
    ("gallery", r"(<!-- ══ GALLERY SECTION ══ -->\s*<section class=\"gallery-section\">.*?</section>)"),
    ("cta", r"(<!-- ══ CTA SECTION ══ -->\s*<section class=\"cta-section\">.*?</section>)"),
    ("contact", r"(<!-- ══ CONTACT SECTION ══ -->\s*<section id=\"contact\" class=\"contact-section\">.*?</section>)"),
    ("footer", r"(<!-- ══ FOOTER ══ -->\s*<footer class=\"footer-section\">.*?</footer[^>]*>)")
]

new_content = content
for name, pattern in sections:
    match = re.search(pattern, new_content, re.DOTALL)
    if match:
        extracted = match.group(1)
        with open(os.path.join(outdir, f"{name}.blade.php"), "w", encoding="utf-8") as out:
            out.write(extracted)
        new_content = new_content.replace(extracted, f"@include('sections.{name}')\n")

with open(filepath, "w", encoding="utf-8") as f:
    f.write(new_content)

print("done")
