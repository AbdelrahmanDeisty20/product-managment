<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_user_without_permission_cannot_create_product()
    {

        $user = User::factory()->create();


        $this->actingAs($user);


        $data = [
            'name' => 'Unauthorized Product',
            'description' => 'Unauthorized Description',
            'price' => 100,
            'quantity' => 5,
            'image' => 'unauthorized_image.jpg',
        ];


        $response = $this->post(route('products.store'), $data);


        $response->assertStatus(403);
        $this->assertDatabaseMissing('products', $data);
    }
    public function test_admin_can_create_product()
    {

        $admin = User::factory()->create();
        $admin->assignRole('Admin');


        $this->actingAs($admin);


        $data = [
            'name' => 'Feature Test Product',
            'description' => 'Feature Test Description',
            'price' => 300,
            'quantity' => 10,
            'image' => UploadedFile::fake()->image('feature_test_image.jpg'),
        ];


        $response = $this->post(route('products.store'), $data);


        $response->assertStatus(302); 
        $this->assertDatabaseHas('products', [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
        ]);
    }
}
