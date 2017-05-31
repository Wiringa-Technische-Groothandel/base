<?php

namespace WTG\Base\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WTG\Content\Interfaces\ContentInterface as Content;

/**
 * Home Controller
 *
 * @package     WTG\Base
 * @subpackage  Controllers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class HomeController extends Controller
{
    /**
     * Homepage
     *
     * @param  Request  $request
     * @param  Content  $content
     *
     * @return \Illuminate\View\View
     */
    public function view(Request $request, Content $content)
    {
        $news = $content->where('tag', 'home.news')->first();
        $carouselItems = [];

        return view('base::pages.home', compact('carouselItems', 'news'));
    }
}