<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class MessagesController extends Controller {

    public function showNewMessages() {


        $msgs = $this->allNewMessages();
        return view('messages.newmessages')->with('messages', $msgs);
    }

    public function showUserMessages($userid) {


        $msgs = $this->getUserMesaages($userid);
        return view('messages.usermessages')->with('messages', $msgs);
    }

    public function showMessages() {

        $msgs = $this->allMessages();

        return view('messages.allmessages')->with('messages', $msgs);
    }

    public function showReservations() {

        $reservations = $this->allReservations();
        return view('messages.reservations')->with('reservations', $reservations);
    }

    public function getUserMessages($userid) {


        $url = config('constants.LIVE_URL');

        $baseurl = $url . 'messages/user/' . $userid;

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => false
        ]);
        try {

            $response = $client->request('GET', $baseurl);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {
            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function replyMessage(Request $request) {


        $data = $request->all();
       
        $url = config('constants.LIVE_URL');
        $baseurl = $url . '/messages/replyusermessages';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => true
        ]);
        
        try {

            $response = $client->request('POST', $baseurl, ['json' => $data, 'verify' => false]);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {

            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function getAllUsersMessages() {

        return view('users');
    }

    public function allReservations() {


        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/reservation';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => false
        ]);
        try {

            $response = $client->request('GET', $baseurl);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {
            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function allMessages() {


        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/messages';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => false
        ]);
        try {

            $response = $client->request('GET', $baseurl);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {
            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    
    
    
      public function allNewMessages() {


        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/messages/new';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => false
        ]);
        try {

            $response = $client->request('GET', $baseurl);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {
            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    
    
    public function getUserMesaages($userid) {


        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/messages/user/' . $userid;

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => false
        ]);
        try {

            $response = $client->request('GET', $baseurl);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {
            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

}
