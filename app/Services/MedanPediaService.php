<?php

namespace App\Services;

/**
 * Class MedanPediaService.
 */
class MedanPediaService
{

  
        public $api_key;
        public $api_id;
    
        public function __construct($api_key, $api_id)
        {
            $this->api_key = $api_key;
            $this->api_id = $api_id;
        }
    
        public function sendData($url, $data = null, $method = 'GET')
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
            if ($method == 'POST') {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
    
            $result = curl_exec($ch);
            curl_close($ch);
    
            return json_decode($result, true);
        }
    
    
        // getBalance
        public function getBalance()
        {
            $url = 'https://api.medanpedia.co.id/profile';
            $data = [
                'api_id' => $this->api_id,
                'api_key' => $this->api_key,
            ];
            return $this->sendData($url, $data, 'POST');
        }
    
        // getServices
        public function getServices()
        {
            $url = 'https://api.medanpedia.co.id/services';
            $data = [
                'api_id' => $this->api_id,
                'api_key' => $this->api_key,
            ];
            return $this->sendData($url, $data, 'POST');
        }
        // newOrder
        public function newOrder($service_id, $target, $quantity)
        {
            $url = 'https://api.medanpedia.co.id/order';
            $data = [
                'api_id' => $this->api_id,
                'api_key' => $this->api_key,
                'service' => $service_id,
                'target' => $target,
                'quantity' => $quantity,
            ];
    
    
            return $this->sendData($url, $data, 'POST');
        }
        // checkStatus
        public function checkStatus($order_id)
        {
            $url = 'https://api.medanpedia.co.id/status';
            $data = [
                'api_id' => $this->api_id,
                'api_key' => $this->api_key,
                'id' => $order_id,
            ];
            return $this->sendData($url, $data, 'POST');
        }
    
}
