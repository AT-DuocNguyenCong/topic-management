<?php

/**
 * Start string truncating
 */
const START_POSITION = 0;
/**
 * Length limit of content will be display
 */
const LIMIT_LENGTH = 100;
/**
 * Format utf-8 for truncating content unicode
 */
const UNICODE_FORMAT = 'utf-8';
/**
 * Suffix ..., after truncating content
 */
const SUFFIX = '...';
if (!function_exists('contentLimit')) {
    /**
     * Limit length of content
     *
     * @param string $content     string content
     * @param int    $limitLenght length content
     *
     * @return string
     */
    function contentLimit($content = '', $limitLenght = LIMIT_LENGTH)
    {
        $contentLength = strlen($content);
        $shortencontent = mb_substr(
            $content,
            START_POSITION,
            $limitLenght,
            UNICODE_FORMAT
        ) . SUFFIX;
        return ($contentLength > $limitLenght) ? $shortencontent : $content;
    }
}