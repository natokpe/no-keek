<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

declare(strict_types = 1);

namespace NatOkpe\Wp\Theme\Keek\Utils;

class Request
{
    /**
     * 
     */
    public static
    function method(?string $check = null): string|bool
    {
        $req = $_SERVER['REQUEST_METHOD'] ?? '';

        switch (strtolower($check)) {
            case 'get':
                return $req === 'GET';
                break;

            case 'post':
                return $req === 'POST';
                break;

            default:
                return $req;
                break;
        }
    }

    /**
     * 
     */
    public static
    function is_get(): bool
    {
        return self::method('get');
    }

    /**
     * 
     */
    public static
    function is_post(): bool
    {
        return self::method('post');
    }

    /**
     * 
     */
    public static
    function input(?string $key = null, $alt = null): mixed
    {
        return is_null($key) ? ($_REQUEST ?? []) : ($_REQUEST[$key] ?? $alt);
    }

    /**
     * 
     */
    public static
    function post(?string $key = null, $alt = null): mixed
    {
        return is_null($key) ? ($_POST ?? []) : ($_POST[$key] ?? $alt);
    }

    /**
     * 
     */
    public static
    function file(?string $key = null, $alt = null): mixed
    {
        return is_null($key) ? ($_FILES ?? []) : ($_FILES[$key] ?? $alt);
    }

    /**
     * 
     */
    public static
    function get(?string $key = null, $alt = null): mixed
    {
        return is_null($key) ? ($_GET ?? []) : ($_GET[$key] ?? $alt);
    }
}
/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
