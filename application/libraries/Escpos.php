<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *  ==============================================================================
 *  Author  : Mian Saleem
 *  Email   : saleem@tecdiary.com
 *  For     : ESC/POS Print Driver for PHP
 *  License : MIT License
 *  ==============================================================================
 */
require_once APPPATH .'libraries/escpos-php/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class Escpos
{

    public $printer;
    public $char_per_line = 42;

    public function __construct() {

    }

    public function __get($var) {
        return get_instance()->$var;
    }

    function load($printer) {
        if ($printer->type == 'network') {
            $connector = new NetworkPrintConnector($printer->printer_ip_address, $printer->printer_port);
        } elseif ($printer->type == 'linux') {
            $connector = new FilePrintConnector($printer->path);
        } else {
            $connector = new WindowsPrintConnector($printer->path);
        }
        $this->char_per_line = $printer->characters_per_line;
        $profile = CapabilityProfile::load($printer->profile_);
        $this->printer = new Printer($connector, $profile);
    }
    function load_printer($type,$printer_ip_address,$path,$printer_port,$characters_per_line,$profile_) {
        if ($type == 'network') {
            $connector = new NetworkPrintConnector($printer_ip_address, $printer_port,$characters_per_line);
        } elseif ($type == 'linux') {
            $connector = new FilePrintConnector($path);
        } else {
            $connector = new WindowsPrintConnector($path);
        }
        $this->char_per_line = $characters_per_line;
        $profile = CapabilityProfile::load($profile_);
        $this->printer = new Printer($connector, $profile);
    }

    public function print_receipt($data_arr) {
        $data = (object) $data_arr;
        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setEmphasis(true);
        $this->printer->setTextSize(2, 2);
        $this->printer->text(printText($data->store_name,$this->char_per_line)."\n");
        $this->printer->setEmphasis(false);
        $this->printer->setTextSize(1, 1);

        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setEmphasis(true);
        $this->printer->text(printText($data->address,$this->char_per_line)."\n");
        $this->printer->text(lang('phone').": ".$data->phone."\n");
        if($data->collect_tax =='Yes' && $data->tax_registration_no){
            $this->printer->text(lang('Tax_Registration_No').": ".$data->tax_registration_no."\n");
        }
        $this->printer->text(lang('order_type').": ".($data->sale_type)."\n");
        $this->printer->text(lang('Invoice_No').": ".$data->sale_no_p."\n");
        $this->printer->feed();
        $this->printer->setEmphasis(false);
        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
        $this->printer->text(lang('date').": ".($data->date)." ".($data->time_inv)."\n");
        $this->printer->text(lang('Sales_Associate').": ".($data->sales_associate)."\n");
        $this->printer->text(lang('customer').": ".($data->customer_name)."\n");
        if($data->customer_address!=NULL  && $data->customer_address!=""){
            $this->printer->text(lang('address').": ".$data->customer_address."\n");
        }

        if($data->waiter_name!=''){
            $this->printer->text(lang('waiter').": ".$data->waiter_name."\n");
        }

        if($data->customer_table){
                  $this->printer->text(lang('table').": ".$data->customer_table."\n");
             }

        $this->printer->text($data->items);
        $this->printer->text(drawLine($this->char_per_line));
        $this->printer->text($data->totals);
        $this->printer->text(drawLine($this->char_per_line));

        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setEmphasis(true);
        $this->printer->text(printText($data->invoice_footer,$this->char_per_line)."\n");
        $this->printer->qrCode($data->random_code,Printer::QR_ECLEVEL_L, 6);
        $this->printer->setEmphasis(false);
        $this->printer->cut();
        // Open cash drawer
            if(isset($data->open_cash_drawer_when_printing_invoice) && $data->open_cash_drawer_when_printing_invoice=="Yes"){
                $this->printer->pulse();
            }
        $this->printer->close();

    }

    public function print_receipt_bill($data_arr) {
        $data = (object) $data_arr;
        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setEmphasis(true);
        $this->printer->setTextSize(2, 2);
        $this->printer->text(printText($data->store_name,$this->char_per_line)."\n");
        $this->printer->setEmphasis(false);
        $this->printer->setTextSize(1, 1);

        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setEmphasis(true);
        $this->printer->text(lang('order_type').": ".($data->sale_type)."\n");
        $this->printer->text(lang('Bill_No').": ".$data->sale_no_p."\n");
        $this->printer->feed();
        $this->printer->setEmphasis(false);
        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
        $this->printer->text(lang('date').": ".($data->date)." ".($data->time_inv)."\n");
        $this->printer->text(lang('Sales_Associate').": ".($data->sales_associate)."\n");
        $this->printer->text(lang('customer').": ".($data->customer_name)."\n");
        if($data->customer_address!=NULL  && $data->customer_address!=""){
            $this->printer->text(lang('address').": ".$data->customer_address."\n");
        }

        if($data->waiter_name!=''){
            $this->printer->text(lang('waiter').": ".$data->waiter_name."\n");
        }

        if($data->customer_table){
            $this->printer->text(lang('table').": ".$data->customer_table."\n");
        }

        $this->printer->text($data->items);
        $this->printer->text(drawLine($this->char_per_line));
        $this->printer->text($data->totals);
        $this->printer->text(drawLine($this->char_per_line));

        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setEmphasis(true);
        $this->printer->text(printText($data->invoice_footer,$this->char_per_line)."\n");
        $this->printer->setEmphasis(false);
        $this->printer->cut();
        $this->printer->close();

    }
    public function print_kitchen_printers($data_arr) {
        $data_arr = (object) $data_arr;
        foreach ($data_arr as $data){
            //printer load
            $this->load_printer($data->type,$data->printer_ip_address,$data->path,$data->printer_port,$data->characters_per_line,$data->profile_);

            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->setEmphasis(true);
            $this->printer->setTextSize(2, 2);
            $this->printer->text(printText($data->store_name,$this->char_per_line)."\n");
            $this->printer->setEmphasis(false);
            $this->printer->setTextSize(1, 1);

            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->setEmphasis(true);
            $this->printer->text(lang('order_type').": ".($data->sale_type)."\n");
            $this->printer->text(lang('Invoice_No').": ".$data->sale_no_p."\n");
            $this->printer->feed();
            $this->printer->setEmphasis(false);

            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $this->printer->text(lang('date').": ".($data->date)." ".($data->time_inv)."\n");
            $this->printer->text(lang('Sales_Associate').": ".($data->sales_associate)."\n");
            $this->printer->text(lang('customer').": ".($data->customer_name)."\n");
            if($data->customer_address!=NULL  && $data->customer_address!=""){
                $this->printer->text(lang('address').": ".$data->customer_address."\n");
            }

            if($data->waiter_name!=''){
                $this->printer->text(lang('waiter').": ".$data->waiter_name."\n");
            }

            if($data->customer_table){
                $this->printer->text(lang('table').": ".$data->customer_table."\n");
            }

            $this->printer->text($data->items);
            $this->printer->text(drawLine($this->char_per_line));
            $this->printer->cut();
            $this->printer->close();
        }
    }

    function open_drawer() {
        $this->printer->pulse();
        $this->printer->close();
    }

}
