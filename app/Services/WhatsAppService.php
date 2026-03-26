<?php

namespace App\Services;

class WhatsAppService
{
    protected $token = 'mq4yyvk944svwlsj';
    protected $instanceId = '138738';

    public function sendMessage($to, $body)
    {
        $params = [
            'token' => $this->token,
            'to' => $to,
            'body' => $body
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.ultramsg.com/instance{$this->instanceId}/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            \Log::error("WhatsApp API Error: " . $err);
            return false;
        } else {
            \Log::info("WhatsApp Message Sent: " . $response);
            return true;
        }
    }

    public function sendOrderStatusUpdate($order)
    {
        $user = $order->user;
        if (!$user || !$user->phone_number) {
            return false;
        }

        $phone = $order->country_code . $order->phone_number;
        $statusMessages = [
            'pending' => 'طلبك الجديد قيد المراجعة. رقم الطلب: #' . $order->id,
            'processing' => 'جاري تجهيز طلبك. رقم الطلب: #' . $order->id,
            'shipped' => 'تم شحن طلبك وهو في طريقه إليك. رقم الطلب: #' . $order->id,
            'completed' => 'تم تسليم طلبك بنجاح. شكراً لتسوقك معنا! رقم الطلب: #' . $order->id,
            'cancelled' => 'تم إلغاء طلبك. رقم الطلب: #' . $order->id,
        ];

        $message = $statusMessages[$order->status] ?? 'تم تحديث حالة طلبك. رقم الطلب: #' . $order->id;

        return $this->sendMessage($phone, $message);
    }
}
