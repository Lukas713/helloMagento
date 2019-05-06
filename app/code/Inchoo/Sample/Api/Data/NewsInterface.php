<?php

namespace Inchoo\Sample\Api\Data;

interface NewsInterface
{
    const NEWS_ID = 'id';

    const NEWS_CONTENT = 'news_content';

    const NEWS_TITLE = 'news_title';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $content
     * @return void
     */
    public function setContent($content);

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title);
}