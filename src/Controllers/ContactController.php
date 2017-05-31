<?php

namespace WTG\Base\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WTG\Content\Interfaces\ContentInterface as Content;

/**
 * Contact Controller
 *
 * @package     WTG\Base
 * @subpackage  Controllers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ContactController extends Controller
{
    /**
     * Contact.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function view(Request $request)
    {
        return view('base::pages.contact');
    }
}