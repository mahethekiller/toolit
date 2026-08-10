<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class PageController extends Controller
{
    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function termsOfUse()
    {
        return view('pages.terms-of-use');
    }

    public function adsDisclosure()
    {
        return view('pages.ads-disclosure');
    }

    public function dataDeletion()
    {
        return view('pages.data-deletion');
    }

    public function howWeProcessData()
    {
        $seo = (object) [
            'title' => 'How We Process Data – Client-Side Privacy | onlinetxttools.com',
            'description' => 'Learn how all text tools on onlinetxttools.com process your data 100% locally in your web browser. No databases, no logs, and complete client-side security.',
            'keywords' => 'data processing, client-side tools, private text tools, local text processing, secure web utilities',
            'og_title' => 'How We Process Data – Client-Side Privacy',
            'og_description' => 'Find out how our browser-based text tools guarantee complete data confidentiality by executing 100% locally.',
            'canonical' => route('how-we-process-data')
        ];

        return view('pages.how-we-process-data', compact('seo'));
    }

    public function faqsHub()
    {
        $seo = (object) [
            'title' => 'Frequently Asked Questions (FAQ) Hub | onlinetxttools.com',
            'description' => 'Browse our unified FAQ Hub. Get answers to common questions about case conversion, word counting, security, and client-side processing.',
            'keywords' => 'text tools faq, online text tools help, faq hub, general questions text tools',
            'og_title' => 'Frequently Asked Questions (FAQ) Hub',
            'og_description' => 'Have questions? Get quick, comprehensive answers about how our online utilities function.',
            'canonical' => route('faqs')
        ];

        $faqs = Faq::all()->groupBy('group_name');

        return view('pages.faqs', compact('seo', 'faqs'));
    }

    public function headerFooterScriptAdder()
    {
        $seo = (object) [
            'title' => 'Header Footer Script Adder – Insert HTML, CSS & JS in WordPress',
            'description' => 'Easily add Google Analytics, pixels, custom CSS & JS to WordPress header, body, or footer. Includes per-page overrides & syntax highlighting.',
            'keywords' => 'header footer script adder, insert scripts wordpress, google analytics wordpress, custom head css wordpress, body tracking code wordpress',
            'og_title' => 'Header Footer Script Adder – Insert Code in Header, Body & Footer',
            'og_description' => 'Add custom scripts and code to your WordPress site safely. Features conditional loading, per-page overrides, and code syntax highlighting.',
            'og_image' => 'https://ps.w.org/header-and-footer-script-adder/assets/banner-772x250.png?rev=3564161',
            'canonical' => route('plugins.header-footer-script-adder')
        ];

        $num1 = rand(1, 9);
        $num2 = rand(1, 9);
        session(['plugin_captcha_answer' => $num1 + $num2]);

        return view('plugins.header-footer-script-adder.index', compact('seo', 'num1', 'num2'));
    }

    public function headerFooterScriptAdderThankYou()
    {
        $seo = (object) [
            'title' => 'Thank You for Your Purchase – Header Footer Script Adder Pro',
            'description' => 'Thank you for upgrading to Header Footer Script Adder Pro. Get started by downloading the plugin and activating your license.',
            'keywords' => 'thank you, script manager pro, license activation',
            'og_title' => 'Thank You for Upgrading to Pro',
            'og_description' => 'Get started with your new Pro features today.',
            'og_image' => 'https://ps.w.org/header-and-footer-script-adder/assets/banner-772x250.png?rev=3564161',
            'canonical' => route('plugins.header-footer-script-adder.thank-you')
        ];

        return view('plugins.header-footer-script-adder.thank-you', compact('seo'));
    }
}
