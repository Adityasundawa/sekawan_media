<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function export()
{

    return Excel::download(new ExcelExport, ''.rand().'.xlsx');

}
}
