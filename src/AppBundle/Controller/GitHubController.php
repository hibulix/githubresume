<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHubController extends Controller
{
    /**
     * @Route("/{username}", name="githubresume", defaults={ "username": "hibulix" })
     */
    public function githubAction(Request $request, $username)
    {
        return $this->render('github/index.html.twig', [
            'username'   => $username,
        ]);
    }

    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction(Request $request, $username)
    {
        $reposData = $this->get('github_api')->getRepos($username);
        return $this->render('github/repos.html.twig', $reposData);
    }
}
