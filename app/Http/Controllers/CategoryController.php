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

class CategoryController extends Controller {

    public function show() {

        return view('category.all');
    }

    public function create(Request $request) {

        $data = $request->all();
        $url = config('constants.LIVE_URL');
        $baseurl = $url . '/category';

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

    
    public function update(Request $request) {


        $data = $request->all();
        $url = config('constants.LIVE_URL');
        $baseurl = $url . '/category';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => true
        ]);
        
       
        
        try {

            $response = $client->request('PUT', $baseurl, ['json' => json_encode($data), 'verify' => true]);

            $body = $response->getBody();
          
            return $body;
        } catch (RequestException $e) {

            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function delete($id) {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/category/' . $id;

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => false
        ]);
        try {

            $response = $client->request('DELETE', $baseurl);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {
            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function allCategories() {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/category';

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

    public function getCategoryInfo($id) {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/category/' . $id;

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token'),
                'user' => session('userid')
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

    public function composeErrorMessage($message) {
        $errorResult = array(
            "success" => 2,
            "message" => $message
        );
        return json_encode($errorResult);
    }

}
