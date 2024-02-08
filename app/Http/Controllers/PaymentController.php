<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Guysolamour\Cinetpay\Cinetpay;
use Guysolamour\Cinetpay\Http\Controllers\PaymentController as CinetpayPaymentController;

class PaymentController extends CinetpayPaymentController
{
    public function cancel(Request $request)
    {

         return redirect('/');
    }

    public function return(Request $request, Cinetpay $cinetpay)
    {
        $transactionId= \Guysolamour\Cinetpay\Cinetpay::generateTransId(); // cette valeur devra etre stocke dans votre application afin d'identififier et vérfier le statut de chaque paiement
        $user = Auth();

        $cinetpay = \Guysolamour\Cinetpay\Cinetpay::init()
            ->setTransactionId($transactionId) // must be unique
            ->setBuyerIdentifiant($user->id() )
            ->setPhonePrefixe('221')
            ->setCelPhoneNum('771875242')
            ->setAmount('950000')
        ;





        // $cinetpay->getTransactionBuyer();
        // $cinetpay->getTransactionDate()->toDateString();
        // $cinetpay->getTransactionCurrency();
        // $cinetpay->getTransactionPaymentMethod();
        // $cinetpay->getTransactionPaymentId();
        // $cinetpay->getTransactionPhoneNumber();
        // $cinetpay->getTransactionPhonePrefix();
        // $cinetpay->getTransactionLanguage();
        // $cinetpay->isValidPayment();


        if ($cinetpay->isValidPayment()) {
            // success
        } else {
            // fail
        }


        return view('dashboard', ['cinetpay' => $cinetpay]);
    }

    public function notify(Request $request, Cinetpay $cinetpay)
    {
        // $cinetpay->getTransactionBuyer();
        // $cinetpay->getTransactionDate()->toDateString();
        // $cinetpay->getTransactionCurrency();
        // $cinetpay->getTransactionPaymentMethod();
        // $cinetpay->getTransactionPaymentId();
        // $cinetpay->getTransactionPhoneNumber();
        // $cinetpay->getTransactionPhonePrefix();
        // $cinetpay->getTransactionLanguage();
        // $cinetpay->isValidPayment();


        if ($cinetpay->isValidPayment()){
            // success
        }else {
            // fail
        }

        // redirect the user where you want
        // return redirect('/'); // or redirect()->home();
    }
}

