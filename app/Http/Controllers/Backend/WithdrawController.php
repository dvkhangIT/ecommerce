<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\WithdrawRequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function index(WithdrawRequestDataTable $dataTable)
    {
        return $dataTable->render('admin.withdraw.index');
    }
    function show(string $id)
    {
        $request = WithdrawRequest::findOrfail($id);
        return view('admin.withdraw.show', compact('request'));
    }
}
