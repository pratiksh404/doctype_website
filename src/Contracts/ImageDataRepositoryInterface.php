<?php

namespace doctype_admin\Website\Contracts;

interface ImageDataRepositoryInterface
{
    public function getAll();

    public function getNormal();

    public function getVertical();

    public function getHorizontal();

    public function getVideoThumbnail();

    public function getSlider();
}
