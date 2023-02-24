<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use FedEx;
use FedEx\RateService;
use FedEx\ShipService;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Services\theme\HomeService;

class FedExController extends Controller
{
    protected $fedExKey,$fedExPassword,$fedExAccount,$fedExMeterNumber,$createShipment = 0,$homeService;
    public function __construct(HomeService $homeService)
    {
        $this->fedExKey = env('FEDEX_KEY');
        $this->fedExPassword = env('FEDEX_PASSWORD');
        $this->fedExAccount = env('FEDEX_ACCOUNT_NUMBER');
        $this->fedExMeterNumber = env('FEDEX_METER_NUMBER');
		$this->homeService = $homeService;
    }
    public function rateService($request=""){


            // $required= ['orderWeight','fedexStreetAddress','fedexCity','fedexState','fedexPostal','productLength','productWidth','productHeight','preferredLocation'];

            // foreach ($required as $key => $value) {
            // 	if(!array_key_exists($value, $request) || !$request[$value])
            // 		return json_encode(array('success'=>0,'message'=>'Required param missing Or Empry'));
            // }

    	$street_address='10 Fed Ex Pkwy';
		$city='Memphis';
		$state='TN';
		$postcode=38115;
		$location = 'homeDelievery';
		$total_order_weight = 2;
        //Dimensions in inches
        $productLenght = '10';
        $productWidth = '8';
        $productHeight = '3';

        //Uncommit this when sending data through request
        // $street_address=$request["fedexStreetAddress"];
		// $city=$request["fedexCity"];
		// $state=$request["fedexState"];
		// $postcode=$request["fedexPostal"];
		// $location = $request["preferredLocation"];
		// $total_order_weight = $request["orderWeight"];
        // $productLenght = $request["productLenght"];
        // $productWidth = $request["productWidth"];
        // $productHeight = $request["productHeight"];
		if(in_array($state,['AK','HI','GU']))
		{
			$response=array("success"=>0,"message"=>"Shipping service not available in your state, yet. For more information please contact our support.");
		  return json_encode($response);
		}



    	$rateRequest = new RateService\ComplexType\RateRequest();

		//authentication & client details
		$rateRequest->WebAuthenticationDetail->UserCredential->Key = $this->fedExKey;
		$rateRequest->WebAuthenticationDetail->UserCredential->Password = $this->fedExPassword;
		$rateRequest->ClientDetail->AccountNumber = $this->fedExAccount;
		$rateRequest->ClientDetail->MeterNumber = $this->fedExMeterNumber;

		$rateRequest->TransactionDetail->CustomerTransactionId = 'Rate Service Request';

		//version
		$rateRequest->Version->ServiceId = 'crs';
		$rateRequest->Version->Major = 31;
		$rateRequest->Version->Minor = 0;
		$rateRequest->Version->Intermediate = 0;

		$rateRequest->ReturnTransitAndCommit = true;
		//Shipper
		$rateRequest->RequestedShipment->Shipper->Address->StreetLines = ['547 W. 27th St'];
		$rateRequest->RequestedShipment->Shipper->Address->City = 'New York';
		$rateRequest->RequestedShipment->Shipper->Address->StateOrProvinceCode = 'NY';
		$rateRequest->RequestedShipment->Shipper->Address->PostalCode = 10001;
		$rateRequest->RequestedShipment->Shipper->Address->CountryCode = 'US';
		/*
		$rateRequest->RequestedShipment->Recipient->Address->StreetLines = ['75 9th Ave'];
		$rateRequest->RequestedShipment->Recipient->Address->City = 'New York';
		$rateRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = 'NY';
		$rateRequest->RequestedShipment->Recipient->Address->PostalCode = 10011;
		$rateRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';
		*/
		//recipient
		//547 W. 27th St

		$rateRequest->RequestedShipment->Recipient->Address->StreetLines = $street_address;
		$rateRequest->RequestedShipment->Recipient->Address->City = $city;
		$rateRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = $state;
		$rateRequest->RequestedShipment->Recipient->Address->PostalCode = $postcode;
		$rateRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';
		if($location == 'homeDelievery'){
			$rateRequest->RequestedShipment->Recipient->Address->Residential = true;
		}
		//shipping charges payment
		$rateRequest->RequestedShipment->ShippingChargesPayment->PaymentType = RateService\SimpleType\PaymentType::_SENDER;
		$rateRequest->RequestedShipment->ShippingChargesPayment->Payor->AccountNumber = $this->fedExAccount;
		$rateRequest->RequestedShipment->ShippingChargesPayment->Payor->CountryCode = 'US';

		//rate request types

		// if($request->location == 'authorizedCenter'){
		// 	$rateRequest->RequestedShipment->DropoffType=RateService\SimpleType\DropoffType::_BUSINESS_SERVICE_CENTER;
		// }
		// else{
		// 	$rateRequest->RequestedShipment->DropoffType=RateService\SimpleType\DropoffType::_DROP_BOX;
		// }

		$rateRequest->RequestedShipment->PackagingType=RateService\SimpleType\PackagingType::_YOUR_PACKAGING;
		$rateRequest->RequestedShipment->RateRequestTypes = [RateService\SimpleType\RateRequestType::_LIST];

		$rateRequest->RequestedShipment->PackageCount = 1;

		//create package line items
		$rateRequest->RequestedShipment->RequestedPackageLineItems = [new RateService\ComplexType\RequestedPackageLineItem()];
		//$rateRequest->RequestedShipment->ServiceType="STANDARD_OVERNIGHT";
		if($location == 'authorizedCenter' || $location == 'dropbox' || $location == 'officeDelievery'){
			$rateRequest->RequestedShipment->ServiceType="FEDEX_GROUND";
		}
		else{
			$rateRequest->RequestedShipment->ServiceType="GROUND_HOME_DELIVERY";
		}
		//package 1
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Weight->Value =$total_order_weight;
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Weight->Units = RateService\SimpleType\WeightUnits::_LB;
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Length = $productLenght;
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Width = $productWidth;
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Height = $productHeight;
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Units = RateService\SimpleType\LinearUnits::_IN;

		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->GroupPackageCount = 1;

		$rateServiceRequest = new RateService\Request();
		//dd($rateServiceRequest);
        $rateServiceRequest->getSoapClient()->__setLocation(RateService\Request::TESTING_URL); //use production URL

		// if(config('fedEx.Env')=="DEV")
		// {
		// 	$rateServiceRequest->getSoapClient()->__setLocation(RateService\Request::TESTING_URL); //use production URL
		// }
		// else
		// {
		// 	$rateServiceRequest->getSoapClient()->__setLocation(RateService\Request::PRODUCTION_URL); //use production URL
		// }



		$rateReply = '';
		try
		{
			$rateReply = $rateServiceRequest->getGetRatesReply($rateRequest,true); // send true as the 2nd argument to return the SoapClient's stdClass response.
			//dd($rateReply->RateReplyDetails->RatedShipmentDetails[2]->ShipmentRateDetail->TotalNetCharge->Amount);
			//return $rateReply->RateReplyDetails;
			//dd($rateReply);
			$sentXml=$rateServiceRequest->getSoapClient()->__getLastRequest();
			// $this->logRequest($sentXml,"Rate Request");
	    	// $this->logRequest($rateReply,"Rate Response");
	    	$receivedXml=$rateServiceRequest->getSoapClient()->__getLastResponse();
	    	// $this->logRequest($receivedXml,"Rate Response XML");

			// if($rateReply->HighestSeverity == "SUCCESS"){
			// 	return json_encode(array("success"=>1,"shipping_rate"=>$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount));
			// }
			if($rateReply->HighestSeverity == "SUCCESS" || ($rateReply->HighestSeverity == "NOTE" && in_array($rateReply->Notifications[0]->Code,[765,767]))){
				return json_encode(array('ss'=>$this->createShipment ,"success"=>1,"shipping_rate"=>$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount));
			}
            //custom condition will remove once worked in prodcution
            else if($rateReply->HighestSeverity == "WARNING" && isset($rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount)){
				return json_encode(array('ss'=>$this->createShipment ,"success"=>1,"shipping_rate"=>$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount));
            }
			else
			{
				if(is_array($rateReply->Notifications))
					$message=$rateReply->Notifications[0]->LocalizedMessage;
				else
					$message=$rateReply->Notifications->LocalizedMessage;

				$response=array("success"=>0,"message"=>$message,"response"=>$rateReply);
				return json_encode($response);
			}
			//data.RatedShipmentDetails[0].ShipmentRateDetail.TotalNetCharge.Amount


		}
		catch(\Exception $e)
        {
        	$response=array("success"=>0,"message"=>"FedEx rate Service not working","exception"=>$e->getMessage(),"rateReply"=>$rateReply);
			// $this->logRequest($response,"Rate Request Exception");
	        	return json_encode($response);
        }

    }

	public function allRateService(Request $request)
	{


		// $customer = Auth::guard('customer')->user();
		// if ($customer == null || $customer == '') {
		// 	return response()
		// 		->json([
		// 			'status' => false,
		// 			'message' => 'You are not logged in!'
		// 		]);
		// }

		// dd($request->all());

		//custom details
		// $street_address=$request->address;
		// $city=$request->city;
		// $state='TN';
		// $postcode=$request->postal_code;
		$street_address='10 Fed Ex Pkwy';
		$city='Memphis';
		$state='TN';
		$postcode=38115;
		$location = 'homeDelievery';
		$total_order_weight = 0;
	
		$cart_data = json_decode($this->homeService->loadCart(), true);
	
		foreach(json_decode($cart_data['cart_items']) as $item){
			
			$product = Product::find($item->item_id);
			$weight = explode('k',$product->weight);
			$total_order_weight += $weight[0];
			
		}

		
			
		// if ($CustomCall == "checkout") {
		// 	$street_address = $request["fedexStreetAddress"];
		// 	$city = $request["fedexCity"];
		// 	$state = $request["fedexState"];
		// 	$postcode = $request["fedexPostal"];
		// 	$location = $request["preferredLocation"];
		// } else {

		// 	$street_address = request()->street_address;
		// 	$city = request()->city;
		// 	$state = request()->state;
		// 	$postcode = request()->postcode;
		// 	$location = request()->location;
		// }
		if (in_array($state, ['AK', 'HI', 'GU'])) {
			$response = array("success" => 0, "message" => "Shipping service not available in your state, yet. For more information please contact our support.");
			return json_encode($response);
		}

		$total_order_weight = 0;


		//See this
		// $customer = Auth::guard('customer')->user();
		// $get_cart_product_id = Cart::where('customer_id', '=', $customer->id)->whereNotNull('product_id')->get();
		// foreach ($get_cart_product_id as $product) {
		// 	$get_weight = $product->Product->weight * $product->product_quantity;
		// 	$total_order_weight = $total_order_weight + $get_weight;
		// }


		$total_order_weight = 50; //remove this statically added
		if ($total_order_weight == 0) {
			$response = array("success" => 0, "message" => "You must add products to cart to Proceed");
			return json_encode($response);
		}

		$rateRequest = new RateService\ComplexType\RateRequest();

		//authentication & client details
		$rateRequest->WebAuthenticationDetail->UserCredential->Key = $this->fedExKey;
		$rateRequest->WebAuthenticationDetail->UserCredential->Password = $this->fedExPassword;
		$rateRequest->ClientDetail->AccountNumber = $this->fedExAccount;
		$rateRequest->ClientDetail->MeterNumber = $this->fedExMeterNumber;

		$rateRequest->TransactionDetail->CustomerTransactionId = 'testing rate service request';

		//version
		$rateRequest->Version->ServiceId = 'crs';
		$rateRequest->Version->Major = 31;
		$rateRequest->Version->Minor = 0;
		$rateRequest->Version->Intermediate = 0;

		$rateRequest->ReturnTransitAndCommit = true;
		//Shipper or company address
		$rateRequest->RequestedShipment->Shipper->Address->StreetLines = ['547 W. 27th St'];
		$rateRequest->RequestedShipment->Shipper->Address->City = 'New York';
		$rateRequest->RequestedShipment->Shipper->Address->StateOrProvinceCode = 'NY';
		$rateRequest->RequestedShipment->Shipper->Address->PostalCode = 10001;
		$rateRequest->RequestedShipment->Shipper->Address->CountryCode = 'US';


		$rateRequest->RequestedShipment->Recipient->Address->StreetLines = $street_address;
		$rateRequest->RequestedShipment->Recipient->Address->City = $city;
		$rateRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = $state;
		$rateRequest->RequestedShipment->Recipient->Address->PostalCode = $postcode;
		$rateRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';
		if ($location == 'homeDelievery') {
			$rateRequest->RequestedShipment->Recipient->Address->Residential = true;
		}
		//shipping charges payment
		$rateRequest->RequestedShipment->ShippingChargesPayment->PaymentType = RateService\SimpleType\PaymentType::_SENDER;
		$rateRequest->RequestedShipment->ShippingChargesPayment->Payor->AccountNumber = $this->fedExAccount;
		$rateRequest->RequestedShipment->ShippingChargesPayment->Payor->CountryCode = 'US';

		//rate request types
		// if($request->location == 'authorizedCenter'){
		// 	$rateRequest->RequestedShipment->DropoffType=RateService\SimpleType\DropoffType::_BUSINESS_SERVICE_CENTER;
		// }
		// else{
		// 	$rateRequest->RequestedShipment->DropoffType=RateService\SimpleType\DropoffType::_DROP_BOX;
		// }

		$rateRequest->RequestedShipment->PackagingType = RateService\SimpleType\PackagingType::_YOUR_PACKAGING;
		$rateRequest->RequestedShipment->RateRequestTypes = [RateService\SimpleType\RateRequestType::_LIST];

		$rateRequest->RequestedShipment->PackageCount = 1;

		//create package line items
		$rateRequest->RequestedShipment->RequestedPackageLineItems = [new RateService\ComplexType\RequestedPackageLineItem()];
		//$rateRequest->RequestedShipment->ServiceType="STANDARD_OVERNIGHT";
		if ($location == 'authorizedCenter' || $location == 'dropbox' || $location == 'officeDelievery') {
			$rateRequest->RequestedShipment->ServiceType = "FEDEX_GROUND";
		} else {
			$rateRequest->RequestedShipment->ServiceType = "GROUND_HOME_DELIVERY";
		}
		//package 1
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Weight->Value = $total_order_weight;
		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Weight->Units = RateService\SimpleType\WeightUnits::_LB;
		//$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Units = SimpleType\LinearUnits::_IN;

		$rateRequest->RequestedShipment->RequestedPackageLineItems[0]->GroupPackageCount = 1;

		$rateServiceRequest = new RateService\Request();



		$rateServiceRequest->getSoapClient()->__setLocation(RateService\Request::TESTING_URL); //use testing URL
		// if (config('fedEx.Env') == "DEV") {
		// 	$rateServiceRequest->getSoapClient()->__setLocation(RateService\Request::TESTING_URL); //use testing URL
		// } else {
		// 	$rateServiceRequest->getSoapClient()->__setLocation(RateService\Request::PRODUCTION_URL); //use production URL
		// }
		$rateReply = 0;
		try {
			$rateReply = $rateServiceRequest->getGetRatesReply($rateRequest, true); // send true as the 2nd argument to return the SoapClient's stdClass response.

			$sentXml = $rateServiceRequest->getSoapClient()->__getLastRequest();
			$receivedXml = $rateServiceRequest->getSoapClient()->__getLastResponse();

			// if($rateReply->HighestSeverity == "SUCCESS"){
			// 	return json_encode(array("success"=>1,"shipping_rate"=>$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount));
			// }
			if ($rateReply->HighestSeverity == "SUCCESS" || ($rateReply->HighestSeverity == "NOTE" && in_array($rateReply->Notifications[0]->Code, [765, 767]))) {
				$cart_data['shipping_calculated'] = true;
				$cart_data = $this->updateCartShipping($cart_data,$request);
				$shipping_fee =$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount;
				$cart_data['shipping'] = $shipping_fee;
				$cart_data['sub_total'] += $shipping_fee;
				
			
				$item_data = json_encode($cart_data);
				$minutes = 240;
				Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
				return json_encode(array('ss' => $this->createShipment, "success" => 1, "shipping_rate" => $rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount));

			}
			 //custom condition will remove once worked in prodcution
            else if($rateReply->HighestSeverity == "WARNING" && isset($rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount)){
				$cart_data['shipping_calculated'] = true;
				$cart_data = $this->updateCartShipping($cart_data,$request);
				
				$shipping_fee =$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount;
				$cart_data['shipping'] = $shipping_fee;
				$cart_data['sub_total'] += $shipping_fee;
				
				$item_data = json_encode($cart_data);
				
				$minutes = 240;
				Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
				return json_encode(array('ss'=>$this->createShipment ,"success"=>1,"shipping_rate"=>$rateReply->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount));
            }

			else {
				if (is_array($rateReply->Notifications))
					$message = $rateReply->Notifications[0]->LocalizedMessage;
				else
					$message = $rateReply->Notifications->LocalizedMessage;
				//When order weight is more than 150 shows this custom message
				if ($rateReply->Notifications->Code == 809 && $message == 'Package 1 - Weight is missing or invalid. ') {
					$message = 'Your products exceed the allowed weight per order. Please split the products into more than one order to complete your purchase.';
				}
				//End when order weight is more than 150 shows this custom message
				$response = array("success" => 0, "message" => $message, "response" => $rateReply);
				return json_encode($response);
			}
			//data.RatedShipmentDetails[0].ShipmentRateDetail.TotalNetCharge.Amount


		} catch (\Exception $e) {
			$response = array("success" => 0, "message" => "FedEx rate Service not working", "exception" => $e->getMessage(), "rateReply" => isset($rateReply) ? $rateReply : 'rateReply is undefinde>> no response from fedex');
			return json_encode($response);
		}
	}


	public function fedexShipment(array $data = null)
	{

		// $orderWeight = $data['orderWeight'];
		// $fullName = $data['recipentFirstName'] . ' ' . $data['recipentLastName'];
		$orderWeight = 12;
		$fullName = 'Sameer Khan';
		$customerEmail = 'abc@xyz.com';
		$customerPhone = '0987654321';


		$street_address='10 Fed Ex Pkwy';
		$city='Memphis';
		$state='TN';
		$postcode=38115;
		$location = 'homeDelievery';


		$shipDate = new \DateTime();
		$createOpenShipmentRequest = new ShipService\ComplexType\ProcessShipmentRequest();
		//authentication & client details
		$createOpenShipmentRequest->WebAuthenticationDetail->UserCredential->Key = $this->fedExKey;
		$createOpenShipmentRequest->WebAuthenticationDetail->UserCredential->Password = $this->fedExPassword;
		$createOpenShipmentRequest->ClientDetail->AccountNumber = $this->fedExAccount;
		$createOpenShipmentRequest->ClientDetail->MeterNumber = $this->fedExMeterNumber;

		// web authentication detail

		// version
		$createOpenShipmentRequest->Version->ServiceId = 'ship';
		$createOpenShipmentRequest->Version->Major = 23;
		$createOpenShipmentRequest->Version->Intermediate = 0;
		$createOpenShipmentRequest->Version->Minor = 0;

		// package 1
		$requestedPackageLineItem1 = new ShipService\ComplexType\RequestedPackageLineItem();
		$requestedPackageLineItem1->SequenceNumber = 1;
		$requestedPackageLineItem1->ItemDescription = 'SelectTechnology Order';
		//$requestedPackageLineItem1->Dimensions->Width = 10;
		//$requestedPackageLineItem1->Dimensions->Height = 10;
		//$requestedPackageLineItem1->Dimensions->Length = 15;
		//$requestedPackageLineItem1->Dimensions->Units = SimpleType\LinearUnits::_IN;
		$requestedPackageLineItem1->Weight->Value = $orderWeight;
		$requestedPackageLineItem1->Weight->Units = ShipService\SimpleType\WeightUnits::_LB;
		// requested shipment

		$createOpenShipmentRequest->RequestedShipment->DropoffType = ShipService\SimpleType\DropoffType::_REGULAR_PICKUP;
		$createOpenShipmentRequest->RequestedShipment->ShipTimestamp = $shipDate->format('c');
		$createOpenShipmentRequest->RequestedShipment->ServiceType = ShipService\SimpleType\ServiceType::_GROUND_HOME_DELIVERY;

		$createOpenShipmentRequest->RequestedShipment->PackagingType = ShipService\SimpleType\PackagingType::_YOUR_PACKAGING;
		//$createOpenShipmentRequest->RequestedShipment->LabelSpecification->ImageType = SimpleType\ShippingDocumentImageType::_PDF;
		$createOpenShipmentRequest->RequestedShipment->LabelSpecification->LabelFormatType = ShipService\SimpleType\LabelFormatType::_LABEL_DATA_ONLY;
		//$createOpenShipmentRequest->RequestedShipment->LabelSpecification->LabelStockType = SimpleType\LabelStockType::_PAPER_4X6;
		$createOpenShipmentRequest->RequestedShipment->RateRequestTypes = [ShipService\SimpleType\RateRequestType::_LIST];
		$createOpenShipmentRequest->RequestedShipment->PackageCount = 1;
		$createOpenShipmentRequest->RequestedShipment->RequestedPackageLineItems = [$requestedPackageLineItem1];

		// requested shipment shipper
		$createOpenShipmentRequest->RequestedShipment->Shipper->AccountNumber = $this->fedExAccount;
		$createOpenShipmentRequest->RequestedShipment->Shipper->Address->StreetLines = '4120 NE PORT DR';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Address->City = 'LEES SUMMIT';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Address->StateOrProvinceCode = 'MO';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Address->PostalCode = '640641670';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Address->CountryCode = 'US';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Contact->CompanyName = 'SelectTechnology';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Contact->PersonName = 'Harry Singer ';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Contact->EMailAddress = 'pureselects.txlabz@gmail.com';
		$createOpenShipmentRequest->RequestedShipment->Shipper->Contact->PhoneNumber = '1-816-847-2466';

		// requested shipment recipient
		$createOpenShipmentRequest->RequestedShipment->Recipient->Address->StreetLines = $street_address;
		$createOpenShipmentRequest->RequestedShipment->Recipient->Address->City = $city;
		$createOpenShipmentRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = $state;
		$createOpenShipmentRequest->RequestedShipment->Recipient->Address->PostalCode = $postcode;
		$createOpenShipmentRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';
		if($location == 'homeDelievery'){
			$createOpenShipmentRequest->RequestedShipment->Recipient->Address->Residential = true;
		}

		$createOpenShipmentRequest->RequestedShipment->Recipient->Contact->PersonName = $fullName;
		$createOpenShipmentRequest->RequestedShipment->Recipient->Contact->EMailAddress = $customerEmail;
		$createOpenShipmentRequest->RequestedShipment->Recipient->Contact->PhoneNumber = $customerPhone;

		// shipping charges payment
		$createOpenShipmentRequest->RequestedShipment->ShippingChargesPayment->Payor->ResponsibleParty = $createOpenShipmentRequest->RequestedShipment->Shipper;
		$createOpenShipmentRequest->RequestedShipment->ShippingChargesPayment->PaymentType = ShipService\SimpleType\PaymentType::_SENDER;

		// send the create open shipment request
		$openShipServiceRequest = new ShipService\Request();


		$openShipServiceRequest->getSoapClient()->__setLocation(ShipService\Request::TESTING_URL); //use production URL
		// if (config('fedEx.Env') == "DEV") {
		// 	$openShipServiceRequest->getSoapClient()->__setLocation(ShipService\Request::TESTING_URL); //use production URL
		// } else {
		// 	$openShipServiceRequest->getSoapClient()->__setLocation(ShipService\Request::PRODUCTION_URL); //use production URL
		// }


		$createOpenShipmentReply = $openShipServiceRequest->getProcessShipmentReply($createOpenShipmentRequest, true);



		$sentXml = $openShipServiceRequest->getSoapClient()->__getLastRequest();
		// $this->logRequest($sentXml, "Create Shipment Request Request");
		// $this->logRequest($createOpenShipmentReply, "Create Shipment Response");
		$receivedXml = $openShipServiceRequest->getSoapClient()->__getLastResponse();
		// $this->logRequest($receivedXml, "Create Shipment Response XML");


		if (!in_array($createOpenShipmentReply->HighestSeverity, ["FAILURE", "ERROR"])) {
			// $PlacedOrder = CustomerOrder::where('id', '=', $data['orderId'])->get();
			try {
				$shippingCharges = $createOpenShipmentReply->CompletedShipmentDetail->ShipmentRating->ShipmentRateDetails[0]->TotalNetCharge->Amount;
				$trackingId = $createOpenShipmentReply->CompletedShipmentDetail->MasterTrackingId->TrackingNumber;
				// CustomerOrder::where('id', '=', $data['orderId'])->update(['track_id' => $trackingId]);

				// if ($PlacedOrder[0]->shipping_charges != $shippingCharges) {

				// 	//Returned value from fedex is not same as returned in rate service
				// 	$record = array(
				// 		"order_id" => $data["orderId"],
				// 		"rateServicePrice" => $PlacedOrder[0]->shipping_charges,
				// 		"craeteShippingServicePrice" => $shippingCharges
				// 	);
				// 	$this->logRequest($record, "FedEx shipping Exception for rate Service");
				// }
				return array($shippingCharges, $trackingId);
			} catch (\Exception $e) {
				// $record = array(
				// 	"order_id" => $data["orderId"],
				// 	"Exception" => $e->getMessage(),
				// 	"createOpenShipmentReply" => $createOpenShipmentReply
				// );
				// $this->logRequest($record, "FedEx shipping Exception");
				// return array($PlacedOrder[0]->shipping_charges, 'not available');
			}
		} else {

			// $this->logRequest(["status" => "-1", "MeterNumber" => $createOpenShipmentRequest->ClientDetail->MeterNumber, "reply" => $createOpenShipmentReply, "data" => $data], "Shipment failed");
			return null;
		}

		//dd($createOpenShipmentReply);
	}

	public function updateCartShipping($cart_data,$request){
			$cartItems = json_decode($cart_data['cart_items']);
			foreach($cartItems as $key => $item){
			
				$cartItems[$key]->shipping_status = true;

			}
			$cart_data['user'] = [
				"email" => $request->email,
				"first_name" => $request->first_name,
				"last_name" => $request->last_name,
				"contact_no" => $request->contact_no,
				"country" => $request->country,
				"address" => $request->address,
				"city" => $request->city,
				"state" => $request->state,
				"postal_code" => $request->postal_code
			  ];
			 
			$cart_data['cart_items'] = $cartItems;
		
			return $cart_data;
	}


}
