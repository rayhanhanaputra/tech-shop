<?php
use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase {
    // Test addToCart method
    public function testAddToCart_WhenQuantityAndCodePresent_ShouldAddToCart() {
        $postData = ["quantity" => 2];
        $getData = ["code" => "product123"];
        $sessionData = ["cart_item" => []];

        $dbMock = $this->createMock(DBController::class);
        $dbMock->method('runQuery')->willReturn([
            ["code" => "product123", /* other product details */]
        ]);

        $cart = new ShoppingCart();
        $cart->addToCart($dbMock, $postData, $getData);

        // Add assertions to test the cart state after adding an item
    }

    // Test removeFromCart method
    public function testRemoveFromCart_WhenCodeAndSessionDataPresent_ShouldRemoveFromCart() {
        $getData = ["code" => "product123"];
        $sessionData = ["cart_item" => ["product123" => ["name" => "Product Name", /* ... other fields ... */]]];

        $cart = new ShoppingCart();
        $cart->removeFromCart($getData, $sessionData);

        // Add assertions to test the cart state after removing an item
    }

    // Test emptyCart method
    public function testEmptyCart_ShouldEmptyCart() {
        $sessionData = ["cart_item" => ["product123" => ["name" => "Product Name", /* ... other fields ... */]]];

        $cart = new ShoppingCart();
        $cart->emptyCart($sessionData);

        $this->assertArrayNotHasKey('product123', $sessionData['cart_item']);
    }

    // Test checkoutCart method
    public function testCheckoutCart_ShouldEmptyCart() {
        $sessionData = ["cart_item" => ["product123" => ["name" => "Product Name", /* ... other fields ... */]]];

        $cart = new ShoppingCart();
        $cart->checkoutCart($sessionData);

        $this->assertEmpty($sessionData['cart_item']);
    }
}
?>
