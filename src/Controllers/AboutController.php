<?php

namespace WTG\Base\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WTG\Content\Interfaces\ContentInterface as Content;

/**
 * About Controller
 *
 * @package     WTG\Base
 * @subpackage  Controllers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class AboutController extends Controller
{
    /**
     * About.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function view(Request $request)
    {
        $manufacturers = json_decode(file_get_contents(__DIR__.'/../Resources/manufacturers.json'));

        return view('base::pages.about', compact('manufacturers'));
    }
}