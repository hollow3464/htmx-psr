<?php

namespace Hollow3464\HtmxPsr;

use Psr\Http\Message\ServerRequestInterface;

final class HtmxRequest
{
    public function __construct(
        public bool $isRequest,
        public bool $isBoosted,
        public string $currentURL,
        public bool $historyRestoreRequest,
        public string $prompt,
        public string $target,
        public string $trigger,
        public string $triggerName,
    ) {
    }

    public static function fromRequest(ServerRequestInterface $request): self
    {
        return new self(
            isRequest: ($request->getHeader('HX-Request')[0] ?? '') === 'true',
            isBoosted: ($request->getHeader('HX-Boosted')[0] ?? '') === 'true',
            currentURL: $request->getHeader('HX-Current-URL')[0] ?? '',
            historyRestoreRequest: ($request->getHeader('HX-History-Restore-Request')[0] ?? '') !== '',
            prompt: $request->getHeader('HX-Prompt')[0] ?? '',
            target: $request->getHeader('HX-Target')[0] ?? '',
            trigger: $request->getHeader('HX-Trigger')[0] ?? '',
            triggerName: $request->getHeader('HX-Trigger-Name')[0] ?? '',
        );
    }
}
