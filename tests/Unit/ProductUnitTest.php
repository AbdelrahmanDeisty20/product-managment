<?php

namespace Tests\Unit;

use App\Models\Product;

use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }


    public function test_product_creation_logic_without_db()
    {
        $data = [
            'name' => 'Sample Product',
            'description' => 'This is a sample product.',
            'price' => 200,
            'quantity' => 5,
            'image' => 'sample_image.jpg',
        ];

        $product = new Product($data);


        $this->assertEquals('Sample Product', $product->name);
        $this->assertEquals(200, $product->price);
    }
}
