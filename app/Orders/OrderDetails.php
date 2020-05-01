<?php

namespace App\Orders;


use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    /**
     * @var PaymentGatewayContract
     */
    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all(){
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Rafid',
            'address' => 'Somapaara'
        ];
    }

}
