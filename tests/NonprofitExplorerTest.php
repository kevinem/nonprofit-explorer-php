<?php


namespace KevinEm\NonprofitExplorerPHP\Tests;


use KevinEm\NonprofitExplorerPHP\NonprofitExplorer;

class NonprofitExplorerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NonprofitExplorer
     */
    private $nonprofitExplorer;

    protected function setUp()
    {
        parent::setUp();
        $this->nonprofitExplorer = new NonprofitExplorer();
    }

    public function testSearch()
    {
        $res = $this->nonprofitExplorer->search(['q' => 'propublica']);
        $this->assertNotNull($res);
    }

    public function testOrganization()
    {
        $res = $this->nonprofitExplorer->organization(142007220);
        $this->assertNotNull($res);
    }
}