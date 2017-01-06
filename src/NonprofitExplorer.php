<?php


namespace KevinEm\NonprofitExplorerPHP;


class NonprofitExplorer
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $baseUrl = 'https://projects.propublica.org/nonprofits/api/v2';

    /**
     * NonprofitExplorer constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->client = new \GuzzleHttp\Client($config);
    }

    /**
     * Returns a list of organizations matching the given search terms.
     *
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search(array $query)
    {
        $res = $this->client->get("$this->baseUrl/search.json", compact('query'));

        return json_decode($res->getBody());
    }

    /**
     * Returns all available data for a given organization, by the organization's integer EIN.
     *
     * @param $ein
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function organization($ein)
    {
        $res = $this->client->get("$this->baseUrl/organizations/$ein.json");

        return json_decode($res->getBody());
    }
}