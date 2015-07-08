<?php

class KeeperTest extends TestCase {

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testContextShouldNotBeFound()
    {
        $keeper = App::make('keeper'); //No context informed
        $keeper->keep(['name'=>'joao']);
    }

    public function testGetUsingStringAsContext()
    {
        $keeper = App::make('keeper', ['context'=>'string-context']);

        $keeper->keep(['name'=>'joao'], 'string-context');
        $get = $keeper->get('name', 'string-context');

        $this->assertEquals('joao', $get);
    }


    public function testGetUsingControllerAsContext()
    {
        $keeper = App::make('keeper', ['context'=>$this]);

        $keeper->keep(['name'=>'joao']);
        $get = $keeper->get('name');

        $this->assertEquals('joao', $get);
    }


    public function testAll()
    {
        $keeper = App::make('keeper', ['context'=>$this]);
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