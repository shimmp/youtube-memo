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
            $chanels_title = [];//チャンネルのタイトルを格納しておく変数
            $chanels_id = [];//チャンネルのidを格納しておく変数
            $playlists_title = [];//プレイリストのタイトルを格納しておく変数
            $playlists_id = [];//プレイリストのidを格納しておく変数
            foreach ($searchResponse['items'] as $searchResult) {
              switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                    array_push($videos_title,$searchResult['snippet']['title']);
                    array_push($videos_id,$searchResult['id']['videoId']);
                  break;
                case 'youtube#channel':
                    array_push($chanels_title,$searchResult['snippet']['title']);
                    array_push($chanels_id,$searchResult['id']['chanelid']);
                  break;
                case 'youtube#playlist':
                    array_push($playlists_title,$searchResult['snippet']['title']);
                    array_push($playlists_id,$searchResult['snippet']['id']);
                  break;
              }
            }
            
        } catch (Google_Service_Exception $e) {
            $error_message = htmlspecialchars($e->getMessage());
            Log::error('Google_Service_Exception: ' . $error_message);
        } catch (Google_Exception $e) {
            $error_message = htmlspecialchars($e->getMessage());
             Log::error('Google_Exception: ' . $error_message);
        }
        $videos_count = count($videos_id)+count($chanels_id)+count($playlists_id);//取得した動画などの数
        return view('memo.searchlist',[
            'videos_title'=> $videos_title,
            'videos_id'=> $videos_id,
            'chanels_title'=> $chanels_title,
            'chanels_id'=>  $chanels_id,
            'playlists_title'=> $playlists_title,
            'playlists_id'=> $playlists_id,
            'videos_count'=> $videos_count,
            'error_message'=> $error_message ?? null,
        ]);
    }
}

    


