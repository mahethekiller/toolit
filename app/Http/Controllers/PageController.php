<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
