<?php

namespace Mediatis\FormrelayOnetrustProvider\DataProvider;

use FormRelay\Core\DataProvider\DataProvider;
use FormRelay\Core\Model\Submission\SubmissionInterface;
use FormRelay\Core\Request\RequestInterface;
use Mediatis\FormrelayOnetrustProvider\Service\CookieService;
use Mediatis\OneTrustUtility\Service\ConsentManager;
use Mediatis\OneTrustUtility\Service\ConsentManagerInterface;

class OneTrustDataProvider extends DataProvider
{
    const KEY_PERMISSION_FIELD_MAP = 'permissionFieldMap';
    const DEFAULT_PERMISSION_FIELD_MAP = [
        'C0002' => 'cookie_permission_performance',
        'C0003' => 'cookie_permission_functional',
        'C0004' => 'cookie_permission_targeting',
        'C0005' => 'cookie_permission_social_media',
    ];

    protected function processContext(SubmissionInterface $submission, RequestInterface $request)
    {
        $this->addCookieToContext($submission, $request, ConsentManagerInterface::PERMISSION_COOKIE_NAME);
    }

    protected function process(SubmissionInterface $submission)
    {
        $cookieService = new CookieService($submission);
        $consentManager = new ConsentManager($cookieService);

        $permissionFieldMap = $this->getConfig(static::KEY_PERMISSION_FIELD_MAP);
        foreach ($permissionFieldMap as $permissionKey => $fieldName) {
            $this->setField($submission, $fieldName, $consentManager->checkConsent($permissionKey) ? 1 : 0);
        }
    }

    public static function getDefaultConfiguration(): array
    {
        return parent::getDefaultConfiguration() + [
            static::KEY_PERMISSION_FIELD_MAP => static::DEFAULT_PERMISSION_FIELD_MAP,
        ];
    }
}
