<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test adding an item to cart
     * @return void
     */
    public function test_user_can_add_product_to_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', __('cart.prod_add_cart'));

        $this->assertDatabaseHas('carts', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
        ]);
    }

    /**
     * Test of changing the quantity of goods in the cart
     * @return void
     */
    public function test_user_can_update_cart_item_quantity(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $cart = Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->patch(route('cart.update', $cart), [
            'quantity' => 5,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', __('cart.cart_updated'));

        $this->assertDatabaseHas('carts', [
            'id' => $cart->id,
            'quantity' => 5,
        ]);
    }

    /**
     * Test deleting an item from the cart
     * @return void
     */
    public function test_user_can_remove_product_from_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $cart = Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->delete(route('cart.destroy', $cart));

        $response->assertRedirect();
        $response->assertSessionHas('success', __('cart.cart_item_removed'));

        $this->assertDatabaseMissing('carts', [
            'id' => $cart->id,
        ]);
    }

    /**
     * A basic feature test example.
     * @return void
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
