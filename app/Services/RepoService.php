<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class RepoService
{

    public function getRepos($language = '',$date = '2019-01-10',int $limit = 10):array
    {
        // Define the default values if any is null
        $date ?? $date = '2019-01-10';
        $language ?? $language = '';
        $limit ?? $limit = 10;

        // Send Http request
        $response = Http::get('https://api.github.com/search/repositories', [
            'q'         =>  "created:>$date language:$language",
            'sort'      => 'stars',
            'order'     => 'desc',
            'per_page'  => $limit,
        ]);

        // get the data
        return $response->json();
    }
}
