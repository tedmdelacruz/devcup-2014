<?php

class AppController extends BaseController {

    public function __construct() {
        $this->client = new \Github\Client();
    }

    public function getUser($query)
    {
        $user = $this->client->api('user')->show($query);
        return Response::json($user);
    }

    public function getRepos($query)
    {
        $repos = $this->client->api('user')->repositories($query);
        return Response::json($repos);
    }

    public function fetchCommitDates($user, $repo) {
        $commits = $this->client->api('repo')->fetchCommits($user, $repo);

        if (count($commits) > 0) {
            $dates = [];
            foreach ($commits as $commit) {
                $date = strtotime($commit['commit']['committer']['date']);
                $dates[] = date('d M Y', $date);
            }
            $dates = array_unique($dates);
            return Response::json($dates);
        }

        return Response::json([]);
    }

    public function analyze($date) {
        $result = WolframAlpha::easyQuery($date);
        return Response::json($result);
    }

}
