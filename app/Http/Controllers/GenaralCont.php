<?php

namespace App\Http\Controllers;

use App\Models\Fixure;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;


class GenaralCont extends Controller
{
     public function scrapeAndSaveFixtures()
     {
         $client = new Client();

         try {
             $url = 'https://www.365scores.com/ar/football/league/premier-league-552';

             $response = $client->request('GET', $url);

             $html = $response->getBody()->getContents();


             $crawler = new Crawler($html);


             $matches = $crawler->filter('.match-card')->each(function (Crawler $node) {
                 return [
                     'date' => $node->filter('.match-card__date')->text(),
                     'time' => $node->filter('.match-card__time')->text(),
                     'home_team' => $node->filter('.match-card__team-name')->eq(0)->text(),
                     'away_team' => $node->filter('.match-card__team-name')->eq(1)->text(),
                     'score' => $node->filter('.match-card__score')->text(),
                 ];
             });

             // Return the extracted match data
             return $matches;

         } catch (GuzzleException $e) {
             // Handle any exceptions
             return 'Error: ' . $e->getMessage();
         }

     }
}
