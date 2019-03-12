<?php

namespace Hulotte\Twig;

use Hulotte\Middlewares\CsrfMiddleware;

/**
 * Class CsrfExtension
 *
 * @package Hulotte\Twig
 * @author Sébastien CLEMENT <s.clement@lareclame31.fr>
 */
class CsrfExtension extends \Twig_Extension
{
    /**
     * @var CsrfMiddleware
     */
    private $csrfMiddleware;

    /**
     * CsrfExtension constructor
     * @param CsrfMiddleware $csrfMiddleware
     */
    public function __construct(CsrfMiddleware $csrfMiddleware)
    {
        $this->csrfMiddleware = $csrfMiddleware;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('csrf_input', [$this, 'csrfInput'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Return hidden input with csrf token
     * @return string
     * @throws \Exception
     */
    public function csrfInput()
    {
        return '<input type="hidden" '
            . 'name="' . $this->csrfMiddleware->getFormKey() . '" '
            . 'value="' . $this->csrfMiddleware->generateToken() . '"/>';
    }
}
