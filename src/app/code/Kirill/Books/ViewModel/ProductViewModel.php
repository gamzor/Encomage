<?php
class ProductViewModel
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function getProductBySku(string $sku): ProductInterface
    {
        return $this->resource->load($sku, ‘sku’);
    }
}
