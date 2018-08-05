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
use App\Http\Controllers\CategoryController;

class ImagesController extends Controller {

    public function showBanners() {


        $banners = $this->getAllBanners();

        $banners = json_decode($banners, true);

        return view('images.allbanners')->with('banners', $banners['details']);
    }

    public function showImageUpload() {
        return view('images.uploadimage');
    }

    public function showImages() {

        $category = new CategoryController();
        $categories = $category->allCategories();
        $catData = json_decode($categories, true);
        return view('images.allimages')->with('categories', $catData['details']);
    }

    public function showCategoryImages($id) {
        $images = $this->getCategoryImages($id);
        $imgResult = json_decode($images, true);
        return view('images.categoryimages')->with('images', $imgResult['details']);
    }

    public function uploadBanner(Request $request) {

        $data = $request->all();
        $url = config('constants.LIVE_URL');
        $baseurl = $url . '/images/upload/banner';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => true
        ]);

        if ($request->hasFile('banner')) {
            if ($request->file('banner')) {
                $bannerfile = file_get_contents($_FILES['banner']['tmp_name']);
            }
        } else {
            $bannerfile = "";
        }
        try {

            $response = $client->request('POST', $baseurl, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $bannerfile,
                        'filename' => $_FILES['banner']['name']
                    ],
                    [
                        'name' => 'name',
                        'contents' => $data['bannerName']
                    ],
                    [
                        'name' => 'description',
                        'contents' => $data['description']
                    ]
                ],
                'verify' => false]);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {

            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function deleteBanner($id) {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/images/banner/' . $id;

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

    public function getAllBanners() {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/images/banners';

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

    public function uploadImage(Request $request) {

        $data = $request->all();
        $url = config('constants.LIVE_URL');
        $baseurl = $url . '/images/upload';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => true
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')) {
                $imgfile = file_get_contents($_FILES['image']['tmp_name']);
            }
        } else {
            $imgfile = "";
        }
        try {

            $response = $client->request('POST', $baseurl, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $imgfile,
                        'filename' => $_FILES['image']['name']
                    ],
                    [
                        'name' => 'name',
                        'contents' => $data['imgName']
                    ],
                    [
                        'name' => 'description',
                        'contents' => $data['description']
                    ],
                    [
                        'name' => 'paymentStatus',
                        'contents' => $data['paymentStatus']
                    ],
                    [
                        'name' => 'category',
                        'contents' => $data['category']
                    ],
                    [
                        'name' => 'picofday',
                        'contents' => $data['picofday']
                    ], [
                        'name' => 'price',
                        'contents' => $data['price']
                    ], [
                        'name' => 'currency',
                        'contents' => $data['currency']
                    ]
                ],
                'verify' => false]);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {

            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function updateImageContents() {

        return view('users');
    }

    public function getAllImages() {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . 'images';

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

    public function getCategoryImages($catid) {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/images/category/' . $catid;

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

    public function deleteImage($publicid) {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/images/' . $publicid;

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

    public function composeErrorMessage($message) {
        $errorResult = array(
            "success" => 2,
            "message" => $message
        );
        return json_encode($errorResult);
    }

    public function getImageInfo($id) {



        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/images/details/' . $id;

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

    public function updateImage(Request $request) {

        $data = $request->all();
        $url = config('constants.LIVE_URL');
        $baseurl = $url . '/images/update';

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'token' => session('token')
            ],
            'http_errors' => true
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')) {
                $imgfile = file_get_contents($_FILES['image']['tmp_name']);
            }
        } else {
            $imgfile = "";
        }
        try {

            $response = $client->request('POST', $baseurl, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $imgfile,
                        'filename' => $_FILES['image']['name']
                    ],
                    [
                        'name' => 'name',
                        'contents' => $data['imagename']
                    ],
                    [
                        'name' => 'description',
                        'contents' => $data['description']
                    ],
                    [
                        'name' => 'paymentStatus',
                        'contents' => $data['paymentStatus']
                    ],
                    [
                        'name' => 'category',
                        'contents' => $data['category']
                    ],
                    [
                        'name' => 'picofday',
                        'contents' => $data['picofday']
                    ],[
                        'name' => 'price',
                        'contents' => $data['price']
                    ],[
                        'name' => 'currency',
                        'contents' => $data['currency']
                    ],[
                        'name' => 'picid',
                        'contents' => $data['picid']
                    ]
                ],
                'verify' => false]);

            $body = $response->getBody();
            return $body;
        } catch (RequestException $e) {

            return $this->composeErrorMessage($e->getMessage());
        } catch (Exception $e) {
            return $this->composeErrorMessage($e->getMessage());
        }
    }

    public function getBannerDetail($bannerid) {

        $url = config('constants.LIVE_URL');

        $baseurl = $url . '/images/banners/'.$bannerid;

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
