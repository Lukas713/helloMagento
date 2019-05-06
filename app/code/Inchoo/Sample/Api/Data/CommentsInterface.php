<?php

namespace Inchoo\Sample\Api\Data;

interface CommentsInterface
{
    const COMMENTS_ID = 'comments_id';

    const COMMENTS_CONTENT = 'comments_content';

    const NEWS_ID = 'news';

    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return int
     */
    public function getNews();

    /**
     * @param string $content
     * @return void
     */
    public function setContent($content);

    /**
     * @param int $id
     * @return void mixed
     */
    public function setNews($id);
}