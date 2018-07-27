<?php


namespace NewsBlog\Grid\Block;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;


class Index extends \Magento\Framework\View\Element\Template
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


//    public function getDescription()
//    {
//        $desc = $this->getProduct()->getDescription();
//        $key = 'desc_filtered_content';
//        if (!$this->hasData($key)) {
//            $content = $this->_filterProvider->getPageFilter()->filter(
//                $desc
//            );
//            $this->setData($key, $content);
//        }
//        return $this->getData($key);
//    }

    public function getCmsFilterContent($value='')
    {
        $html = $this->_filterProvider->getPageFilter()->filter($value);
        return $html;
    }


}

?>

















