<?php

class AppController extends BaseController {

    public function __construct() {
        $this->client = new \Github\Client();
    }

    public function getUser($query = null)
    {
        $user = $this->client->api('user')->show($query);
        return Response::json($user);
    }

    public function getRepos($query = null)
    {
        $repos = $this->client->api('user')->repositories($query);
        return Response::json($repos);
    }

    public function analyze($repoName = null) {

    }

}
