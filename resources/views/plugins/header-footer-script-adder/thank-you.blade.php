@extends('layouts.landing')

@push('head')


    <!-- Event snippet for Page view conversion page -->
    <script>
      gtag('event', 'conversion', {'send_to': 'AW-963171678/NMZ0CLerzOwBEN6qo8sD'});
    </script>
@endpush

@section('header')
    @include('plugins.header-footer-script-adder.header')
@endsection

@section('content')
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --hf-primary: #4f46e5;
            --hf-primary-hover: #4338ca;
            --hf-secondary: #06b6d4;
            --hf-dark: #0f172a;
            --hf-light: #f8fafc;
            --font-headings: 'Outfit', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        .hf-thankyou-wrapper {
            font-family: var(--font-body);
            color: #334155;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            min-height: 85vh;
            display: flex;
            align-items: center;
            padding: 5rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .hf-thankyou-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 28px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 3.5rem 2.5rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hf-success-icon-box {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            font-size: 2.25rem;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
            animation: scaleIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .font-heading {
            font-family: var(--font-headings);
        }

        .hf-step-number {
            width: 32px;
            height: 32px;
            background: var(--hf-primary);
            color: #ffffff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        @keyframes scaleIn {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>

    <div class="hf-thankyou-wrapper">
        <!-- Floating neon shapes in background -->
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 80%; height: 80%; background: radial-gradient(circle, rgba(79, 70, 229, 0.15) 0%, rgba(0, 0, 0, 0) 70%); z-index: 1; pointer-events: none;"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="hf-thankyou-card">
                        <!-- Success Checkmark -->
                        <div class="hf-success-icon-box">
                            <i class="fas fa-check"></i>
                        </div>

                        <!-- Header -->
                        <h1 class="display-5 fw-extrabold text-dark font-heading mb-3">Upgrade Successful!</h1>
                        <p class="lead text-muted mb-5">Thank you for purchasing **Header Footer Script Adder Pro**. Get ready to supercharge your site's performance and conversion tracking.</p>

                        <!-- Next Steps List -->
                        <div class="text-start mb-5 bg-light p-4 rounded-4 border border-light-subtle">
                            <h3 class="h6 fw-bold text-dark font-heading mb-4 text-uppercase tracking-wider"><i class="fas fa-list-check text-primary me-2"></i> What to do next:</h3>

                            <div class="d-flex align-items-start mb-4">
                                <div class="hf-step-number">1</div>
                                <div>
                                    <h4 class="h6 fw-bold text-dark mb-1">Check Your Email</h4>
                                    <p class="text-muted small mb-0">We have sent your purchase receipt, license activation key, and the Pro plugin files link directly to your inbox.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="hf-step-number">2</div>
                                <div>
                                    <h4 class="h6 fw-bold text-dark mb-1">Upload the Pro Plugin</h4>
                                    <p class="text-muted small mb-0">In your WordPress Dashboard, go to <strong>Plugins &gt; Add New &gt; Upload Plugin</strong> and choose the downloaded Pro `.zip` file.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start">
                                <div class="hf-step-number">3</div>
                                <div>
                                    <h4 class="h6 fw-bold text-dark mb-1">Activate Your License Key</h4>
                                    <p class="text-muted small mb-0">Enter the license key from your receipt in the plugin settings screen to immediately unlock all targeting rules and optimizations.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Actions Buttons -->
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="{{ route('plugins.header-footer-script-adder') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold" style="background: linear-gradient(135deg, var(--hf-primary) 0%, #6366f1 100%); border: none; box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);">
                                <i class="fas fa-home me-2"></i> Return to Homepage
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-secondary px-5 py-3 rounded-pill fw-bold border-2">
                                <i class="fas fa-headset me-2"></i> Need Help? Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('plugins.header-footer-script-adder.footer')
@endsection
