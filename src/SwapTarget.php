<?php

namespace Hollow3464\HtmxPsr;

enum SwapTarget: string
{
    case OuterHTML = 'outerHTML';
    case InnerHTML = 'innerHTML';
    case BeforeBegin = 'beforebegin';
    case AfterBegin = 'afterbegin';
    case BeforeEnd = 'beforeend';
    case AfterEnd = 'afterend';
    case Delete = 'delete';
    case None = 'none';
}
