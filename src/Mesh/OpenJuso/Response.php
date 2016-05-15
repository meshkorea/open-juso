<?php
namespace Mesh\OpenJuso;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 *
 * A wrapper for the HTTP Response object that provides convenient access to search results.
 *
 * @package Mesh\OpenJuso
 */
class Response
{

    /**
     * @var ResponseInterface
     */
    private $response;

    /** @var integer */
    private $totalCount = 0;

    /** @var integer */
    private $currentPage = 0;

    /** @var integer */
    private $countPerPage = 0;

    /** @var string 0     : 정상
     *              -999  : 시스템에러
     *              E0001 : 승인되지 않은 KEY 입니다.
     *              E0002 : 승인되지 않은 사이트 입니다.
     *              E0003 : 정상적인 경로로 접속하시기 바랍니다.
     *              E0005 : 검색어가 입력되지 않았습니다.
     *              E0006 : 주소를 상세히 입력해 주시기 바랍니다.
     */
    private $errorCode = '';

    /** @var string */
    private $errorMessage = '';

    /** @var Juso[] */
    private $results = [];

    /**
     * Response constructor.
     *
     * @param ResponseInterface $response
     *
     * @throws UnexpectedResponseException If response status is not OK 200, an exception is thrown.
     */
    public function __construct(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new UnexpectedResponseException("Response status code is invalid: {$response->getStatusCode()}.",
                                                  $response);
        }
        $this->response = $response;
        $this->parseResponse();
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return int Default: 0
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @return int The index starts at 1. Default: 0 indicates an error response
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int Default: 0
     */
    public function getCountPerPage()
    {
        return $this->countPerPage;
    }

    /**
     * @return string 0     : 정상
     *                -999  : 시스템에러
     *                E0001 : 승인되지 않은 KEY 입니다.
     *                E0002 : 승인되지 않은 사이트 입니다.
     *                E0003 : 정상적인 경로로 접속하시기 바랍니다.
     *                E0005 : 검색어가 입력되지 않았습니다.
     *                E0006 : 주소를 상세히 입력해 주시기 바랍니다.
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return Juso[]
     */
    public function getResults()
    {
        return $this->results;
    }

    private function parseResponse()
    {
        $xml = new \SimpleXMLElement((string)$this->response->getBody());

        $this->totalCount = (integer)$xml->common->totalCount;
        $this->currentPage = (integer)$xml->common->currentPage;
        $this->countPerPage = (integer)$xml->common->countPerPage;
        $this->errorCode = (string)$xml->common->errorCode;
        $this->errorMessage = (string)$xml->common->errorMessage;

        foreach ($xml->juso as $xmlJuso) {
            $this->results[] = new Juso((string)$xmlJuso->roadAddr,
                                        (string)$xmlJuso->roadAddrPart1,
                                        (string)$xmlJuso->roadAddrPart2,
                                        (string)$xmlJuso->jibunAddr,
                                        (string)$xmlJuso->engAddr,
                                        (string)$xmlJuso->zipNo,
                                        (string)$xmlJuso->admCd,
                                        (string)$xmlJuso->rnMgtSn,
                                        (string)$xmlJuso->bdMgtSn,
                                        (string)$xmlJuso->detBdNmList);
        }
    }
}