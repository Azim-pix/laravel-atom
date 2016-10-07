<?php

namespace PaymentGateway\Atom;

use PaymentGateway\Atom\Gateway\AtomPaymentGatewayInterface;

use PaymentGateway\Atom\Gateway\AtomPaymentGateway;

/**
* 
*/
class Atompay
{

	protected $gateway;

	/**
     * @param PaymentGatewayInterface $gateway
     */
	
	function __construct(AtomPaymentGatewayInterface $gateway)
	{
		$this->gateway = $gateway;
	}

	public function purchase($parameters)
    {

        return $this->gateway->request($parameters)->send();

    }

    public function response($request)
    {
        return $this->gateway->response($request);
    }

    public function prepare($parameters)
    {
        return $this->gateway->request($parameters);
    }

    public function process($order)
    {
        return $order->send();
    }

    public function gateway($name)
    {
        
        if($name === 'AtomPayment'){
            $this->gateway = new AtomPaymentGateway();
        }

        return $this;
    }
}