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
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Store\Model\StoreManagerInterface;

class AroundProductRepositorySave
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
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $subject
     * @param callable|\Closure $proceed
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @param bool $saveOptions
     * @return ProductInterface
     */
    public function aroundSave(
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Closure $proceed,
        \Magento\Catalog\Api\Data\ProductInterface $product,
        $saveOptions = false
    ) {

        /**
         * @var \Magento\Catalog\Api\Data\ProductInterface $result
         */
        $result = $proceed($product, $saveOptions);

        return $result;
    }
}
