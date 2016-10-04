<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Webpack\UrlGenerator as WebpackUrlGenerator;

class WebpackUrlTest extends TestCase
{
    public function test_it_works_just_in_local_and_testing()
    {
        $webpack = new WebpackUrlGenerator;
        $this->setAppEnviroment('production');

        $url_generated = $webpack->to('test/route');
        $expected_url = url('test/route');

        $this->assertEquals($url_generated, $expected_url);
    }

    public function test_url_generator_for_webpack_dev_server()
    {
        $webpack = new WebpackUrlGenerator;

        $url_generated = $webpack->to('test');
        $expected_url = url('') . ':8080/dev/test';

        $this->assertEquals($url_generated, $expected_url);
    }

    public function test_url_generator_from_route_name_for_webpack()
    {
        $webpack = new WebpackUrlGenerator;

        FakeRouter::swap();

        $url_generated = $webpack->toRoute('home');
        $expected_url = url('') . ':8080/dev/home';

        $this->assertEquals($url_generated, $expected_url);
    }

    protected function setAppEnviroment($env)
    {
        app()['env'] = $env;
    }
}
