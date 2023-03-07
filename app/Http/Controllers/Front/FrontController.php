<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;

class FrontController extends Controller
{
    public function get_faq()
    {
        $faqs = Faq::get();
        return view('front.faq', compact('faqs'));
    }
}
