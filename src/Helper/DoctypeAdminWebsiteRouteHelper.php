<?php

/**
 *
 *Application Administration Base URL
 *
 * @param String $route
 *
 *@return String
 *
 */
if (!function_exists('websiteBaseUrl')) {
    function websiteBaseUrl($route)
    {
        return url(config('website.prefix', 'admin/website') . '/' . $route);
    }
}

/**
 *
 * Redirected Route
 *
 *@param string $route
 *
 *@return String
 *
 */
if (!function_exists('websiteRedirectRoute')) {
    function websiteRedirectRoute($route)
    {
        return websiteBaseUrl($route);
    }
}

/**
 *
 * Create View Route
 *
 *@param String $route
 *
 *@return String
 *
 */
if (!function_exists('websiteCreateRoute')) {
    function websiteCreateRoute($route)
    {
        return websiteBaseUrl($route) . '/create';
    }
}

/**
 *
 * Shpuw View Route
 *
 *@param String $route
 *@param Integer $id
 *
 *@return return_type
 *
 */

if (!function_exists('websiteShowRoute')) {
    function websiteShowRoute($route, $id)
    {
        return websiteBaseUrl($route) . '/' . $id;
    }
}

/**
 *
 * Edit View Route
 *
 *@param String $route
 *@param Integer $id
 *
 *@return String
 *
 */
if (!function_exists('websiteEditRoute')) {
    function websiteEditRoute($route, $id)
    {
        return websiteBaseUrl($route) . '/' . $id . '/edit';
    }
}

/**
 *
 *Store Route
 *
 *@param String $route
 *
 *@return String
 *
 */
if (!function_exists('websiteStoreRoute')) {
    function websiteStoreRoute($route)
    {
        return websiteBaseUrl($route);
    }
}

/**
 *
 *Update Route
 *
 *@param String $route
 *@param Integer $id
 *
 *@return String
 *
 */
if (!function_exists('websiteUpdateRoute')) {
    function websiteUpdateRoute($route, $id)
    {
        return websiteBaseUrl($route) . '/' . $id;
    }
}

/**
 *
 *Update Route
 *
 *@param String $route
 *@param Integer $id
 *
 *@return String
 *
 */
if (!function_exists('websiteDeleteRoute')) {
    function websiteDeleteRoute($route, $id)
    {
        return websiteBaseUrl($route) . '/' . $id;
    }
}
