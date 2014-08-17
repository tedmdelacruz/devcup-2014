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

    public function fetchCommits($user, $repo) {
        $rawCommits = $this->client->api('repo')->fetchCommits($user, $repo);

        if (count($rawCommits) > 0) {
            $commits = [];
            foreach ($rawCommits as $commit) {
                $date = strtotime($commit['commit']['committer']['date']);
                $date = date('d M Y', $date);
                $commits[$date] = [
                    'date' => $date,
                    'message' => $commit['commit']['message']
                ];
            }
            $processedCommits = [];
            foreach ($commits as $commit) {
                $processedCommits[] = $commit;
            }
            return Response::json($processedCommits);
        }

        return Response::json([]);
    }

    public function analyze($date) {
        $result = WolframAlpha::easyQuery($date);
        $processedResult = [];

        // YOLO
        foreach ($result as $item) {
            if (strpos($item, 'Date formats:') === false &&
                strpos($item, 'Time in ') === false &&
                strpos($item, 'Daylight information') === false) {

            if (strpos($item, 'Time difference') !== false) {
                $item = str_replace('Time difference from today ', '', $item);
            }

            $processsedResult[] = $item;
        }

        }
        return Response::json($processsedResult);
    }

}
