<?php


namespace Inchoo\Sample03\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();   //prepares database

        if (version_compare($context->getVersion(), '1.0.2') < 0) {

            $setup->getConnection()->addColumn(
                $setup->getTable('inchoo_news'),
                'created_at',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    'length' => null,
                    'nullable' => false,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE,
                    'comment' => 'Updated At'
                ]
            );

            $setup->getConnection()->addColumn(
                $setup->getTable('inchoo_news'),
                'updated_at',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    'length' => null,
                    'nullable' => false,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE,
                    'comment' => 'Updated At'
                ]
            );
            $setup->getConnection()->addColumn(
                $setup->getTable('inchoo_news'),
                'content',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => '2M',
                    'nullable' => true,
                    'comment' => 'Content'
                ]
            );
        }


        if(version_compare($context->getVersion(), '1.0.4') < 0){

            $table = $setup->getConnection()->newTable(
                'inchoo_news_comments'
            )->addColumn(
                'comment_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'news id'
            )->addColumn(
                'content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                []
            )->addColumn(
                'inchoo_news',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'news id'
            )->addForeignKey(
                $setup->getFkName(
                    'inchoo_news_comments',
                    'comment_id',
                    'inchoo_news',
                    'news_id'),
                'comment_id',
                $setup->getTable('inchoo_news'),
                'news_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            );
        }

        if(version_compare($context->getVersion(), '1.0.5') < 0){

            $table = $setup->getConnection()->newTable(
                'inchoo_news_comments'
            )->addColumn(
                'comment_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'news id'
            )->addColumn(
                'content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                []
            )->addColumn(
                'inchoo_news',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'news id'
            )->addForeignKey(
                    $setup->getFkName(
                        'inchoo_news_comments',
                        'comment_id',
                        'inchoo_news',
                        'news_id'),
                    'comment_id',
                    $setup->getTable('inchoo_news'),
                    'news_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );
            $setup->getConnection()->createTable($table);
        }

        if(version_compare($context->getVersion(), '1.0.8') < 0){
            $setup->getConnection()->addForeignKey(
                $setup->getFkName('inchoo_news_comments', 'inchoo_news', 'inchoo_news', 'news_id'),
                'inchoo_news_comments',
                'inchoo_news',
                'inchoo_news',
                'news_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );
        }

        if (version_compare($context->getVersion(), '1.0.9') < 0) {
            $table = $setup->getConnection()->changeColumn(
                $setup->getTable('inchoo_news_comments'),
                'content',
                'comments_content',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'comment' => 'Content'
                ]            );
        }
            $setup->endSetup();
    }


}