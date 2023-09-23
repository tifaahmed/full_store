<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportOrdersVendorRceived implements FromView
{
    private $data;
    public function __construct($data)
    {
        $this->data =$data;
    }
    public function view(): View
    {
        return view('admin.orders.export-excel-orders-vendor-rceived', [
            'data' => $this->data
        ]);
    }
}
