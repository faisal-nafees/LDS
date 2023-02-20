<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public static function createInvoice($order_id)
    {
        $pdf = PDF::loadView('pdf.customer', [
            'order_id' => $order_id,
            'basicData' => session('basicDetail'),
            'billingDetails' => session('billingDetails'),
            'items' => session('items')
        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );;
        $filename = $order_id . '.pdf';
        $pdf->save(public_path() . '/pdf/' . $filename);
        return 'public/pdf/' . $filename;
    }

    public static function createSalesInvoice($order_id)
    {
        $data = ['order_id' => $order_id];
        $pdf = PDF::loadView('pdf.sales',  [
            'order_id' => $order_id,
            'basicData' => session('basicDetail'),
            'billingDetails' => session('billingDetails'),
            'items' => session('items')
        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        //$pdf->setOptions(['defaultFont' => 'sans-serif']);
        $filename = $order_id . '.pdf';
        $pdf->save(public_path() . '/pdf/sales/' . $filename);
        return 'public/pdf/sales/' . $filename;
    }

    public static function createSlip($order_id)
    {
        $data = ['order_id' => $order_id];
        $pdf = PDF::loadView('pdf.slip',  [
            'order_id' => $order_id,
            'basicData' => session('basicDetail'),
            'billingDetails' => session('billingDetails'),
            'items' => session('items')
        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        $filename = $order_id . '.pdf';
        $pdf->save(public_path() . '/pdf/slip/' . $filename);
        return 'public/pdf/slip/' . $filename;
    }
}
