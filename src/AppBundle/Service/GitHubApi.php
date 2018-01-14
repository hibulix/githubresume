<?php

namespace AppBundle\Service;

use Github\ResultPager;

class GitHubApi
{
    private $client;

    public function __construct()
    {
        $this->client = new \Github\Client();
    }

    public function getRepos($username)
    {
        $reposApi = $this->client->api('user');
        $paginator  = new ResultPager($this->client);
        $parameters = array($username);
        $data = $paginator->fetchAll($reposApi, 'repositories', $parameters);
        
        $reposData = [
            'repo_count' => count($data),
            'repos' => $data
        ];

        return $reposData;
    }

}