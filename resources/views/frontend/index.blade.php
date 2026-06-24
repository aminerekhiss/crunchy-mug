@extends('frontend.layouts.master')
@section('title','CRUNCHY MUG')
@section('main-content')

<style>
    .cup-sizes-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2rem;
}

.cup-size {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.cup-img {
  width: 800px;
  height: auto;
  margin-bottom: 1rem;
  object-fit: contain;
}

.cup-btn {
  background-color: #92400e; /* Tailwind amber-700 */
  color: white;
  padding: 0.75rem 1.5rem;
  font-weight: 600;
  border-radius: 0.75rem;
  font-size: 0.875rem;
  transition: background-color 0.3s ease;
  text-decoration: none;
}

.cup-btn:hover {
  background-color: #78350f; /* Tailwind amber-800 */
}

@media (min-width: 768px) {
  .cup-sizes-wrapper {
    flex-direction: row;
    justify-content: center;
  }
}

     .rc-section {
    background: rgb(247 146 28);
    padding: 60px 20px;
  }

  .rc-container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .rc-header {
    text-align: center;
    margin-bottom: 50px;
  }

  .rc-header h2 {
    font-size: 2.8rem;
    font-weight: 700;
    color: #222;
  }

  /* Grille responsive */
  .rc-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
  }

  /* Cartes de témoignages */
  .rc-card {
    background: white;
    border-radius: 16px;
    padding: 30px 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    text-align: center;
    transition: transform 0.3s ease;
  }

  .rc-card:hover {
    transform: translateY(-5px);
  }

  .rc-stars {
    font-size: 1.8rem;
    color: #facc15; /* jaune doré */
    margin-bottom: 15px;
  }

  .rc-comment {
    font-size: 1.1rem;
    font-style: italic;
    color: #444;
    margin-bottom: 20px;
  }

  .rc-author {
    font-weight: 600;
    font-size: 1.2rem;
    color: #111;
  }

  /* Responsive header font-size */
  @media (max-width: 600px) {
    .rc-header h2 {
      font-size: 2rem;
    }
  }
    .text-center h2 {
    line-height: 1.2;
    letter-spacing: -0.5px;
}

.text-center p {
    line-height: 1.6;
}
/* Reset box-sizing globally (optional but recommended) */
*, *::before, *::after {
  box-sizing: border-box;
}

/* Comparison container with 3 columns flex layout */
.comparison-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 3rem; /* spacing between columns */
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

/* Columns */
.comparison-column {
  flex: 1;
  display: flex;
  flex-direction: column;
}

/* Left column aligns right */
.comparison-column.items-end {
  align-items: flex-end;
  text-align: right;
}

/* Right column aligns left */
.comparison-column.items-start {
  align-items: flex-start;
  text-align: left;
}

/* Top images fixed max width */
.top-image {
  max-width: 250px;
  width: 100%;
  height: auto;
  border-radius: 0.5rem;
}

/* Info boxes styles (example) */
.info-box {
  background: #f3f4f6;
  border-radius: 0.5rem;
  padding: 1rem;
  margin-bottom: 0.75rem;
  box-shadow: 0 1px 4px rgba(0,0,0,0.1);
  color: #333;
}

/* Color variants (adjust these to your color scheme) */
.info-box.green h4 {
  color: #16a34a;
}
.info-box.gold h4 {
  color: #b45309;
}
.info-box.leaf h4 {
  color: #15803d;
}
.info-box.coffee1 h4,
.info-box.coffee2 h4,
.info-box.coffee3 h4 {
  color: #7c2d12;
}
.earth-slider .after {
  transition: clip-path 0.3s ease; /* transition plus rapide (300ms) */
}

.earth-slider .handle {
  transition: left 0.3s ease;
}
/* Earth compare wrapper */
.earth-compare-wrapper {
  position: relative;
  width: 700px;
  height: 700px;
  border-radius: 50%;
  overflow: hidden;
  border: 10px solid white;
  box-shadow: 0 10px 40px rgba(0,0,0,0.2);
  margin: 0 auto;
  flex-shrink: 0; /* prevent shrinking */
  box-sizing: border-box;
}

/* Earth slider fills wrapper */
.earth-slider {
  position: relative;
  width: 100%;
  height: 100%;
  user-select: none;
  touch-action: none;
}

/* Images fill and overlap border by 10px */
.earth-img {
  position: absolute;
  top: -10px;
  left: -10px;
  width: calc(100% + 20px);
  height: calc(100% + 20px);
  object-fit: cover;
  border-radius: 50%;
  display: block;
  pointer-events: none;
  user-select: none;
  margin: 0;
  padding: 0;
  z-index: 1;
}

/* Clip the after image half */
.earth-img.after {
  clip-path: inset(0 50% 0 0 round 50%);
  z-index: 2;
}

/* Handle styles */
.handle {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  height: 100%;
  z-index: 3;
  display: flex;
  flex-direction: column;
  align-items: center;
  pointer-events: auto;
  cursor: ew-resize;
}

.handle-line {
  width: 4px;
  height: 100%;
  background: #8b5e3c;
  border-radius: 999px;
}

.handle-icon {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #8b5e3c;
  color: white;
  padding: 0.5rem;
  border-radius: 999px;
  font-weight: bold;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  font-size: 1rem;
  user-select: none;
}

/* Slider text below */
.slider-text {
  text-align: center;
  margin-top: 1rem;
  font-weight: 500;
  color: #5e4033;
  font-style: italic;
  font-size: 0.875rem;
}

/* Responsive for smaller screens */
@media (max-width: 1024px) {
  .comparison-container {
    flex-direction: column;
    gap: 3rem;
  }

  .earth-compare-wrapper {
    width: 300px;
    height: 300px;
  }

  .top-image {
    max-width: 100%;
  }
}

        .central-cupffee-image {
  max-width: 400px;
  z-index: 1;
  position: relative;
  filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
}

.styled-box {
  position: absolute;
  width: 260px;
  background-color: rgba(0, 0, 0, 0.85); /* boîte noire transparente */
  padding: 25px 20px;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.6);
  z-index: 2;
  text-align: center;
  color: #fff;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid rgba(255,255,255,0.15);
}

.styled-box:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 45px rgba(0, 0, 0, 0.8);
}

.styled-box h4 {
  font-weight: 700;
  font-size: 1.4rem;
  margin-bottom: 10px;
  letter-spacing: 0.03em;
  text-transform: uppercase;
  color: #e0e0e0;
  text-shadow: 0 1px 3px rgba(0,0,0,0.8);
}

.styled-box p {
  font-weight: 400;
  font-size: 1rem;
  line-height: 1.5;
  color: #ccc;
  text-shadow: 0 1px 2px rgba(0,0,0,0.6);
}

/* Positionnement */
.top-left    { top: -20px; left: 5%; }
.top-right   { top: -20px; right: 5%; }
.bottom-left { bottom: -20px; left: 5%; }
.bottom-right{ bottom: -20px; right: 5%; }

/* Responsive */
@media (max-width: 992px) {
  .styled-box {
    position: static;
    margin: 20px auto;
    width: 90%;
  }

  .central-cupffee-image {
    margin-bottom: 40px;
    max-width: 220px;
  }
}
body.page-about-us footer p {
            color: #fff !important;
        }
        footer, .footer, .site-footer {
            background: linear-gradient(to bottom, #ec8200 0%, #fffbea 100%) !important;
            color: #131313 !important;
            font-size: 1.13rem;
            font-weight: 500;
            padding: 2.3rem 0 1.7rem 0;
            text-align: center;
            box-shadow: 0 -2px 24px 0 rgba(60, 60, 60, 0.09);
            letter-spacing: 0.01em;
            /* border-top and border-radius removed */
        }
        .footer a, .site-footer a {
            color: #b9217b;
            text-decoration: underline dotted;
            background: linear-gradient(90deg,#ffe0f5 0%,#fab8e8 100%);
            border-radius: .8rem;
            padding: 0.22em 0.7em;
            transition: color 0.18s, background 0.22s;
            font-weight: 600;
            margin: 0 0.17em;
        }
        .footer a:hover, .site-footer a:hover {
            color: #127fbf;
            background: linear-gradient(90deg,#fffbea 0%,#b3ecff 100%);
            text-decoration: underline wavy;
        }
        .footer-social {
            margin-top: 1.1rem;
        }
        .footer-social a {
            display: inline-block;
            margin: 0 0.5rem;
            color: #27ae60;
            font-size: 1.45rem;
            border-radius: 100%;
            background: linear-gradient(135deg,#ffe0f5 0%,#b9e3be 100%);
            padding: 0.25rem;
            box-shadow: 0 2px 12px 0 rgba(186, 35, 123, 0.10);
            transition: color 0.15s, background 0.18s, box-shadow 0.18s;
        }
        .footer-social a:hover {
            color: #b9217b;
            background: linear-gradient(135deg,#b9e3be 0%,#fab8e8 100%);
            box-shadow: 0 4px 20px 0 rgba(111,72,170,0.15);
        }
        /* White box for description paragraph */
        .description-box {
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
            color: #444;
        }
     .w-56 {
    width: 14rem;
}
.gap-4 {
    gap: 1rem;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}
.flex-wrap {
    flex-wrap: wrap;
}
.flex {
    display: flex
;
}
.h-56 {
    height: 14rem;
}

.mr-4 {
    margin-right: 1rem;
}
.mr-4, .mx-4 {
    margin-right: 1.5rem !important;
}
    .cards-with-icons {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 30px;
  margin-top: 40px;
}

.card-icon {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
  text-align: center;
  padding: 40px 20px;
  transition: transform 0.3s, box-shadow 0.3s;
  position: relative;
}

.card-icon i {
  font-size: 60px;
  margin-bottom: 20px;
  color: #D2691E; /* chocolat ou café */
}

.card-icon h3 {
  font-size: 20px;
  margin-bottom: 10px;
  color: #333;
}

.card-icon p {
  font-size: 15px;
  color: #777;
}

.card-icon .result-badge {
  margin-top: 15px;
  display: inline-block;
  background: #f7f7f7;
  padding: 6px 15px;
  border-radius: 20px;
  font-size: 13px;
  color: #444;
}

.card-icon:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.result-badge {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 12px;
    background-color: #f0f0f0;
    border-radius: 20px;
    font-size: 14px;
    color: #333;
}
    .footer a:hover, .site-footer a:hover {
        color: #127fbf;
        background: linear-gradient(90deg,#fffbea 0%,#b3ecff 100%);
        text-decoration: underline wavy;
    }
    .footer-social {
        margin-top: 1.1rem;
    }
    .footer-social a {
        display: inline-block;
        margin: 0 0.5rem;
        color: #27ae60;
        font-size: 1.45rem;
        border-radius: 100%;
        background: linear-gradient(135deg,#ffe0f5 0%,#b9e3be 100%);
        padding: 0.25rem;
        box-shadow: 0 2px 12px 0 rgba(186, 35, 123, 0.10);
        transition: color 0.15s, background 0.18s, box-shadow 0.18s;
    }
    .footer-social a:hover {
        color: #b9217b;
        background: linear-gradient(135deg,#b9e3be 0%,#fab8e8 100%);
        box-shadow: 0 4px 20px 0 rgba(111,72,170,0.15);
    }
    /* MBA Studio - Enhanced CSS */
:root {
    --primary-color: #ffaa00;
    --primary-light: #ffcc4d;
    --primary-dark: #e69500;
    --secondary-color: #1a1a1a;
    --dark-bg: #0a0a0a;
    --text-light: #ffffff;
    --text-gray: #cccccc;
    --text-dark: #666666;
    --border-color: #333333;
    --gradient-primary: linear-gradient(135deg, #ffaa00 0%, #ff8800 100%);
    --gradient-dark: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
    --shadow-light: 0 4px 20px rgba(255, 170, 0, 0.15);
    --shadow-dark: 0 8px 32px rgba(0, 0, 0, 0.3);
    --shadow-heavy: 0 12px 48px rgba(0, 0, 0, 0.4);
    --border-radius: 12px;
    --border-radius-large: 20px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-fast: all 0.2s ease;
    --font-family: 'Poppins', sans-serif;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    font-size: 16px;
}

body {
    font-family: var(--font-family);
    background-color: var(--dark-bg);
    color: var(--text-light);
    line-height: 1.6;
    overflow-x: hidden;
}

/* Enhanced Container */
.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
    font-weight: 600;
    line-height: 1.2;
    margin-bottom: 1rem;
    color: #fff;
}

h1 { font-size: clamp(2.5rem, 5vw, 4rem); }
h2 { font-size: clamp(2rem, 4vw, 3rem); }
h3 { font-size: clamp(1.5rem, 3vw, 2rem); }

p {
  font-size: 1.2rem;
    margin-bottom: 1rem;
    color: #090808;
}


/* Enhanced Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: var(--border-radius);
    font-family: var(--font-family);
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    cursor: pointer;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: var(--transition);
}

.btn:hover::before {
    left: 100%;
}

.btn-primary {
    background: var(--gradient-primary);
    color: var(--text-light);
    box-shadow: var(--shadow-light);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 32px rgba(255, 170, 0, 0.3);
}

.btn-outline {
    background: transparent;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.btn-outline:hover {
    background: var(--primary-color);
    color: var(--dark-bg);
    transform: translateY(-2px);
}

.btn-large {
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

.btn-full {
    width: 100%;
    justify-content: center;
}

/* Enhanced Hero Section */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    padding: 120px 0 80px;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -2;
}

.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.1;
    filter: blur(1px);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(ellipse at center, rgba(10, 10, 10, 0.05) 0%, rgba(10, 10, 10, 0.12) 100%) !important;
    z-index: -1;
}

.hero-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18rem; /* Dramatically increase gap for more space between text and image */
    align-items: center;
    position: relative;
    z-index: 1;
}

.hero-text {
    animation: fadeInUp 0.8s ease-out;
    margin-left: -14rem; /* Move hero text further to the left on desktop */
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 170, 0, 0.1);
    border: 1px solid rgba(255, 170, 0, 0.3);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
    backdrop-filter: blur(10px);
}

.hero-title {
    font-weight: 800;
    margin-bottom: 1.5rem;
    letter-spacing: -0.02em;
}

.hero-highlight {
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
}

.hero-description {
    font-size: 1.2rem;
    color: var(--text-gray);
    margin-bottom: 2rem;
    line-height: 1.7;
}

.hero-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin: 2rem 0;
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    transition: var(--transition);
}

.stat-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 170, 0, 0.1);
    border-color: rgba(255, 170, 0, 0.3);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-gray);
    font-weight: 500;
}

.hero-actions {
    display: flex;
    gap: 1rem;
    margin: 2rem 0;
    flex-wrap: wrap;
}

.hero-trust {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-gray);
    font-size: 0.9rem;
    margin-top: 2rem;
}

.hero-trust i {
    color: var(--primary-color);
}

/* Enhanced Hero Visual */
.hero-visual {
    animation: fadeInRight 0.8s ease-out 0.2s both;
    justify-self: end;
    /* Move image more to the right */
    margin-right: 4vw; /* Add more right margin for desktop */
    margin-left: 10rem; /* Move hero image even further to the right */
}
.showcase-main img {
    width: 800px !important; /* Make image larger */
    height: 600px !important;
    max-width: none !important;
    object-fit: cover;
    display: block;
    box-shadow: 0 12px 48px rgba(0,0,0,0.25);
}
@media (max-width: 1024px) {
  .showcase-main img {
    width: 100% !important;
    height: auto !important;
  }
  .hero-visual {
    margin-right: 0;
    margin-left: 0;
  }
  .hero-text {
    margin-left: 0;
  }
}

.hero-image-showcase {
    position: relative;
}

.showcase-main {
    position: relative;
    border-radius: var(--border-radius-large);
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
    transform: rotate(3deg);
    transition: var(--transition);
}

.showcase-main:hover {
    transform: rotate(0deg) scale(1.02);
}

.showcase-main img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    display: block;
}

.showcase-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(10, 10, 10, 0.9);
    backdrop-filter: blur(10px);
    border-radius: var(--border-radius);
    padding: 0.75rem 1rem;
    border: 1px solid rgba(255, 170, 0, 0.3);
}

.showcase-badge span {
    color: var(--primary-color);
    font-weight: 600;
    font-size: 0.85rem;
}

.showcase-metrics {
    margin-top: 0.5rem;
}

.showcase-metrics .metric {
    background: var(--gradient-primary);
    color: var(--dark-bg);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
}

.showcase-thumbnails {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
    justify-content: center;
}

.thumbnail {
    width: 80px;
    height: 60px;
    border-radius: var(--border-radius);
    overflow: hidden;
    cursor: pointer;
    transition: var(--transition);
    border: 2px solid transparent;
    opacity: 0.7;
}

.thumbnail:hover,
.thumbnail.active {
    opacity: 1;
    border-color: var(--primary-color);
    transform: translateY(-3px);
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    animation: bounce 2s infinite;
}

.scroll-arrow {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 170, 0, 0.1);
    border: 1px solid rgba(255, 170, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 0.5rem;
    color: var(--primary-color);
}

.hero-scroll-indicator span {
    font-size: 0.8rem;
    color: var(--text-gray);
}

/* Enhanced About Section */
.about-section {
    padding: 120px 0;
    background:linear-gradient(180deg, #a4743a 0%, #7a7875 100%);
}
.about2-section {
    padding: 120px 0;
    background: linear-gradient(180deg, #ccc3bb 0%, #f1c9a2 100%);
}
.section12 {
    padding: 120px 0;
    background: linear-gradient(180deg, #797873 0%, #f3c9a0 100%);
}

.about-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.section-header {
    margin-bottom: 3rem;
}

.section-tag {
    display: inline-block;
    background: rgba(255, 170, 0, 0.1);
    border: 1px solid rgba(255, 170, 0, 0.3);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.about-features {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.feature-item {
    display: flex;
    gap: 1.5rem;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.03);
    border-radius: var(--border-radius-large);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: var(--transition);
}

.feature-item:hover {
    background: rgba(255, 170, 0, 0.05);
    border-color: rgba(255, 170, 0, 0.2);
    transform: translateY(-5px);
}

.feature-icon {
    width: 60px;
    height: 60px;
    border-radius: var(--border-radius);
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--dark-bg);
    flex-shrink: 0;
}

.feature-content h3 {
    margin-bottom: 0.5rem;
    color: var(--text-light);
}

.feature-content p {
    margin-bottom: 1rem;
}

.feature-metric {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.metric-value {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary-color);
}

.metric-label {
    font-size: 0.85rem;
    color: #fff5e9;
}

/* Enhanced About Visual */
.about-image-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 1rem;
    height: 950px;
    margin-left: 60px;
}

.grid-item {
    position: relative;
    border-radius: var(--border-radius-large);
    overflow: hidden;
    cursor: pointer;
    transition: var(--transition);
}

.grid-item:hover {
    transform: scale(1.02);
}

.grid-item.large {
    grid-row: span 2;
}

.grid-item img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* tout l'image visible, avec du vide si nécessaire */
    display: block;
    background-color: #2f2c2b00; /* facultatif pour montrer le fond */
}
.grid-item:hover img {
    transform: scale(1.1);
}

.grid-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    padding: 1.5rem;
    color: var(--text-light);
    font-weight: 600;
    transform: translateY(100%);
    transition: var(--transition);
}

.grid-item:hover .grid-overlay {
    transform: translateY(0);
}

/* Enhanced Portfolio Section */
.portfolio-section {
    padding: 120px 0;
    background: linear-gradient(180deg, #f1c89f 0%, #f7941d 100%);
}

.text-center {
    text-align: center;
}

.portfolio-filters {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin: 3rem 0;
    flex-wrap: wrap;
}

.filter-btn {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.1);
    color: var(--text-gray);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-family: var(--font-family);
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--gradient-primary);
    border-color: var(--primary-color);
    color: var(--dark-bg);
    transform: translateY(-2px);
}

.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.portfolio-item {
    transition: var(--transition);
}

.portfolio-item:hover {
    transform: translateY(-10px);
}

.portfolio-image {
    position: relative;
    border-radius: var(--border-radius-large);
    overflow: hidden;
    aspect-ratio: 16/10;
}

.portfolio-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.portfolio-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 170, 0, 0.9), rgba(255, 136, 0, 0.9));
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 2rem;
    opacity: 0;
    transition: var(--transition);
}

.portfolio-item:hover .portfolio-overlay {
    opacity: 1;
}

.portfolio-item:hover .portfolio-image img {
    transform: scale(1.1);
}

.portfolio-info h3 {
    color: var(--dark-bg);
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.portfolio-info p {
    color: rgba(10, 10, 10, 0.8);
    margin-bottom: 1rem;
}

.portfolio-results {
    margin-top: 1rem;
}

.result-badge {
    background: var(--dark-bg);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
}

.portfolio-actions {
    display: flex;
    gap: 1rem;
}

.portfolio-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(10, 10, 10, 0.9);
    border: none;
    color: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
}

.portfolio-btn:hover {
    background: var(--dark-bg);
    transform: scale(1.1);
}

.portfolio-cta {
    text-align: center;
    margin-top: 4rem;
    padding: 3rem;
    background: rgba(255, 255, 255, 0.03);
    border-radius: var(--border-radius-large);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.cta-content {
    margin-bottom: 2rem;
}

.cta-content h3 {
    font-size: 2rem;
    margin-bottom: 1rem;
    color: var(--text-light);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateX(-50%) translateY(0);
    }
    40% {
        transform: translateX(-50%) translateY(-10px);
    }
    60% {
        transform: translateX(-50%) translateY(-5px);
    }
}

/* Contact Section */
.contact-section {
    padding: 120px 0;
    background: linear-gradient(180deg, #f7941d 0%, #cac2b9 100%);
}

.contact-content {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 3rem;
    margin-top: 3rem;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.info-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.03);
    border-radius: var(--border-radius);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: var(--transition);
}

.info-card:hover {
    background: rgba(255, 170, 0, 0.05);
    border-color: rgba(255, 170, 0, 0.2);
    transform: translateY(-5px);
}

.info-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: var(--dark-bg);
    flex-shrink: 0;
}

.info-details h3 {
    font-size: 1.2rem;
    margin-bottom: 0.3rem;
}

.info-details a {
    color: var(--text-gray);
    text-decoration: none;
    transition: var(--transition);
}

.info-details a:hover {
    color: var(--primary-color);
}

.social-links {
    margin-top: 1rem;
}

.social-links h3 {
    margin-bottom: 1rem;
}

.social-icons {
    display: flex;
    gap: 1rem;
}

.social-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-gray);
    font-size: 1.2rem;
    transition: var(--transition);
}

.social-icon:hover {
    background: var(--gradient-primary);
    color: var(--dark-bg);
    transform: translateY(-5px);
}

.contact-visual {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
}

.contact-image {
    position: relative;
    border-radius: var(--border-radius-large);
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
    height: 250px;
}

.contact-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.contact-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
}

.contact-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 170, 0, 0.1);
    border: 1px solid rgba(255, 170, 0, 0.3);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

.contact-form-container {
    background: rgba(255, 255, 255, 0.03);
    border-radius: var(--border-radius-large);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 2rem;
    box-shadow: var(--shadow-dark);
}

.contact-form h3 {
    margin-bottom: 1.5rem;
    text-align: center;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 1rem;
    background: rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: var(--border-radius);
    font-family: var(--font-family);
    color: var(--text-light);
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    background: rgba(0, 0, 0, 0.3);
}

.form-group textarea {
    min-height: 150px;
    resize: vertical;
}

.btn-block {
    width: 100%;
    justify-content: center;
}


.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.85rem;
}


/* Responsive Design */
@media (max-width: 1024px) {
    .hero-content,
    .about-content,
    .contact-content {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .hero-visual {
        order: -1;
    }
    
    .hero-stats {
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
    
    .portfolio-grid {
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    }
}

@media (max-width: 768px) {
    .nav-menu {
        position: fixed;
        top: 100%;
        left: 0;
        right: 0;
        background: rgba(10, 10, 10, 0.98);
        backdrop-filter: blur(20px);
        flex-direction: column;
        padding: 2rem;
        gap: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
    }  
    .hero-section {
        padding: 100px 0 60px;
        text-align: center;
    }
    
    .hero-stats {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .feature-item {
        flex-direction: column;
        text-align: center;
    }
    
    .about-image-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        height: auto;
    }
    
    .grid-item.large {
        grid-row: span 1;
    }
    
    .portfolio-grid {
        grid-template-columns: 1fr;
    }
    
    .portfolio-filters {
        gap: 0.5rem;
    }
    
    .filter-btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .contact-content {
        grid-template-columns: 1fr;
    }
    
    .social-icons {
        justify-content: center;
    }
    
}

@media (max-width: 480px) {
    .container {
        padding: 0 12px;
    }
    
    .hero-section {
        padding: 80px 0 40px;
    }
    
    .about-section,
    .portfolio-section,
    .contact-section {
        padding: 80px 0;
    }
    
    .btn {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
    }
    
    .btn-large {
        padding: 0.8rem 1.6rem;
        font-size: 1rem;
    }
    
    .contact-content {
        grid-template-columns: 1fr;
    }
}/* SECTION FULL WIDTH */
.join-crunchy {
  width: 100%;
  background-color: #f6951d;
  padding: 4rem 1rem;
}

/* CONTAINER */
.join-inner {
  max-width: 1200px; /* reduced from 1500px to make layout smaller */
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem; /* slightly smaller gap */
  align-items: center;
  justify-content: space-between;
  border-radius: 20px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  padding: 2rem;
  background-color: #ffffff;
}

/* TEXT CONTENT */
.join-content {
  flex: 1 1 300px; /* slightly smaller flex-basis */
  max-width: 400px; /* reduced width */
}

.join-content h2 {
  font-size: 1.8rem; /* slightly smaller */
  margin-bottom: 1rem;
  color: #f4941d;
}

.join-content p {
  font-size: 1rem; /* slightly smaller */
  line-height: 1.5;
  color: rgb(12, 9, 9);
  margin-bottom: 1.5rem;
}

/* BUTTONS */
.btn-group {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.btn-group a {
  padding: 0.65rem 1.3rem; /* smaller padding */
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  font-size: 0.9rem;
}

.btn-instagram {
  background-color: #e1306c;
  color: #fff;
}
.btn-instagram:hover {
  background-color: #c32aa3;
}

.btn-tiktok {
  background-color: #1877f2;
  color: #fff;
}
.btn-tiktok:hover {
  background-color: #0e5fd8;
}
.join-inner {
  max-width: 1700px;
  margin: 4rem auto;
  padding: 2rem;
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
}

/* PARAGRAPH SECTION */
.join-content {
  margin-bottom: 2rem;
}

/* GALLERY GRID */
.join-gallery {
  flex: 1 1 350px;
  max-width: 100%;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: repeat(2, 350px); /* ↑ taller rows here */
  gap: 20px;
  margin-top: 2rem;
}

.join-gallery img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  display: block;
  margin: 0;
  padding: 0;
}

/* RESPONSIVE - mobile scrollable horizontal grid */
@media (max-width: 768px) {
  .join-inner {
    padding: 1rem;
    max-width: 100%;
    margin: 2rem auto;
  }

  .join-content {
    margin-bottom: 1.5rem;
  }

  .join-gallery {
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: 60%;
    grid-template-rows: repeat(2, 300px); /* taller rows on mobile too */
    gap: 16px;
    overflow-x: auto;
    overflow-y: hidden;
    max-width: 100%;
    margin-top: 1rem;
    padding-bottom: 1rem;
    scroll-snap-type: x mandatory;
  }

  .join-gallery img {
    scroll-snap-align: start;
    height: 100%;
    width: 100%;
    border-radius: 12px;
  }
}


/* SMALLER SCREENS */
@media (max-width: 480px) {
  .container {
    padding: 0 12px;
  }

  .hero-section {
    padding: 80px 0 40px;
  }

  .about-section,
  .portfolio-section,
  .contact-section {
    padding: 80px 0;
  }

  .btn {
    padding: 0.5rem 1rem;
    font-size: 0.85rem;
  }

  .btn-large {
    padding: 0.7rem 1.3rem;
    font-size: 0.9rem;
  }

  .contact-content {
    grid-template-columns: 1fr;
  }
}

.image-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 1rem;
    height: 500px;
}

.image-box {
    position: relative;
    border-radius: var(--border-radius-large);
    overflow: hidden;
    cursor: pointer;
    transition: var(--transition);
}

.image-box:hover {
    transform: scale(1.02);
}

.image-box.tall {
    grid-row: span 2;
}

.image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* L'image remplit entièrement la box */
    display: block;
    background-color: #2f2c2b; /* Optionnel : couleur de fond */
    transition: transform 0.5s ease;
}

.image-box:hover img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    padding: 1.5rem;
    color: var(--text-light);
    font-weight: 600;
    transform: translateY(100%);
    transition: var(--transition);
}

.image-box:hover .image-overlay {
    transform: translateY(0);
}

    </style>
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-white shadow">
    <!-- ...nav content... -->
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <img src="images/image7.jpg" alt="Professional bedroom photography setup" class="hero-bg-image">
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">
                        <i class="fas fa-award"></i>
                        <span>{{ __('messages.nature_eco_responsible') }}</span>
                    </div>
                    
                    <h1 class="hero-title">
                        {{ __('messages.crunchy_mug') }}
                        <span class="hero-highlight">{{ __('messages.biscuit_naturel') }}</span>
                    </h1>
                    
                    <p class="hero-description">
                        {{ __('messages.hero_description') }}
                    </p>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">{{ __('messages.edible') }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">0%</div>
                            <div class="stat-label">{{ __('messages.waste') }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">{{ __('messages.natural_ingredients') }}</div>
                        </div>
                    </div>
            <div class="hero-actions">
                        <a href="{{ url('/product-grids') }}" class="btn btn-primary btn-large">
                            <i class="fas fa-shopping-bag"></i>
                            {{ __('messages.order_now') }}
                        </a>
                        <a href="{{ url('/about-us') }}" class="btn btn-outline btn-large">
                            <i class="fas fa-users"></i>
                            {{ __('messages.learn_more') }}
                        </a>
                    </div>
                    
                    <div class="hero-trust">
                        <i class="fas fa-shield-alt"></i>
                        <span>{{ __('messages.nice_to_eat_you') }}</span>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <div class="hero-image-showcase">
                        <div class="showcase-main">
                            <img src="images/image8.jpg" alt="Professional bedroom photography setup" class="Professional bedding photography example">
                            <div class="showcase-badge">
                                <span>{{ __('messages.innovant_savoureux') }}</span>
                                <div class="showcase-metrics">
                                    <div class="metric">{{ __('messages.zero_plastic_100_pleasure') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="showcase-thumbnails">
                            <div class="thumbnail active">
                                <img src="images/image1.png" alt="Premium bedding setup">
                            </div>
                            <div class="thumbnail">
                                <img src="images/image2.png" alt="Lifestyle bedding photography">
                            </div>
                            <div class="thumbnail">
                                <img src="images/image5.png" alt="360 degree product view">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hero-scroll-indicator">
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
            <span>{{ __('messages.discover_our_universe') }}</span>
        </div>
    </section>
    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <div class="section-header">
                        <span class="section-tag">{{ __('messages.why_choose_crunchy_cup') }}</span>
                        <h2>{{ __('messages.not_just_cups') }}</h2>
                        <p>{{ __('messages.about_intro') }}</p>
                    </div>
                    
                    <div class="about-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="feature-content">
                                <h3>{{ __('messages.measurable_impact_for_the_planet') }}</h3>
                                <p>{{ __('messages.impact_description') }}</p>
                                <div class="feature-metric">
                                    <span class="metric-value">520%</span>
                                    <span class="metric-label">{{ __('messages.average_plastic_waste_reduction') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="feature-content">
                                <h3>{{ __('messages.fast_delivery') }}</h3>
                                <p>{{ __('messages.delivery_quality') }}</p>
                                <div class="feature-metric">
                                    <span class="metric-value">24h</span>
                                    <span class="metric-label">{{ __('messages.delivery_time') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="feature-content">
                               <h3>{{ __('messages.eco_products_expertise') }}</h3>
                                <p>{{ __('messages.alliance_description') }}</p>
                                <div class="feature-metric">
                                    <span class="metric-value">10M+</span>
                                    <span class="metric-label">{{ __('messages.disposable_glasses_avoided') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                          <div class="about-visual">
              <div class="image-grid">
                  <div class="image-box tall">
                      <img src="images/image9.jpg" alt="Professional photography studio setup">
                      <div class="image-overlay">
                          <span>{{ __('messages.crunchy') }}</span>
                      </div>
                  </div>
                  
                  <div class="image-box">
                      <img src="images/image10.jpg" alt="Lifestyle bedroom setup">
                      <div class="image-overlay">
                          <span>{{ __('messages.tasty') }}</span>
                      </div>
                  </div>
                  
                  <div class="image-box">
                      <img src="images/image11.jpg" alt="Professional bedding photography">
                      <div class="image-overlay">
                          <span>{{ __('messages.natural') }}</span>
                      </div>
                  </div>
              </div>
          </div>

                
            </div>
        </div>
    </section>

    <section class="section12" id="sizes">
  <div class="w-full px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">{{ __('messages.different_sizes_same_crunch') }}</h2>
      <p class="text-lg text-gray-600">{{ __('messages.exist_in_two_practical_formats') }}</p>
    </div>

    <div class="cup-sizes-wrapper">
      
      <!-- Small Cup -->
      <div class="cup-size">
        <img src="{{ asset('images/small.png') }}" alt="Petite taille Crunchy Mug" class="cup-img">
      </div>

      <!-- Large Cup -->
      <div class="cup-size">
        <img src="{{ asset('images/big.png') }}" alt="Grande taille Crunchy Mug" class="cup-img">
      </div>

    </div>
  </div>
</section>
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">{{ __('messages.our_assets') }}</span>
            <h2>{{ __('messages.revolutionary_drink_ware') }}</h2>
            <p>{{ __('messages.discover_why_crunchy_mug_is_the_perfect_choice') }}</p>
        </div>

        <div class="portfolio-filters">
            <button class="filter-btn active" data-filter="all">{{ __('messages.all_advantages') }}</button>
            <button class="filter-btn" data-filter="thermo">{{ __('messages.thermic_resistance') }}</button>
            <button class="filter-btn" data-filter="leakproof">{{ __('messages.water_tightness') }}</button>
            <button class="filter-btn" data-filter="taste">{{ __('messages.no_added_flavor') }}</button>
            <button class="filter-btn" data-filter="calories">{{ __('messages.low_calories') }}</button>
            <button class="filter-btn" data-filter="crunchy">{{ __('messages.crunchy') }}</button>
            <button class="filter-btn" data-filter="eco">{{ __('messages.eco') }}</button>
        </div>

        <div class="portfolio-grid icon-style">
            <!-- Carte 1 -->
            <div class="portfolio-item" data-category="thermo">
                <div class="portfolio-icon text-center">
                    <i class="fas fa-fire fa-3x text-danger"></i>
                    <h3>{{ __('messages.resistant_to_heat') }}</h3>
                    <p>{{ __('messages.supports_up_to_85_c') }}</p>
                    <span class="result-badge">{{ __('messages.beverages_hot_no_worry') }}</span>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="portfolio-item" data-category="leakproof">
                <div class="portfolio-icon text-center">
                    <i class="fas fa-tint-slash fa-3x text-primary"></i>
                    <h3>{{ __('messages.water_tight_for_8_hours') }}</h3>
                    <p>{{ __('messages.designed_to_not_leak') }}</p>
                    <span class="result-badge">{{ __('messages.zero_leak_zero_stress') }}</span>
                </div>
            </div>

            <!-- Carte 3 -->
            <div class="portfolio-item" data-category="taste">
                <div class="portfolio-icon text-center">
                    <i class="fas fa-mug-hot fa-3x text-warning"></i>
                    <h3>{{ __('messages.neutral_taste') }}</h3>
                    <p>{{ __('messages.no_impact_on_your_beverage') }}</p>
                    <span class="result-badge">{{ __('messages.no_added_sugar') }}</span>
                </div>
            </div>

            <!-- Carte 4 -->
            <div class="portfolio-item" data-category="calories">
                <div class="portfolio-icon text-center">
                    <i class="fas fa-apple-alt fa-3x text-success"></i>
                    <h3>{{ __('messages.low_calories') }}</h3>
                    <p>{{ __('messages.pleasure_without_guilt') }}</p>
                    <span class="result-badge">{{ __('messages.light_snack_and_delicious') }}</span>
                </div>
            </div>

            <!-- Carte 5 -->
            <div class="portfolio-item" data-category="crunchy">
                <div class="portfolio-icon text-center">
                    <i class="fas fa-cookie-bite fa-3x text-brown"></i>
                    <h3>{{ __('messages.crunchy_and_delicious') }}</h3>
                    <p>{{ __('messages.like_a_cookie') }}</p>
                    <span class="result-badge">{{ __('messages.from_first_bite_to_last') }}</span>
                </div>
            </div>

            <!-- Carte 6 -->
            <div class="portfolio-item" data-category="eco">
                <div class="portfolio-icon text-center">
                    <i class="fas fa-leaf fa-3x text-green"></i>
                    <h3>{{ __('messages.eco') }}</h3>
                    <p>{{ __('messages.100_biodegradable') }}</p>
                    <span class="result-badge">{{ __('messages.zero_plastic_zero_waste') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="text-center mb-5">
      <h2 class="display-5 fw-bold">{{ __('messages.discover_crunchy_mug') }}</h2>
      <p class="lead text-muted">{{ __('messages.a_way_to_enjoy_your_drinks_responsibly') }}</p>
    </div>

    <div class="position-relative d-flex justify-content-center align-items-center flex-wrap">
      <!-- Image centrale -->
      <img src="images/crunchy_cup.png" alt="Crunchy Mug" class="img-fluid central-cupffee-image">

      <!-- Boîte 1 -->
      <div class="info-box styled-box top-left">
        <h4>{{ __('messages.non_gmo') }}</h4>
        <p>{{ __('messages.100_natural_no_artificial_colorants') }}</p>
      </div>

      <!-- Boîte 2 -->
      <div class="info-box styled-box top-right">
        <h4>{{ __('messages.100_vegan') }}</h4>
        <p>{{ __('messages.based_on_locally_sourced_vegetables_like_cereals_and_coconut_oil') }}</p>
      </div>

      <!-- Boîte 3 -->
      <div class="info-box styled-box bottom-left">
        <h4>{{ __('messages.green_production') }}</h4>
        <p>{{ __('messages.zero_waste_and_pollution_only_the_scent_of_warm_biscuit') }}</p>
      </div>

      <!-- Boîte 4 -->
      <div class="info-box styled-box bottom-right">
        <h4>{{ __('messages.100_natural') }}</h4>
        <p>{{ __('messages.made_from_7_local_and_durable_natural_ingredients') }}</p>
      </div>
    </div>

    <div class="text-center mt-5">
  <a href="{{ url('/product-grids') }}" class="btn btn-lg btn-success px-5 py-3 rounded-pill shadow">
    {{ __('messages.order_now') }}
  </a>
</div>
  </div>
</section>
<section id="about" class="about2-section">
  <div class="container">
    <div class="about-content">
      <div class="about-text">
        <div class="section-header">
          <span class="section-tag">{{ __('messages.solutions_for_professionals') }}</span>
          <h2>{{ __('messages.bulk_orders_durable_partnerships_and_optimized_logistics') }}</h2>
          <p>{{ __('messages.crunchy_cup_accompanies_enterprises_cafes_hotels_caterers_and_distributors_in_their_ecological_transition') }}</p>
          <p>{{ __('messages.we_offer_flexible_order_formats_customizable_packaging_to_your_image_logo_message_branding_and_efficient_logistics_for_a_smooth_distribution') }}</p>
        </div>

        <div class="about-features">
          <div class="feature-item">
            <div class="feature-icon">
              <i class="fas fa-boxes"></i>
            </div>
            <div class="feature-content">
              <h3>{{ __('messages.bulk_orders') }}</h3>
              <p>{{ __('messages.take_advantage_of_discounted_prices_and_volume_adaptations_to_your_needs') }}</p>
              <div class="feature-metric">
                <span class="metric-value">+500</span>
                <span class="metric-label">{{ __('messages.units_delivered_each_month') }}</span>
              </div>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-icon">
              <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="feature-content">
              <h3>{{ __('messages.express_delivery') }}</h3>
              <p>{{ __('messages.we_guarantee_a_24_48h_shipping_for_standard_orders') }}</p>
              <div class="feature-metric">
                <span class="metric-value">24/48h</span>
                <span class="metric-label">{{ __('messages.average_processing_times') }}</span>
              </div>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-icon">
              <i class="fas fa-tags"></i>
            </div>
            <div class="feature-content">
              <h3>{{ __('messages.customized_packaging') }}</h3>
              <p>{{ __('messages.enhance_your_brand_image_with_packaging_to_your_image_logo_colors_slogans_and_we_create_a_consistent_presentation_with_your_brand_while_maintaining_the_ecological_dimension') }}</p>
              <div class="feature-metric">
                <span class="metric-value">100%</span>
                <span class="metric-label">{{ __('messages.adapted_to_your_visual_identity') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="about-visual">
        <div class="about-image-grid">
          <div class="grid-item large">
            <img src="images/image2.png" alt="Commande B2B Crunchy Mug">
            <div class="grid-overlay">
              <span>{{ __('messages.professional') }}</span>
            </div>
          </div>

          <div class="grid-item">
            <img src="images/image31.png" alt="Livraison rapide pour entreprise">
            <div class="grid-overlay">
              <span>{{ __('messages.fast') }}</span>
            </div>
          </div>

          <div class="grid-item">
            <img src="images/image30.png" alt="Packaging personnalisé écoresponsable">
            <div class="grid-overlay">
              <span>{{ __('messages.customized') }}</span>
            </div>
          </div>
        </div>
      <div class="text-center mt-5">
  <a href="{{ url('/contact') }}" class="btn btn-outline-primary btn-lg rounded-pill px-4 py-2">
    {{ __('messages.contact_us') }}
  </a>
</div>
  </div>
  
</section>


<section class="portfolio-section py-16 bg-gray-100">
  <div class="container mx-auto">
    
    <!-- Titre & Introduction -->
    <div class="text-center mb-16 max-w-4xl mx-auto">
      <h2 class="text-4xl lg:text-5xl font-bold text-coffee-800 mb-4 drop-shadow-xl">
        {{ __('messages.what_is_the_difference') }}
      </h2>
      <p class="text-xl text-coffee-700 font-medium">
        {{ __('messages.each_crunchy_mug_replaces') }}
      </p>
    </div>

    <!-- Comparison Block -->
    <div class="comparison-container">

      <!-- Left Column : Crunchy -->
      <div class="comparison-column flex flex-col items-end space-y-6 relative">
        <img src="{{ asset('images/crunchy_cup.png') }}" alt="Crunchy Mug" class="top-image mb-4" />
        <div class="info-box green text-right">
          <h4>{{ __('messages.bio_100') }}</h4>
          <p>{{ __('messages.edible_and_biodegradable') }}</p>
        </div>
        <div class="info-box gold text-right">
          <h4>{{ __('messages.minus_75_percent') }}</h4>
          <p>{{ __('messages.less_co2_emissions') }}</p>
        </div>
        <div class="info-box leaf text-right">
          <h4>{{ __('messages.zero_percent') }}</h4>
          <p>{{ __('messages.zero_waste_process') }}</p>
        </div>
      </div>

      <!-- Center : Earth Slider -->
     <div class="earth-compare-wrapper relative text-center mx-auto">
  <div class="earth-slider relative mx-auto">
    <img src="{{ asset('images/before.png') }}" alt="Avant"
         class="earth-img before absolute top-0 left-0 w-full h-full object-cover rounded-full" />
    <img src="{{ asset('images/after.png') }}" alt="Après"
         class="earth-img after absolute top-0 left-0 w-full h-full object-cover rounded-full clip-half" />
    <div class="handle absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 cursor-ew-resize">
      <div class="handle-line w-1 h-64 bg-coffee-600 rounded"></div>
      <div class="handle-icon text-2xl font-bold mt-2 select-none">⇄</div>
    </div>
  </div>
  <p class="slider-text mt-4 text-coffee-700 text-sm italic">{{ __('messages.slide_to_compare') }}</p>
</div>

      <!-- Right Column : Plastic -->
      <div class="comparison-column flex flex-col items-start space-y-6 relative">
        <img src="{{ asset('images/plastique.png') }}" alt="Gobelet Plastique" class="top-image mb-4" />
        <div class="info-box coffee1 text-left">
          <h4>{{ __('messages.five_hundred_billion') }}</h4>
          <p>{{ __('messages.used_each_year') }}</p>
        </div>
        <div class="info-box coffee2 text-left">
          <h4>{{ __('messages.less_than_one_percent') }}</h4>
          <p>{{ __('messages.recycled') }}</p>
        </div>
        <div class="info-box coffee3 text-left">
          <h4>{{ __('messages.plus_450_years') }}</h4>
          <p>{{ __('messages.to_decompose') }}</p>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="join-crunchy">
  <div class="join-inner">
    <div class="join-content">
      <h2>{{ __('messages.join_crunchy_mug') }}</h2>
      <p>
        {{ __('messages.follow_us_on_social') }}
      </p>
      <div class="btn-group">
        <a href="https://www.instagram.com/crunchymug/" class="btn-instagram">📷 INSTAGRAM</a>
        <a href="https://www.facebook.com/profile.php?id=61577771019753" class="btn-tiktok"> FACEBOOK</a>
      </div>
    </div>

    <div class="join-gallery">
      <img src="{{ asset('images/1.jpg') }}" alt="">
      <img src="{{ asset('images/2.jpg') }}" alt="">
      <img src="{{ asset('images/3.jpg') }}" alt="">
      <img src="{{ asset('images/4.jpg') }}" alt="">
      <img src="{{ asset('images/5.jpg') }}" alt="">
      <img src="{{ asset('images/6.jpg') }}" alt="">
      <img src="{{ asset('images/7.jpg') }}" alt="">
      <img src="{{ asset('images/8.jpg') }}" alt="">
    </div>
  </div>
</section>
<section id="rc-testimonials" class="rc-section">
  <div class="rc-container">
    <div class="rc-header">
      <h2>{{ __('messages.what_our_customers_say') }}</h2>
    </div>

    <div class="rc-grid">
      <!-- Avis 1 -->
      <div class="rc-card">
        <div class="rc-stars" aria-label="Note 5 étoiles">★★★★★</div>
        <p class="rc-comment">{{ __('messages.testimonial_1') }}</p>
        <p class="rc-author">{{ __('messages.sophie_m') }}</p>
      </div>

      <!-- Avis 2 -->
      <div class="rc-card">
        <div class="rc-stars" aria-label="Note 4 étoiles">★★★★☆</div>
        <p class="rc-comment">{{ __('messages.testimonial_2') }}</p>
        <p class="rc-author">{{ __('messages.julien_d') }}</p>
      </div>

      <!-- Avis 3 -->
      <div class="rc-card">
        <div class="rc-stars" aria-label="Note 5 étoiles">★★★★★</div>
        <p class="rc-comment">{{ __('messages.testimonial_3') }}</p>
        <p class="rc-author">{{ __('messages.amelie_b') }}</p>
      </div>
    </div>
  </div>
</section>



@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.earth-slider');
  const afterImg = slider.querySelector('.after');
  const handle = slider.querySelector('.handle');

  let isDragging = false;

  const updateClip = (x) => {
    const rect = slider.getBoundingClientRect();
    let percent = (x - rect.left) / rect.width;
    percent = Math.max(0, Math.min(1, percent));

    // Désactive la transition pendant le drag pour plus de réactivité
    afterImg.style.transition = 'none';
    handle.style.transition = 'none';

    afterImg.style.clipPath = `inset(0 ${100 - percent * 100}% 0 0 round 50%)`;
    handle.style.left = `${percent * 100}%`;

    // Réactive la transition après 100ms pour l'effet smooth hors drag
    clearTimeout(window._clipTransitionTimeout);
    window._clipTransitionTimeout = setTimeout(() => {
      afterImg.style.transition = 'clip-path 0.2s ease';
      handle.style.transition = 'left 0.2s ease';
    }, 100);
  };

  slider.addEventListener('mousedown', () => isDragging = true);
  slider.addEventListener('touchstart', () => isDragging = true);

  window.addEventListener('mouseup', () => isDragging = false);
  window.addEventListener('touchend', () => isDragging = false);

  window.addEventListener('mousemove', (e) => {
    if (isDragging) updateClip(e.clientX);
  });

  window.addEventListener('touchmove', (e) => {
    if (isDragging) updateClip(e.touches[0].clientX);
  });

  // Position initiale au centre
  const rect = slider.getBoundingClientRect();
  const center = rect.left + rect.width / 2;
  updateClip(center);
});

setTimeout(() => {
  $('.alert').slideUp();
}, 5000);

$(function() {
  // Multi Level dropdowns
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();

    $(this).siblings().toggleClass("show");

    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }

    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });
  });
});
</script>

