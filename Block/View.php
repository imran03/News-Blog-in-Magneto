<?php


namespace NewsBlog\Grid\Block;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class View extends \Magento\Framework\View\Element\Template
{
    protected $_scopeConfig;
    protected $_filterProvider;
    protected $_gridFactory;
    protected $postItem;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \NewsBlog\Grid\Model\GridFactory $gridFactory,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        array $data = []
    ) {
        $this->_gridFactory = $gridFactory;
        $this->_filterProvider= $filterProvider;
        parent::__construct($context, $data);
        $id = $this->getRequest()->getParam('id');
        $postItem = $this->_gridFactory->create()->load($id);
        $this->setCurrentPost($postItem);
        $this->pageConfig->getTitle()->set(__($postItem->getTitle()));
    }


    public function getCmsFilterContent($value='')
    {
        $html = $this->_filterProvider->getPageFilter()->filter($value);
        return $html;
    }



}

?>

















