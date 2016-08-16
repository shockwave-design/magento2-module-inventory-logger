<?php
/**
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Shockwavedesign\Inventory\Logger\Model\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CatalogInventory\Api\Data\StockItemInterface;
use Magento\CatalogInventory\Api\StockConfigurationInterface;
use Magento\CatalogInventory\Api\StockItemRepositoryInterface;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Store\Model\StoreManagerInterface;

class AroundStockItemRepositorySave
{
    /**
     * @var StockRegistryInterface
     */
    protected $stockRegistry;

    /**
     * @var StoreManagerInterface
     * @deprecated
     */
    protected $storeManager;

    /**
     * @var StockConfigurationInterface
     */
    private $stockConfiguration;

    /**
     * @param StockRegistryInterface $stockRegistry
     * @param StoreManagerInterface $storeManager
     * @param StockConfigurationInterface $stockConfiguration
     */
    public function __construct(
        StockRegistryInterface $stockRegistry,
        StoreManagerInterface $storeManager,
        StockConfigurationInterface $stockConfiguration
    ) {
        $this->stockRegistry = $stockRegistry;
        $this->storeManager = $storeManager;
        $this->stockConfiguration = $stockConfiguration;
    }

    /**
     * TODO
     *
     * @param StockItemInterface $stockItem
     * @param callable|\Closure $proceed
     * @return ProductInterface
     */
    public function aroundSave(
        \Magento\CatalogInventory\Model\Stock\StockItemRepository\Interceptor $stockItemRepository,
        \Closure $proceed,
        \Magento\CatalogInventory\Api\Data\StockItemInterface $stockItem
    ) {

        $stockItemId = $stockItem->getItemId();

        /** @var \Magento\CatalogInventory\Api\Data\StockItemInterface $oldStockItem */
        $oldQty = $stockItemRepository->get($stockItemId)->getQty();
        $newQty = $stockItem->getQty();

        /**
         * @var \Magento\Catalog\Api\Data\ProductInterface $result
         */
        $result = $proceed($stockItem);

        return $result;
    }
}
