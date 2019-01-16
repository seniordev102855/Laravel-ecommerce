<?php

use Webkul\Theme\ViewRenderEventManager;

if (! function_exists('themes')) {
    function themes()
    {
        return app()->make('themes');
    }
}

if (! function_exists('bagisto_asset')) {
    function bagisto_asset($path, $secure = null)
    {
        return themes()->url($path, $secure);
    }
}

if (! function_exists('view_render_event')) {
    function view_render_event($eventName, $params = null)
    {
        app()->singleton(ViewRenderEventManager::class);

        $viewEventMagnager = app()->make(ViewRenderEventManager::class);

        $viewEventMagnager->handleRenderEvent($eventName, $params);

        return $viewEventMagnager->render();
    }
}