<?php

declare(strict_types=1);

namespace Fintecture\Payment\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;

class Uninstall implements UninstallInterface
{
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $salesOrderTable = $setup->getTable('sales_order');
        $connection = $setup->getConnection();
        $connection->dropColumn($salesOrderTable, 'fintecture_payment_session_id');
        $connection->dropColumn($salesOrderTable, 'fintecture_payment_customer_id');

        $setup->endSetup();
    }
}