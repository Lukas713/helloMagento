<?php

namespace Inchoo\Sample\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), "1.0.1", "<")) {

            $table = $setup->getConnection()->newTable(
                $setup->getTable(
                    "sample_news"
                )
            )->addColumn
            (
                "id",
                Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true,
                    'auto_increment' => true
                ],
                'sample news id'
            )->addColumn
            (
                "news_content",
                Table::TYPE_TEXT,
                255,
                [
                    'default' => Table::TYPE_TEXT
                ],
                'news content'
            )->addColumn
            (
                "news_title",
                Table::TYPE_TEXT,
                50,
                [
                    'nullable' => false
                ],
                'news title'
            );

            $setup->getConnection()->createTable($table);

            $table = $setup->getConnection()->newTable(
                $setup->getTable(
                    "sample_comments")
            )->addColumn
            (
                "comments_id",
                Table::TYPE_INTEGER,
                null,
                [
                    'primary' => true,
                    'nullable' => false,
                    'auto_increment' => true,
                    'unsigned' => true
                ],
                'comments id'
            )->addColumn
            (
                "comments_content",
                Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false
                ],
                'comments content'
            )->addColumn
            (
                'news',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true
                ],
                'sample_news id'
            )->addForeignKey
            (
               $setup->getFkName
               (
                   'sample_comments',
                   'news',
                   'sample_news',
                   'id'
               ),
                'news',
                'sample_news',
                'id',
                Table::ACTION_CASCADE
            );
            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}