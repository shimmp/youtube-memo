<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_YouTube;

class YoutubeapiController extends Controller
{
    public function search(){
        $client = new Google_Client();
        $client->setDeveloperKey(config('services.youtube.token'));//apikeyの指定
        $youtube = new Google_Service_YouTube($client);
         try {
            $searchResponse = $youtube->search->listSearch('id,snippet', [
                'q' => $_GET['q'],
                'maxResults' => $_GET['maxResults'],
            ]);
            
            $videos_title = [];//動画のタイトルを格納しておく変数
            $videos_id = [];//動画のidを格納しておく変数

            foreach ($searchResponse['items'] as $searchResult) {
              switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                    array_push($videos_title,$searchResult['snippet']['title']);
                    array_push($videos_id,$searchResult['id']['videoId']);
                  break;
              }
            }
            
        } catch (\Google_Service_Exception $e) {
            $error_message = htmlspecialchars($e->getMessage());
            Log::error('Google_Service_Exception: ' . $error_message);
        } catch (\Google_Exception $e) {
            $error_message = htmlspecialchars($e->getMessage());
             Log::error('Google_Exception: ' . $error_message);
        }
        $videos_count = count($videos_id);//取得した動画の数
        return view('search.searchlist',[
            'videos_title'=> $videos_title,
            'videos_id'=> $videos_id,
            'videos_count'=> $videos_count,
            'error_message'=> $error_message ?? null,
        ]);
    }
}

    


