<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReposRequest;
use App\Services\RepoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RepositoryController extends Controller
{

   // Show home page
    public function home()
    {
        return view('repos.index');

    } // End of home

    /*
     * Show all records with default values
     * @param language = random
     * @param date     = 2019-01-10
     * @param limit    = 10
     */
    public function index(RepoService $repoService)
    {
        $data = $repoService->getRepos();
        $repos = $data['items'];
        return view('repos.results', compact('repos'));

    } // End of index

    /*
     * Get repos based on data request
     * Filters data = 'language','date','limit'
     */
    public function filterRepos(ReposRequest $request, RepoService $repoService) {
        // Validation
        $parameters = $request->validated();
        $data = $repoService->getRepos($parameters['language'],$parameters['date'],$parameters['limit']);
        if (!isset($data['items'])) {
             session()->flash('error','No results found or Error occurred');
            return view('repos.results');
        }
        $repos = $data['items'];

        // Notice if you need to tell the user that data is generated
        // session()->flash('message','Results generated successfully');
        return view('repos.results', compact('repos'));

    } // End of Filter

} // End of class
