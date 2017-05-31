<?php

if (! function_exists('format_number')) {
    /**
     * Number formatter.
     *
     * @param  float  $number
     * @param  int  $decimals
     * @param  string  $decimal_point
     * @param  string  $thousand_separator
     * @return string
     */
    function format_number($number, $decimals = 0, $decimal_point = ',', $thousand_separator = '.')
    {
        return number_format($number, $decimals, $decimal_point, $thousand_separator);
    }
}

if (! function_exists('format_price')) {
    /**
     * Format a price
     *
     * @param  float  $number
     * @return string
     */
    function format_price($number)
    {
        return number_format($number, 2, ',', '.');
    }
}

if (! function_exists('format_name')) {
    /**
     * Uppercase the full user name.
     *
     * @param  string  $name
     * @return string
     */
    function format_name($name)
    {
        return ucwords(strtolower($name));
    }
}

if (! function_exists('byte_to_str')) {
    /**
     * Convert bytes to a human readable format.
     *
     * @param  float  $bytes
     * @return string
     */
    function byte_to_str($bytes)
    {
        $type = ['', 'kilo', 'mega', 'giga', 'tera', 'peta', 'exa', 'zetta', 'yotta'];
        $index = 0;

        while ($bytes >= 1024) {
            $bytes /= 1024;

            $index++;
        }

        return round($bytes, 2).' '.$type[$index].'bytes';
    }
}

if (! function_exists('format_action_type')) {
    /**
     * Transform the product action type
     *
     * @param  string  $type
     * @return string
     */
    function format_action_type($type)
    {
        switch ($type) {
            case 'clearance':
                return 'Opruiming';
                break;
            case 'action':
                return 'Actie';
                break;
            default:
                return $type;
                break;
        }
    }
}

if (! function_exists('format_stock_code')) {
    /**
     * Transform the stock code
     *
     * @param  string  $code
     * @return string
     */
    function format_stock_code($code)
    {
        switch ($code) {
            case 'A':
                return 'Uit voorraad';
                break;
            case 'B':
                return 'Binnen 24/48 uur mits voor 16.00 besteld';
                break;
            case 'C':
                return 'In overleg';
                break;
            case 'D':
                return 'Uitlopend';
                break;
            default:
                return $code;
                break;
        }
    }
}

if (! function_exists('format_price_per')) {
    /**
     * Transform the price_per code
     *
     * @param  string  $code
     * @return string
     */
    function format_price_per($code)
    {
        switch ($code) {
            case 'Stk':
                return 'Stuk';
                break;
            case 'Mtr':
                return 'Meter';
                break;
            case 'Ds':
                return 'Doos';
                break;
            case 'Plt':
                return 'Plaat';
                break;
            case 'Stl':
                return 'Stel';
                break;
            case 'Mt2':
                return 'Meter&sup2;';
                break;
            case 'Str':
                return 'Streng';
                break;
            case 'Pr':
                return 'Paar';
                break;
            case 'Lgt':
                return 'Lengte';
                break;
            default:
                return $code;
                break;
        }
    }
}

if (! function_exists('time_to_next_import')) {
    /**
     * Calculate and return the number of minutes to the next 10 minute mark.
     *
     * @return int
     */
    function time_to_next_import()
    {
        // Set the timezone
        date_default_timezone_set('Europe/Amsterdam');

        // This will magically set the $datetime to the next 10 minute mark
        $datetime = new \DateTime();
        $time_to_next_10_minutes = 10 - ($datetime->format('i') % 10);

        // return the difference between now and the next 10 minute mark
        return ceil($time_to_next_10_minutes);
    }
}


//    /**
//     * Get all the discounts for a specific user.
//     *
//     * @param  int  $userId
//     * @param  int  $group
//     * @param  int  $product
//     * @return float
//     */
//    public function getProductDiscount($userId, $group = 0, $product = 0)
//    {
//        $discounts = [];
//
//        // Add the default discounts
//        $default_discounts = DB::table('discounts')->select('discount', 'User_Id', 'product')->where('table', 'VA-221')->whereNotIn('product', function ($query) use ($userId) {
//            $query->select('product')
//                ->from('discounts')
//                ->where('table', 'VA-220')
//                ->where('User_Id', $userId);
//        })->get();
//
//        foreach ($default_discounts as $discount) {
//            $discounts[$discount->product] = preg_replace("/\,/", '.', $discount->discount);
//        }
//
//        // Overwrite the defaults with the discounts linked to the product group
//        $groupDiscounts = DB::table('discounts')->select('discount', 'User_Id', 'product')->where('table', 'VA-220')->where('User_Id', $userId)->get();
//
//        foreach ($groupDiscounts as $discount) {
//            $discounts[$discount->product] = preg_replace("/\,/", '.', $discount->discount);
//        }
//
//        // Overwrite the previous data with the discounts linked to the product number
//        $productDiscounts = DB::table('discounts')->select('discount', 'product')->where('table', 'VA-261')->get();
//
//        foreach ($productDiscounts as $discount) {
//            $discounts[$discount->product] = preg_replace("/\,/", '.', $discount->discount);
//        }
//
//        // Overwrite the previous data with the discounts linked to the product number and to the customer
//        $productDiscounts = DB::table('discounts')->select('discount', 'User_Id', 'product')->where('table', 'VA-260')->where('User_Id', $userId)->get();
//
//        foreach ($productDiscounts as $discount) {
//            $discounts[$discount->product] = preg_replace("/\,/", '.', $discount->discount);
//        }
//
//        if ($group === 0 && $product === 0) {
//            return $discounts;
//        } else {
//            if (! isset($discounts[$product]) && ! isset($discounts[$group])) {
//                abort(500, 'Geen korting gevonden voor product: '.$product);
//            } else {
//                return (float) ($discounts[$product] ?? $discounts[$group]);
//            }
//        }
//    }
//
//    /**
//     * Check if all the related products exist.
//     *
//     * @param  array  $products_with_related_products
//     * @throws \Exception
//     * @return void
//     */
//    public function checkRelatedProducts($products_with_related_products)
//    {
//        foreach ($products_with_related_products as $product => $relatedString) {
//            foreach (explode(',', $relatedString) as $relatedProduct) {
//                if (Product::where('number', $relatedProduct)->count() === 0) {
//                    throw new \Exception('Product '.$product.' heeft een niet-bestaand gerelateerd product: '.$relatedProduct);
//                }
//            }
//        }
//    }
//
//}

