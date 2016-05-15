<?php
namespace Mesh\OpenJuso;

class Client
{

    const API_URL = 'http://www.juso.go.kr/addrlink/addrLinkApi.do';
    private $client;
    private $apiKey;

    public function __construct(\GuzzleHttp\Client $client, $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    /**
     * @param     $keyword
     * @param int $page
     * @param int $pageSize
     *
     * @return Response
     * @throws UnexpectedResponseException
     */
    public function search($keyword, $page = 1, $pageSize = 50)
    {
        $query = [
            'confmKey' => $this->apiKey,
            'countPerPage' => $pageSize,
            'currentPage' => $page,
            'keyword' => $keyword,
        ];

        $response = $this->client->get(self::API_URL, ['query' => $query]);

        return new Response($response);
    }
}