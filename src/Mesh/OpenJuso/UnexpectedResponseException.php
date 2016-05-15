<?php
namespace Mesh\OpenJuso;

use Psr\Http\Message\ResponseInterface;

/**
 * Class UnexpectedResponseException
 *
 * The Response object may be accessed for fine-grained retry and recovery.
 *
 * @package Mesh\OpenJuso
 */
class UnexpectedResponseException extends \RuntimeException
{
    /**
     * @var null|ResponseInterface
     */
    private $response;

    /**
     * UnexpectedResponseException constructor.
     *
     * @param string            $message
     * @param ResponseInterface $response
     */
    public function __construct($message = '', $response = null)
    {
        parent::__construct($message, $response ? $response->getStatusCode() : 0);
        $this->response = $response;
    }

    /**
     * @return null|ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}