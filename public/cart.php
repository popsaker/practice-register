<?php

if (! function_exists('ensureUserCartTableExists')) {
    function ensureUserCartTableExists(): void
    {
        global $conn;
        $conn->query(
            'CREATE TABLE IF NOT EXISTS user_carts (
                user_id INT PRIMARY KEY,
                cart TEXT NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
    }
}

if (! function_exists('getSavedCartForUser')) {
    function getSavedCartForUser(int $userId): array
    {
        global $conn;
        ensureUserCartTableExists();

        $stmt = $conn->prepare('SELECT cart FROM user_carts WHERE user_id = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_assoc() : null;
        $stmt->close();

        if (! $row || empty($row['cart'])) {
            return [];
        }

        $cart = json_decode($row['cart'], true);
        return is_array($cart) ? $cart : [];
    }
}

if (! function_exists('saveCartForUser')) {
    function saveCartForUser(int $userId, array $cart): void
    {
        global $conn;
        ensureUserCartTableExists();

        $filteredCart = array_filter($cart, function ($quantity) {
            return intval($quantity) > 0;
        });

        $cartJson = json_encode($filteredCart);
        if ($cartJson === false) {
            $cartJson = json_encode([]);
        }

        $stmt = $conn->prepare(
            'INSERT INTO user_carts (user_id, cart) VALUES (?, ?) ON DUPLICATE KEY UPDATE cart = VALUES(cart)'
        );
        $stmt->bind_param('is', $userId, $cartJson);
        $stmt->execute();
        $stmt->close();
    }
}

if (! function_exists('mergeCarts')) {
    function mergeCarts(array $base, array $incoming): array
    {
        foreach ($incoming as $id => $quantity) {
            $quantity = max(0, intval($quantity));
            if ($quantity <= 0) {
                continue;
            }
            $base[$id] = max(1, intval($base[$id] ?? 0) + $quantity);
        }
        return $base;
    }
}

if (! function_exists('getCart')) {
    function getCart(): array
    {
        if (currentUser()) {
            if (! array_key_exists('cart', $_SESSION)) {
                $_SESSION['cart'] = getSavedCartForUser(currentUser()['id']);
            }
            return $_SESSION['cart'];
        }

        return $_SESSION['cart'] ?? [];
    }
}

if (! function_exists('getCartCount')) {
    function getCartCount(): int
    {
        $count = 0;
        foreach (getCart() as $quantity) {
            $count += max(0, intval($quantity));
        }
        return $count;
    }
}

if (! function_exists('addToCart')) {
    function addToCart(int $id): void
    {
        $cart = getCart();
        $cart[$id] = max(1, intval($cart[$id] ?? 0) + 1);
        setCart($cart, true);
    }
}

if (! function_exists('removeFromCart')) {
    function removeFromCart(int $id): void
    {
        $cart = getCart();
        if (isset($cart[$id])) {
            unset($cart[$id]);
            setCart($cart, true);
        }
    }
}

if (! function_exists('getCartItems')) {
    function getCartItems(): array
    {
        $items = [];
        foreach (getCart() as $id => $quantity) {
            $car = getCarById((int) $id);
            if (! $car || intval($quantity) <= 0) {
                continue;
            }
            $car['quantity'] = intval($quantity);
            $items[] = $car;
        }
        return $items;
    }
}

if (! function_exists('getCartTotal')) {
    function getCartTotal(): float
    {
        $total = 0;
        foreach (getCartItems() as $item) {
            $total += floatval($item['price']) * intval($item['quantity']);
        }
        return $total;
    }
}

if (! function_exists('setCart')) {
    function setCart(array $cart, bool $persistToUser = true): void
    {
        $filteredCart = array_filter($cart, function ($quantity) {
            return intval($quantity) > 0;
        });

        $_SESSION['cart'] = $filteredCart;

        if ($persistToUser && currentUser()) {
            saveCartForUser(currentUser()['id'], $filteredCart);
        }
    }
}

if (! function_exists('clearCart')) {
    function clearCart(): void
    {
        setCart([], true);
    }
}

if (! function_exists('clearCartSession')) {
    function clearCartSession(): void
    {
        unset($_SESSION['cart']);
    }
}

if (! function_exists('restoreUserCart')) {
    function restoreUserCart(int $userId): void
    {
        $savedCart = getSavedCartForUser($userId);
        $guestCart = $_SESSION['cart'] ?? [];

        if (! empty($guestCart) && ! empty($savedCart)) {
            $cart = mergeCarts($savedCart, $guestCart);
        } elseif (! empty($savedCart)) {
            $cart = $savedCart;
        } else {
            $cart = $guestCart;
        }

        setCart($cart, true);
    }
}
