<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Webapi\Routing;

use Magento\Webapi\Model\Rest\Config as RestConfig;

/**
 * Class to test routing with a service that has no webapi.xml
 */
class NoWebApiXmlTest extends \Magento\Webapi\Routing\BaseService
{
    /**
     * @var string
     */
    private $_version;

    /**
     * @var string
     */
    private $_restResourcePath;

    protected function setUp()
    {
        $this->_version = 'V1';
        $this->_restResourcePath = "/{$this->_version}/testModule2NoWebApiXml/";
    }

    /**
     *  Test get item
     */
    public function testItem()
    {
        $this->_markTestAsRestOnly();
        $itemId = 1;
        $serviceInfo = [
            'rest' => [
                'resourcePath' => $this->_restResourcePath . $itemId,
                'httpMethod' => RestConfig::HTTP_METHOD_GET,
            ],
        ];
        $requestData = ['id' => $itemId];
        $this->_assertNoRestRouteException($serviceInfo, $requestData);
    }

    /**
     * Test fetching all items
     */
    public function testItems()
    {
        $this->_markTestAsRestOnly();
        $serviceInfo = [
            'rest' => ['resourcePath' => $this->_restResourcePath, 'httpMethod' => RestConfig::HTTP_METHOD_GET],
        ];
        $this->_assertNoRestRouteException($serviceInfo);
    }

    /**
     *  Test create item
     */
    public function testCreate()
    {
        $this->_markTestAsRestOnly();
        $createdItemName = 'createdItemName';
        $serviceInfo = [
            'rest' => ['resourcePath' => $this->_restResourcePath, 'httpMethod' => RestConfig::HTTP_METHOD_POST],
        ];
        $requestData = ['name' => $createdItemName];
        $this->_assertNoRestRouteException($serviceInfo, $requestData);
    }

    /**
     *  Test update item
     */
    public function testUpdate()
    {
        $this->_markTestAsRestOnly();
        $itemId = 1;
        $serviceInfo = [
            'rest' => [
                'resourcePath' => $this->_restResourcePath . $itemId,
                'httpMethod' => RestConfig::HTTP_METHOD_PUT,
            ],
        ];
        $requestData = ['id' => $itemId];
        $this->_assertNoRestRouteException($serviceInfo, $requestData);
    }

    /**
     *  Test remove item
     */
    public function testRemove()
    {
        $this->_markTestAsRestOnly();
        $itemId = 1;
        $serviceInfo = [
            'rest' => [
                'resourcePath' => $this->_restResourcePath . $itemId,
                'httpMethod' => RestConfig::HTTP_METHOD_DELETE,
            ],
        ];
        $requestData = ['id' => $itemId];
        $this->_assertNoRestRouteException($serviceInfo, $requestData);
    }
}
