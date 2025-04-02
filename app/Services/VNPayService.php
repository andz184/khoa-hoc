<?php

namespace App\Services;

class VNPayService
{
    private $vnp_Url;
    private $vnp_ReturnUrl;
    private $vnp_TmnCode;
    private $vnp_HashSecret;

    public function __construct()
    {
        $this->vnp_Url = config('vnpay.url');
        $this->vnp_ReturnUrl = config('vnpay.return_url');
        $this->vnp_TmnCode = config('vnpay.tmn_code');
        $this->vnp_HashSecret = config('vnpay.hash_secret');
    }

    public function createPaymentUrl($orderId, $amount, $orderInfo)
    {
        $vnp_TxnRef = $orderId;
        $vnp_OrderInfo = $orderInfo;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $amount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        $vnp_CreateDate = date('YmdHis');

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $this->vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnp_Url . "?" . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }

    public function validateResponse($responseData)
    {
        $vnp_SecureHash = $responseData['vnp_SecureHash'];
        unset($responseData['vnp_SecureHash']);
        ksort($responseData);
        $hashData = "";
        $i = 0;
        foreach ($responseData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $hashData = $hashData . $this->vnp_HashSecret;
        $secureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);

        return $vnp_SecureHash === $secureHash;
    }
}
