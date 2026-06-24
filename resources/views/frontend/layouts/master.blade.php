<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('frontend.layouts.head')	
</head>
<body class="js">
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- Bandeau Cookies -->
    <div id="cookie-consent" class="cookie-box" role="dialog" aria-live="polite" aria-label="Cookie consent">
        <div class="cookie-content">
            <div class="cookie-icon" aria-hidden="true">🍪</div>
            <div class="cookie-text">
                <p>{!! __('messages.cookie_consent_text') !!}</p>
            </div>
        </div>
        <div class="cookie-actions">
            <button id="accept-cookies" class="cookie-button">{{ __('messages.accept_cookies') }}</button>
            <button id="decline-cookies" class="cookie-button" style="background:#e74c3c; margin-left:10px;">{{ __('messages.cookie_decline') }}</button>
        </div>
    </div>

    <!-- CSS Personnalisé -->
    <style>
        .cookie-box {
            position: fixed;
            bottom: 20px;
            left: 20px;
            max-width: 400px;
            width: 100%;
            background: linear-gradient(135deg, #ffffff, #f5faff);
            color: #333;
            border: 2px solid #4dabf7;
            border-left: 10px solid #ffa502;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            padding: 20px 22px;
            z-index: 9999;
            display: none;
            animation: fadeIn 0.5s ease-in-out;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .cookie-content {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .cookie-icon {
            font-size: 30px;
            flex-shrink: 0;
            color: #f39c12;
        }

        .cookie-text p {
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
            color: #2f3542;
        }

        .cookie-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 18px;
        }

        .cookie-button {
            background-color: #4dabf7;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(77, 171, 247, 0.4);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .cookie-button:hover {
            background-color: #339af0;
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 500px) {
            .cookie-box {
                left: 10px;
                right: 10px;
                max-width: calc(100% - 20px);
            }
            .cookie-text p {
                font-size: 14px;
            }
        }
    </style>

    <!-- End Preloader -->
    @include('frontend.layouts.notification')
    @include('frontend.layouts.header')
    @yield('main-content')
    @include('frontend.layouts.footer')

    <!-- Script Cookie -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const consentBox = document.getElementById('cookie-consent');
            const acceptBtn = document.getElementById('accept-cookies');
            const declineBtn = document.getElementById('decline-cookies');

            if (!localStorage.getItem('cookie_accepted') && !localStorage.getItem('cookie_declined')) {
                consentBox.style.display = 'block';
            }

            acceptBtn.addEventListener('click', function () {
                localStorage.setItem('cookie_accepted', 'true');
                consentBox.style.display = 'none';
            });
            declineBtn.addEventListener('click', function () {
                localStorage.setItem('cookie_declined', 'true');
                consentBox.style.display = 'none';
            });
        });
    </script>
</body>
</html>

@push('styles')
<style>
    .cookie-box {
        position: fixed;
        left: 50%;
        bottom: 2.5rem;
        transform: translateX(-50%);
        z-index: 9999;
        background: #fffbea;
        color: #222;
        border-radius: 1.2rem;
        box-shadow: 0 8px 32px rgba(60,60,60,0.18);
        padding: 1.5rem 2rem 1.2rem 2rem;
        min-width: 320px;
        max-width: 95vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 1.08rem;
    }
    .cookie-content {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1rem;
        width: 100%;
    }
    .cookie-icon {
        font-size: 2rem;
        margin-top: 0.1rem;
        flex-shrink: 0;
    }
    .cookie-text p {
        margin: 0;
        color: #222;
        font-weight: 500;
        line-height: 1.5;
    }
    .cookie-actions {
        display: flex;
        gap: 0.7rem;
        width: 100%;
        justify-content: center;
        margin-top: 0.5rem;
        flex-wrap: wrap;
    }
    .cookie-button {
        border: none;
        border-radius: 2rem;
        padding: 0.6rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.18s, color 0.18s, box-shadow 0.18s;
        box-shadow: 0 2px 8px rgba(186, 35, 123, 0.10);
        margin-bottom: 0.2rem;
        background: #f1c40f;
        color: #222;
    }
    .cookie-button:hover {
        background: #ffe0f5;
        color: #127fbf;
    }
    @media (max-width: 600px) {
        .cookie-box {
            padding: 1.1rem 0.7rem 1rem 0.7rem;
            min-width: 0;
        }
        .cookie-content {
            flex-direction: column;
            align-items: center;
            gap: 0.7rem;
        }
        .cookie-actions {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>
@endpush
