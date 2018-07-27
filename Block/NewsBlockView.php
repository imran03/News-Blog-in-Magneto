<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 26/7/18
 * Time: 5:15 PM
 */

namespace NewsBlog\Grid\Block;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;


class NewsBlockView  extends \Magento\Framework\View\Element\Template
{
    protected $_scopeConfig;
    protected $_filterProvider;
    protected $_gridFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \NewsBlog\Grid\Model\GridFactory $gridFactory,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        array $data = []
    ) {
        $this->_gridFactory = $gridFactory;
        $this->_filterProvider= $filterProvider;
        parent::__construct($context, $data);

        $collection = $this->_gridFactory->create()->getCollection();

        $this->setCollection($collection);
        $this->pageConfig->getTitle()->set(__('News Blog'));
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getCollection()) {

            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'newsblog.grid.record.pager'
            )->setCollection(
                $this->getCollection()
            );
            $this->setChild('pager', $pager);
        }
        return $this->toHtml();
    }


    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }



    public function getCmsFilterContent($value='')
    {
        $html = $this->_filterProvider->getPageFilter()->filter($value);
        return $html;
    }


}

?>