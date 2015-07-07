<?php

class KeeperTest extends TestCase {

    public function testGet()
    {
        $keeper = App::make('keeper', $this);
        $keeper->keep(['name'=>'joao']);

        $get = $keeper->get('name');

        $this->assertEquals('joao', $get);
    }

    public function testAll()
    {
        $keeper = App::make('keeper', $this);
        $keeper->keep([
            'name'=>'joao',
            'age'=>35
        ]);

        $all = $keeper->all();

        $this->assertContains('joao', $all);
        $this->assertContains('35', $all);
        $this->assertNotContains('foo', $all);
    }
}