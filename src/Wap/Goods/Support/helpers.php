<?php
if (! function_exists('asset_shop')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function asset_shop($path, $secure = null)
    {
        $path = 'vendor/wuchenhao/laravel-wap-shop/'.$path;
        return asset($path, $secure);
    }
}