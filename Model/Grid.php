<?php


namespace NewsBlog\Grid\Model;

use NewsBlog\Grid\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{

    const CACHE_TAG = 'wk_grid_records';


    protected $_cacheTag = 'wk_grid_records';


    protected $_eventPrefix = 'wk_grid_records';


    protected function _construct()
    {
        $this->_init('NewsBlog\Grid\Model\ResourceModel\Grid');
    }

    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }


    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }


    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }


    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }


    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }


    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }


    public function getPublishDate()
    {
        return $this->getData(self::PUBLISH_DATE);
    }


    public function setPublishDate($publishDate)
    {
        return $this->setData(self::PUBLISH_DATE, $publishDate);
    }


    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }


    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }


    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }


    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }


    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
