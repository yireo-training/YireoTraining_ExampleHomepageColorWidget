<?php declare(strict_types=1);

namespace YireoTraining\ExampleHomepageColorWidget\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

class ExampleWidget extends Template implements BlockInterface
{
    protected $_template = 'example.phtml';

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ExampleWidget constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $productId
     * @return ProductInterface
     * @throws NoSuchEntityException
     */
    public function getProductById(int $productId): ProductInterface
    {
        return $this->productRepository->getById($productId);
    }
}
