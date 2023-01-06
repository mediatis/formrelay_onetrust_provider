<?php

namespace Mediatis\FormrelayOnetrustProvider\Service;

use FormRelay\Core\Model\Submission\SubmissionInterface;
use Mediatis\OneTrustUtility\Service\CookieService as OriginalCookieService;

class CookieService extends OriginalCookieService
{
    protected ?SubmissionInterface $submission;

    public function __construct(?SubmissionInterface $submission = null)
    {
        $this->submission = $submission;
    }

    public function getCookie(string $name, ?string $default = null): ?string
    {
        if ($this->submission !== null) {
            return $this->submission->getContext()->getCookie($name, $default);
        }
        return parent::getCookie($name, $default);
    }
}
