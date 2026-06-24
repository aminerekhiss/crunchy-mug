<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<link rel="icon" type="image/png" href="images/favic-32x32.png">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }

    /*
</style>
@stack('styles')
<style>
.topnav-link {
    color: #000 !important;
}
.header .middle-inner {
    background: linear-gradient(to bottom, #b89b6a 0%, #e7d3b0 35%, #f5ecd7 70%, #fff8f0 100%) !important;
}
.header .header-inner {
    background: linear-gradient(to bottom, #fff8f0 0%, #f7f3ea 60%, #f3f3ef 100%) !important;
    border-top: 2.5px solid #d2b48c !important;
}
.header .cat-heading, .header .main-category .cat-heading {
    color: #000 !important;
}
.header.shop .cat-heading {
    color: #000 !important;
}
.header .logo img, .logo img {
    max-width: 340px !important;
    width: 100% !important;
    height: auto !important;
    display: block;
    margin: 0 auto;
}
/* Revert width changes and reduce topnav height instead */
.header .nav.main-menu.menu.navbar-nav {
    max-width: none !important;
    margin: 0 !important;
    width: 100%;
    display: flex !important;
    justify-content: center !important;
}
.header .nav.main-menu.menu.navbar-nav > li > a {
    padding-top: 20px !important;
    padding-bottom: 20px !important;
    /* Keep horizontal padding default */
}
/* Make the first section thinner */
.header .middle-inner {
    padding-top: 2px !important;
    padding-bottom: 2px !important;
}
.header .middle-inner select[name='category'] {
    color: #000 !important;
}
.header.shop .main-category li a,
.header.shop .main-category li .sub-category a,
.header.shop .main-category li .mega-menu .inner-link a {
    color: #000 !important;
}
/* FORCE CATEGORY AND SUBCATEGORY LINKS TO BLACK */
.header.shop .main-category li a,
.header.shop .main-category li .sub-category a,
.header.shop .main-category li .mega-menu .single-menu a,
.header.shop .main-category li .mega-menu .single-menu .inner-link a,
.header.shop .main-category li .mega-menu .single-menu .title-link,
.header.shop .cat-heading {
    color: #000 !important;
}
</style>
