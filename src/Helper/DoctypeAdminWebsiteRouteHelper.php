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
function websiteBaseUrl($route)
{
    return url(config('website.prefix', 'admin/website') . '/' . $route);
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
function websiteRedirectRoute($route)
{
    return websiteBaseUrl($route);
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
function websiteCreateRoute($route)
{
    return websiteBaseUrl($route) . '/create';
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

function websiteShowRoute($route, $id)
{
    return websiteBaseUrl($route) . '/' . $id;
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
function websiteEditRoute($route, $id)
{
    return websiteBaseUrl($route) . '/' . $id . '/edit';
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
function websiteStoreRoute($route)
{
    return websiteBaseUrl($route);
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
function websiteUpdateRoute($route, $id)
{
    return websiteBaseUrl($route) . '/' . $id;
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
function websiteDeleteRoute($route, $id)
{
    return websiteBaseUrl($route) . '/' . $id;
}
