<?php

namespace doctype_admin\Website\Contracts;

interface WebsiteDataRepositoryInterface
{
    public function counter();

    public function faq();

    public function page();

    public function plan();

    public function portfolio();

    public function service();

    public function team();
}
