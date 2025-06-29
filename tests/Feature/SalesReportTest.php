<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SalesReportTest extends TestCase
{
    public function test_sales_report_page_loads()
{
    $response = $this->get('/sales-report');
    $response->assertStatus(200);
    $response->assertSee('Sales Report');
}

}
