<?php

use App\Repositories\CompanyInterface;

class CompanyRepositoryTest extends TestCase
{
    protected $repo;

    public function setUp()
    {
        parent::setUp();
//        $this->repo = $this->app->make(CompanyInterface::class);
        $this->repo = $this->app->make('App\Repositories\CompanyInterface');
    }

    public function testGet()
    {
        $result = $this->repo->get(1);

        $this->assertSame($result->country, "ja");
        $this->assertSame($result->id, 1);
        $this->assertSame(preg_replace("/( |　)/", "", $result->name), 'VApps');

    }

    public function testGetList()
    {
        $result = $this->repo->getList();
        $this->assertCount(4, $result);
        $this->assertSame(preg_replace("/( |　)/", "", $result[1]->name), '株式会社AApps');
    }

    public function test2GetList()
    {
        $result = $this->repo->getList();
        $this->assertCount(4, $result);
        $this->assertSame(preg_replace("/( |　)/", "", $result[3]->name_kana), 'bbb');
        $this->assertEquals($result[3]->name_kana, 'bbb');
    }

}