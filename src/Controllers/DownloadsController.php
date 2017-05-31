<?php

namespace WTG\Base\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WTG\Content\Interfaces\ContentInterface as Content;

/**
 * Downloads Controller
 *
 * @package     WTG\Base
 * @subpackage  Controllers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class DownloadsController extends Controller
{
    /**
     * Downloads.
     *
     * @param  Request  $request
     * @param  Content  $content
     *
     * @return \Illuminate\View\View
     */
    public function view(Request $request, Content $content)
    {
        $catalog = $content->where('tag', 'downloads.catalog')->first();
        $flyers = $content->where('tag', 'downloads.flyers')->first();
        $files = $content->where('tag', 'downloads.files')->first();

        return view('base::pages.downloads', compact('catalog', 'flyers', 'files'));
    }
}