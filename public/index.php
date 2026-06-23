<?php

require __DIR__ . '/../bootstrap.php';

session_start();
require_once __DIR__ . '/cart.php';

if (! function_exists('url')) {
    function url(string $path = '/'): string
    {
        $scheme = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $base = rtrim($scheme . '://' . $host, '/');

        if ($path === '/' || $path === '') {
            return $base . '/';
        }

        return $base . '/' . ltrim($path, '/');
    }
}

if (! function_exists('asset')) {
    function asset(string $path): string
    {
        return url($path);
    }
}

if (! function_exists('currentUser')) {
    function currentUser(): ?array
    {
        return $_SESSION['user'] ?? null;
    }
}

function requireAuth(): void
{
    if (! currentUser()) {
        header('Location: ' . url('/login'));
        exit;
    }
}

function isAdmin(): bool
{
    $user = currentUser();
    return $user && isset($user['Role']) && $user['Role'] === 'admin';
}

function requireAdmin(): void
{
    if (! isAdmin()) {
        header('Location: ' . url('/login'));
        exit;
    }
}


use Jenssegers\Blade\Blade;

$views = __DIR__ . '/../resources/views';
$cache = __DIR__ . '/../storage/framework/views';

$blade = new Blade($views, $cache);

function renderView(string $view, array $data = []): void
{
    global $blade;
    $sharedData = [
        'currentUser' => currentUser(),
        'cartCount' => getCartCount(),
    ];
    echo $blade->render($view, array_merge($sharedData, $data));
}

function redirect(string $path): void
{
    header('Location: ' . url($path));
    exit;
}

function fetchCars(): array
{
    global $conn;
    $result = $conn->query('SELECT * FROM acars ORDER BY id DESC');
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function getCarById(int $id): ?array
{
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM acars WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result ? $result->fetch_assoc() : null;
    $stmt->close();
    return $car ?: null;
}

function fetchUserById(int $id): ?array
{
    global $conn;
    $stmt = $conn->prepare('SELECT id, name, secondname, phone, email, Role FROM aregistr WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result ? $result->fetch_assoc() : null;
    $stmt->close();
    return $user ?: null;
}

function collectCarData(): array
{
    return [
        'brand' => trim($_POST['brand'] ?? ''),
        'model' => trim($_POST['model'] ?? ''),
        'type' => trim($_POST['type'] ?? ''),
        'price' => floatval($_POST['price'] ?? 0),
        'fuel' => trim($_POST['fuel'] ?? ''),
        'engine' => trim($_POST['engine'] ?? ''),
        'horsepower' => intval($_POST['horsepower'] ?? 0),
        'transmission' => trim($_POST['transmission'] ?? ''),
        'drive_type' => trim($_POST['drive_type'] ?? ''),
        'body_type' => trim($_POST['body_type'] ?? ''),
        'year' => intval($_POST['year'] ?? 0),
        'acceleration' => trim($_POST['acceleration'] ?? ''),
        'consumption' => trim($_POST['consumption'] ?? ''),
        'color' => trim($_POST['color'] ?? ''),
        'stock_count' => intval($_POST['stock_count'] ?? 0),
        'city' => trim($_POST['city'] ?? ''),
        'image' => trim($_POST['image'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
    ];
}

function saveCar(array $data, int $id = null): bool
{
    global $conn;

    if ($id === null) {
        $stmt = $conn->prepare(
            'INSERT INTO acars (brand, model, type, price, fuel, engine, horsepower, transmission, drive_type, body_type, year, acceleration, consumption, color, stock_count, city, image, description, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())'
        );
        $stmt->bind_param(
            'sssdssisssisssisss',
            $data['brand'],
            $data['model'],
            $data['type'],
            $data['price'],
            $data['fuel'],
            $data['engine'],
            $data['horsepower'],
            $data['transmission'],
            $data['drive_type'],
            $data['body_type'],
            $data['year'],
            $data['acceleration'],
            $data['consumption'],
            $data['color'],
            $data['stock_count'],
            $data['city'],
            $data['image'],
            $data['description']
        );
    } else {
        $stmt = $conn->prepare(
            'UPDATE acars SET brand = ?, model = ?, type = ?, price = ?, fuel = ?, engine = ?, horsepower = ?, transmission = ?, drive_type = ?, body_type = ?, year = ?, acceleration = ?, consumption = ?, color = ?, stock_count = ?, city = ?, image = ?, description = ? WHERE id = ?'
        );
        $stmt->bind_param(
            'sssdssisssisssisssi',
            $data['brand'],
            $data['model'],
            $data['type'],
            $data['price'],
            $data['fuel'],
            $data['engine'],
            $data['horsepower'],
            $data['transmission'],
            $data['drive_type'],
            $data['body_type'],
            $data['year'],
            $data['acceleration'],
            $data['consumption'],
            $data['color'],
            $data['stock_count'],
            $data['city'],
            $data['image'],
            $data['description'],
            $id
        );
    }

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deleteCarById(int $id): bool
{
    global $conn;
    $stmt = $conn->prepare('DELETE FROM acars WHERE id = ?');
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function renderCarDetail(int $id): void
{
    $car = getCarById($id);
    if (! $car) {
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
        exit;
    }

    renderView('car-detail', ['car' => $car]);
}

function renderCart(): void
{
    renderView('cart', [
        'items' => getCartItems(),
        'total' => getCartTotal(),
    ]);
}

function handleAddToCart(): void
{
    $id = intval($_POST['id'] ?? 0);
    if ($id > 0 && getCarById($id)) {
        addToCart($id);
    }
    redirect('/cart');
}

function handleRemoveFromCart(int $id): void
{
    removeFromCart($id);
    redirect('/cart');
}

function handleClearCart(): void
{
    clearCart();
    redirect('/cart');
}

function renderAdminIndex(): void
{
    renderView('admin.cars', ['cars' => fetchCars()]);
}

function renderAdminCreate(): void
{
    renderView('admin.car-create');
}

function renderAdminEdit(int $id): void
{
    $car = getCarById($id);
    if (! $car) {
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
        exit;
    }

    renderView('admin.car-edit', ['car' => $car]);
}

function renderProfile(): void
{
    $user = currentUser();
    if (! $user) {
        header('HTTP/1.1 401 Unauthorized');
        echo '401 Unauthorized';
        exit;
    }

    $fullUser = fetchUserById((int) $user['id']);
    if (! $fullUser) {
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
        exit;
    }

    renderView('profile', ['user' => $fullUser]);
}

function handleAdminStore(): void
{
    saveCar(collectCarData());
    redirect('/admin');
}

function handleAdminUpdate(int $id): void
{
    saveCar(collectCarData(), $id);
    redirect('/admin');
}

function handleAdminDelete(int $id): void
{
    deleteCarById($id);
    redirect('/admin');
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') {
    $uri = '/';
}

$redirects = [
    '/index.html' => '/',
    '/catalog.html' => '/catalog',
    '/login.html' => '/login',
    '/register.html' => '/register',
    '/car1.html' => '/car1',
    '/car2.html' => '/car2',
    '/car3.html' => '/car3',
    '/car4.html' => '/car4',
    '/car5.html' => '/car5',
];

if (isset($redirects[$uri])) {
    header('Location: ' . $redirects[$uri], true, 301);
    exit;
}

$routes = [
    'GET' => [
        '/' => function () { renderView('main'); },
        '/catalog' => function () { renderView('catalog', ['cars' => fetchCars()]); },
        '/car/([0-9]+)' => function ($id) { renderCarDetail((int) $id); },
        '/car1' => function () { renderView('car1'); },
        '/car2' => function () { renderView('car2'); },
        '/car3' => function () { renderView('car3'); },
        '/car4' => function () { renderView('car4'); },
        '/car5' => function () { renderView('car5'); },
        '/login' => function () { renderView('login'); },
        '/register' => function () { renderView('register'); },
        '/cart' => function () { renderCart(); },
        '/profile' => function () { requireAuth(); renderProfile(); },
        '/admin' => function () { requireAdmin(); renderAdminIndex(); },
        '/admin/cars' => function () { requireAdmin(); renderAdminIndex(); },
        '/admin/cars/create' => function () { requireAdmin(); renderAdminCreate(); },
        '/admin/cars/(\d+)/edit' => function ($id) { requireAdmin(); renderAdminEdit((int) $id); },
    ],
    'POST' => [
        '/admin/cars/store' => function () { requireAdmin(); handleAdminStore(); },
        '/admin/cars/(\d+)/update' => function ($id) { requireAdmin(); handleAdminUpdate((int) $id); },
        '/admin/cars/(\d+)/delete' => function ($id) { requireAdmin(); handleAdminDelete((int) $id); },
        '/cart/add' => function () { handleAddToCart(); },
        '/cart/clear' => function () { handleClearCart(); },
        '/cart/(\d+)/remove' => function ($id) { handleRemoveFromCart((int) $id); },
    ],
];

$method = $_SERVER['REQUEST_METHOD'];

if (isset($routes[$method][$uri])) {
    $routes[$method][$uri]();
    exit;
}

if (isset($routes[$method])) {
    foreach ($routes[$method] as $route => $handler) {
        if (preg_match('#^' . $route . '$#', $uri, $matches)) {
            array_shift($matches);
            $handler(...$matches);
            exit;
        }
    }
}

header('HTTP/1.1 404 Not Found');
echo '404 Not Found';
