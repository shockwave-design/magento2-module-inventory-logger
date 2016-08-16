<?php
/**
 * Copyright 2016 Shockwave-Design - J. & M. Kramer, all rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Shockwavemk\Mail\Base\Model;

use JsonSerializable;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Shockwavemk\Mail\Base\Model\Mail\AttachmentInterface;
use Shockwavemk\Mail\Base\Model\ResourceModel\Mail as ResourceMail;
use Shockwavemk\Mail\Base\Model\ResourceModel\Mail\Collection;
use stdClass;

/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

/**
 * StockItemLogEntry
 *
 * @property TimezoneInterface _timeZone
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */

/** @noinspection ClassOverridesFieldOfSuperClassInspection */
class StockItemLogEntry extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mail';

    /** @var \Magento\Store\Model\StoreManagerInterface */
    protected $_storeManager;

    /** @var \Shockwavemk\Mail\Base\Model\Storages\Base */
    protected $_storage;

    /** @var \Magento\Framework\Stdlib\DateTime\DateTime */
    protected $_date;

    /** @var \Magento\Framework\Math\Random */
    protected $_mathRandom;

    /** @var \Magento\Framework\Stdlib\DateTime */
    protected $_dateTime;

    /** @var \Magento\Framework\ObjectManagerInterface */
    protected $_manager;

    /** @var Config */
    protected $_config;

    /** @var TimezoneInterface */
    protected $_timeZone;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceMail $resource
     * @param Collection $resourceCollection
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param \Magento\Framework\Math\Random $mathRandom
     * @param \Magento\Framework\Stdlib\DateTime $dateTime
     * @param TimezoneInterface $timezone
     * @param \Magento\Framework\ObjectManagerInterface $manager
     * @param Config $config
     * @param Storages\Base $storage
     * @param array $data
     */
    public function __construct(
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResourceMail $resource,
        Collection $resourceCollection,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Framework\Math\Random $mathRandom,
        \Magento\Framework\Stdlib\DateTime $dateTime,
        TimezoneInterface $timezone,
        \Magento\Framework\ObjectManagerInterface $manager,
        \Shockwavemk\Mail\Base\Model\Config $config,
        \Shockwavemk\Mail\Base\Model\Storages\Base $storage,
        array $data = []
    )
    {
        $this->_storeManager = $storeManager;
        $this->_date = $date;
        $this->_mathRandom = $mathRandom;
        $this->_dateTime = $dateTime;
        $this->_manager = $manager;
        $this->_config = $config;
        $this->_storage = $storage;
        $this->_timeZone = $timezone;

        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
}
