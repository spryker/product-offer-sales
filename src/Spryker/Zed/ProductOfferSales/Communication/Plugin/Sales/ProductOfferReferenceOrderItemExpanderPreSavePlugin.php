<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferSales\Communication\Plugin\Sales;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SpySalesOrderItemEntityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SalesExtension\Dependency\Plugin\OrderItemExpanderPreSavePluginInterface;

/**
 * @method \Spryker\Zed\ProductOfferSales\Business\ProductOfferSalesFacadeInterface getFacade()
 * @method \Spryker\Zed\ProductOfferSales\ProductOfferSalesConfig getConfig()
 */
class ProductOfferReferenceOrderItemExpanderPreSavePlugin extends AbstractPlugin implements OrderItemExpanderPreSavePluginInterface
{
    /**
     * {@inheritDoc}
     * - Adds product offer reference to sales order item before saving
     * - Returns $salesOrderItemEntity without changes if there is no product offer reference
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     * @param \Generated\Shared\Transfer\SpySalesOrderItemEntityTransfer $salesOrderItemEntity
     *
     * @return \Generated\Shared\Transfer\SpySalesOrderItemEntityTransfer
     */
    public function expandOrderItem(
        QuoteTransfer $quoteTransfer,
        ItemTransfer $itemTransfer,
        SpySalesOrderItemEntityTransfer $salesOrderItemEntity
    ): SpySalesOrderItemEntityTransfer {
        return $this->getFacade()->expandOrderItemWithProductOffer($salesOrderItemEntity, $itemTransfer);
    }
}
