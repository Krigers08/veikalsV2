<?php
class Router
{
    private static array $routes = [];

    public static function get(string $pattern, callable $handler): void
    {self::$routes[] = ['pattern' => $pattern, 'handler' => $handler];}

    public static function post(string $pattern, callable $handler): void
    {self::$routes[] = ['pattern' => $pattern, 'handler' => $handler];}

    public static function dispatch(string $uri): void
    {
        foreach (self::$routes as $route) {
            if (preg_match($route['pattern'], $uri, $matches)) {
                array_shift($matches);
                call_user_func_array($route['handler'], $matches);
                return;
            }
        }
    }
}