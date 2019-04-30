<?php


namespace Inchoo\Sample03\Api;


interface CommentsRepositoryInterface
{
    public function save(\Inchoo\Sample03\Api\Data\CommentsInterface $comments);

    public function delete(\Inchoo\Sample03\Api\Data\CommentsInterface $comment);

    public function getById();

    public function getList();

    public function deleteById();
}