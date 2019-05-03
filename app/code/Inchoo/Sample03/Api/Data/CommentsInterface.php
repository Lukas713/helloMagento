<?php


namespace Inchoo\Sample03\Api\Data;


interface CommentsInterface
{
    const CONTENT = "comments_content";

    const NEWS = "inchoo_news";

    const ID = 'comment_id';

    /**
     * @param $content, string that holds text
     * @return CommentsInterface
     */
    public function setCommentsContent($content);

    /**
     * @param $news, integer that represents inchoo_news
     * @return CommentsInterface
     */
    public function setInchooNews($news);

    /**
     * @return string
     */
    public function getCommentsContent();

    /**
     * @return int
     */
    public function getInchooNews();

    /**
     * @return int
     */
    public function getId();
}