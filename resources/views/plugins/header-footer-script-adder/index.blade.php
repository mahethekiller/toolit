@extends('layouts.landing')

@section('header')
    @include('plugins.header-footer-script-adder.header')
@endsection

@section('content')
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Premium Custom Styles for the Landing Page -->
    <style>
        /* Modern Design Tokens & Variables */
        :root {
            --hf-primary: #4f46e5;
            --hf-primary-hover: #4338ca;
            --hf-primary-rgb: 79, 70, 229;
            --hf-secondary: #06b6d4;
            --hf-success: #10b981;
            --hf-dark: #0f172a;
            --hf-light: #f8fafc;
            --font-headings: 'Outfit', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        .hf-landing-wrapper {
            font-family: var(--font-body);
            color: #334155;
            background-color: #ffffff;
            margin: 0;
            overflow: hidden;
        }

        /* Typography Override */
        .hf-landing-wrapper h1,
        .hf-landing-wrapper h2,
        .hf-landing-wrapper h3,
        .hf-landing-wrapper h4,
        .hf-landing-wrapper h5,
        .hf-landing-wrapper h6 {
            font-family: var(--font-headings);
            color: var(--hf-dark);
            font-weight: 700;
        }

        /* Section Layout Helpers */
        .hf-section {
            padding: 5.5rem 1.5rem;
            position: relative;
        }
        
        .hf-section-alt {
            background-color: var(--hf-light);
        }

        .hf-gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            color: #ffffff;
        }

        /* Title Styling */
        .hf-section-subtitle {
            text-transform: uppercase;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            color: var(--hf-primary);
            margin-bottom: 0.75rem;
            display: inline-block;
        }

        .hf-section-title {
            font-size: 2.25rem;
            line-height: 1.25;
            margin-bottom: 1.25rem;
            color: var(--hf-dark);
        }

        .hf-gradient-text {
            background: linear-gradient(135deg, var(--hf-primary) 0%, var(--hf-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hf-section-desc {
            font-size: 1.1rem;
            color: #64748b;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 3.5rem;
        }

        /* Premium Buttons */
        .btn-hf-primary {
            background: linear-gradient(135deg, var(--hf-primary) 0%, #6366f1 100%);
            color: #ffffff;
            border: none;
            padding: 0.85rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-hf-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.6);
            color: #ffffff;
        }

        .btn-hf-secondary {
            background: #ffffff;
            color: var(--hf-dark);
            border: 2px solid #e2e8f0;
            padding: 0.85rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-hf-secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        /* Glassmorphism Cards */
        .hf-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 2.25rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
            height: 100%;
        }

        .hf-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            border-color: rgba(var(--hf-primary-rgb), 0.2);
        }

        /* Modern Image Placeholders */
        .hf-image-placeholder {
            background: linear-gradient(135deg, #e0e7ff 0%, #cffafe 100%);
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px dashed rgba(var(--hf-primary-rgb), 0.3);
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 250px;
            text-align: center;
            overflow: hidden;
        }

        .hf-image-placeholder::before {
            content: '';
            position: absolute;
            top: 0; right: 0; bottom: 0; left: 0;
            background: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15 0C6.716 0 0 6.716 0 15c0 8.284 6.716 15 15 15 8.284 0 15-6.716 15-15C30 6.716 23.284 0 15 0zm0 28C7.82 28 2 22.18 2 15S7.82 2 15 2s13 5.82 13 13-5.82 13-13 13z' fill='%234f46e5' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }

        .hf-image-prompt-card {
            background: rgba(15, 23, 42, 0.9);
            color: #cbd5e1;
            border-radius: 12px;
            padding: 1rem;
            font-size: 0.8rem;
            font-family: monospace;
            text-align: left;
            width: 100%;
            margin-top: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .hf-image-prompt-badge {
            background: var(--hf-secondary);
            color: #0f172a;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.65rem;
            text-transform: uppercase;
            position: absolute;
            top: -10px;
            right: 15px;
            letter-spacing: 0.05em;
        }

        /* Animations */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }

        .float-animation {
            animation: float-slow 8s ease-in-out infinite;
        }

    </style>

    <div class="hf-landing-wrapper">
        {{-- Section 1: Hero --}}
        @include('plugins.header-footer-script-adder.hero')

        {{-- Section 2: Features --}}
        @include('plugins.header-footer-script-adder.features')

        {{-- Section 3: Pricing --}}
        @include('plugins.header-footer-script-adder.pricing')

        {{-- Section 4: Use Cases --}}
        @include('plugins.header-footer-script-adder.use-cases')

        {{-- Section 5: How It Works --}}
        @include('plugins.header-footer-script-adder.how-it-works')

        {{-- Section 6: Reviews / Testimonials --}}
        @include('plugins.header-footer-script-adder.reviews')

        {{-- Section 7: FAQs --}}
        @include('plugins.header-footer-script-adder.faq')

        {{-- Section 8: Support Queries --}}
        @include('plugins.header-footer-script-adder.support')

        {{-- Section 9: Bottom CTA --}}
        @include('plugins.header-footer-script-adder.cta')
    </div>
@endsection

@section('footer')
    @include('plugins.header-footer-script-adder.footer')
@endsection
