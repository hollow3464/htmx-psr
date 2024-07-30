<?php

namespace Hollow3464\HtmxPsr;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class Htmx
{
    public static function isRequest(ServerRequestInterface $request): bool
    {
        return ($request->getHeader('HX-Request')[0] ?? '') !== '';
    }

    public static function isBoosted(ServerRequestInterface $request): bool
    {
        return ($request->getHeader('HX-Boosted')[0] ?? '') !== '';
    }

    public static function location(
        ResponseInterface $res,
        string $location
    ): ResponseInterface {
        return $res->withHeader('HX-Location', $location);
    }


    public static function redirect(
        ResponseInterface $res,
        string $location
    ): ResponseInterface {
        return $res->withHeader('HX-Redirect', $location);
    }

    public static function refresh(
        ResponseInterface $res
    ): ResponseInterface {
        return $res->withHeader('HX-Refresh', 'true');
    }

    public static function reselect(
        ResponseInterface $res,
        string $target
    ): ResponseInterface {
        return $res->withHeader('HX-Reselect', $target);
    }

    public static function retarget(
        ResponseInterface $res,
        string $target
    ): ResponseInterface {
        return $res->withHeader('HX-Retarget', $target);
    }

    public static function reswap(
        ResponseInterface $res,
        string|SwapTarget $target = SwapTarget::InnerHTML
    ): ResponseInterface {
        if ($target instanceof SwapTarget) {
            $target = $target->value;
        }
        return $res->withHeader('HX-Reswap', $target);
    }

    public static function trigger(
        ResponseInterface $res,
        string $target
    ): ResponseInterface {
        return $res->withHeader('HX-Trigger', $target);
    }
}
