<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ConfigurationController;

class LoginController extends Controller {

    public function authenticateuser(Request $request) {

        $data = $request->all(); // This will get all the request data.

        return $this->userAuthentication($data);
    }

    public function userAuthentication($data) {




        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/admin/users/authenticate';



        $client = new Client();




        try {


            $response = $client->request('POST', $baseurl, ['json' => $data, 'verify' => false]);

            $body = $response->getBody();

            $bodyObj = json_decode($body, true);

            if ($response->getStatusCode() == 200) { 

                if ($bodyObj["success"] == 0) {

                    $messages = new MessagesController();

                    session(['messages' => $messages->getNewMsgDashboard()]);
                    session(['username' => $bodyObj["details"]["username"]]);
                    session(['token' => $bodyObj["details"]["token"]]);
                    $data = array('status' => 0, 'message' => 'success');
                    return json_encode($data);
                } else {
                    $data = array('status' => 1, 'message' => $bodyObj["message"]);
                    return json_encode($data);
                }
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $data = array('status' => 1, 'message' => "Username and password mismatch" . $e->getMessage());
            return json_encode($data);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $data = array('status' => 1, 'message' => "Username and password mismatch" . $e->getMessage());
            return json_encode($data);
        }
    }

}
