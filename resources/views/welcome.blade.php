<title>{{ config('app.name', 'PMTI AMS') }}</title>
<link rel="icon" type="image/png" href="{{ asset('PMTI.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 24px;
        font-family: 'Open Sans', sans-serif;
        background: radial-gradient(circle at 50% 50%, #20293A 0%, #111827 100%);
        -webkit-font-smoothing: antialiased;
    }

    .wrapper {
        width: 100%;
        max-width: 1180px;
    }

    .main-card {
        display: flex;
        flex-direction: row;
        overflow: hidden;
        border-radius: 16px;
        background: #0D1321;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.04);
        min-height: 620px;
    }

    .left-panel {
        flex: 1.1;
        background: linear-gradient(145deg, #131A2C 0%, #090D16 100%);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 48px;
        text-align: center;
        border-right: 1px solid rgba(255, 255, 255, 0.02);
    }

    .left-panel::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 40%, rgba(255, 255, 255, 0.02) 0%, transparent 60%);
        pointer-events: none;
    }

    .right-panel {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 48px;
        background: #0D1321;
    }

    .brand-container {
        width: 100%;
        max-width: 450px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .brand-logo {
        max-width: 50%;
        width: 100%;
        height: auto;
        margin-bottom: 45px;
        display: block;
        object-fit: contain;
        background: transparent;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
    }

    .company-name {
        font-size: 28px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.01em;
    }

    .company-tagline {
        font-size: 14px;
        font-style: italic;
        color: #94A3B8;
        line-height: 1.6;
        max-width: 360px;
    }

    .login-container {
        width: 100%;
        max-width: 380px;
        text-align: left;
    }

    .welcome-title {
        font-size: 13px;
        font-weight: 700;
        color: #38BDF8;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        margin-bottom: 12px;
    }

    .typing-box {
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-bottom: 48px;
    }

    .welcome-line-1, 
    .welcome-line-2 {
        font-size: 24px;
        font-weight: 600;
        color: #F8FAFC;
        line-height: 1.3;
        letter-spacing: -0.01em;
        white-space: nowrap;
        overflow: hidden;
        max-width: 0;
    }

    .welcome-line-1 {
        border-right: 3px solid #38BDF8;
        animation: 
            typing-line1 1.4s steps(15, end) forwards,
            cursor-blink 0.75s step-end infinite,
            hide-cursor 0s linear 1.4s forwards;
    }

    .welcome-line-2 {
        border-right: 3px solid transparent;
        animation: 
            typing-line2 2.0s steps(26, end) 1.4s forwards,
            cursor-blink-delayed 0.75s step-end 1.4s infinite alternate;
    }

    @keyframes typing-line1 {
        from { max-width: 0; }
        to { max-width: 210px; }
    }

    @keyframes typing-line2 {
        from { max-width: 0; }
        to { max-width: 350px; } 
    }

    @keyframes cursor-blink {
        from, to { border-color: transparent }
        50% { border-color: #38BDF8; }
    }

    @keyframes cursor-blink-delayed {
        from, to { border-color: transparent }
        50% { border-color: #38BDF8; }
    }

    @keyframes hide-cursor {
        to { border-right-color: transparent; }
    }

    .btn-primary-custom {
        display: block;
        width: 100%;
        background: #ffffff;
        color: #090D16;
        padding: 14px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        text-align: center;
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.05);
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .btn-primary-custom:hover {
        background: #F1F5F9;
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.1);
    }

    .btn-outline-custom {
        display: block;
        width: 100%;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #E2E8F0;
        padding: 14px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        text-align: center;
        margin-top: 14px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .btn-outline-custom:hover {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 255, 255, 0.3);
        color: #ffffff;
        transform: translateY(-1px);
    }

    @media(max-width:768px) {
        body {
            padding: 16px;
        }

        .main-card {
            flex-direction: column;
            min-height: auto;
        }

        .left-panel,
        .right-panel {
            padding: 48px 24px;
            text-align: center;
        }

        .login-container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .brand-logo {
            max-width: 40%;
        }

        .company-name {
            font-size: 24px;
        }

        .typing-box {
            max-width: 100%;
            align-items: center;
        }

        .welcome-line-1, 
        .welcome-line-2 {
            font-size: 18px;
            white-space: normal;
            border-right: none !important;
            animation: none !important;
            width: auto;
            text-align: center;
        }
    }
</style>

<body>

<div class="wrapper">
    <div class="main-card">

        <div class="left-panel">
            <div class="brand-container">
                <img
                    src="{{ asset('PMTI.png') }}"
                    alt="PMTI Logo"
                    class="brand-logo"
                >
                <div class="company-name">
                    Pilipinas Micro-Matrix Technology Inc.
                </div>
                <div class="company-tagline">
                    Streamlining organizational knowledge assets with advanced system matrices.
                </div>
            </div>
        </div>

        <div class="right-panel">
            <div class="login-container">
                <div class="welcome-title">
                    Greetings!
                </div>
                
                <div class="typing-box">
                    <div class="welcome-line-1">Welcome to PMTI</div>
                    <div class="welcome-line-2">Article Management System</div>
                </div>

                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="btn-primary-custom"
                    >
                        Go to Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="btn-primary-custom"
                    >
                        Login
                    </a>

                    @if(Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="btn-outline-custom"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>

    </div>
</div>

</body>