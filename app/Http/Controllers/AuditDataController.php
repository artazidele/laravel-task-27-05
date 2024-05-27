<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditData;

class AuditDataController extends Controller
{
    // Function that adds audit data to database
    public function addAuditData(Int $item, Int $user, String $action) {
        $data = new AuditData;
        $data->itemId = $item;
        $data->userId = $user;
        $data->action = $action;
        $data->dateandtime = date("Y-m-d H:i:s");
        $data->save();
    }

    // Function that returns JSON with audit data
    public function filterauditdata(Request $request) {
        if (isset($request->from) && isset($request->to)) {
            $from = date_create($request->from);
            $fromFormatted = date_format($from,"Y/m/d H:i:s");
            $to = date_create($request->to)->modify('+1 day');
            $toFormatted = date_format($to,"Y/m/d H:i:s");
            $auditData = AuditData::where('dateandtime', '>=', $fromFormatted)
                ->where('dateandtime', '<', $toFormatted)->orderBy('dateandtime', 'desc')->get();
            return $auditData;
        } else {
            $auditData = AuditData::orderBy('dateandtime', 'desc')->take(10)->get();
            return $auditData;
        }
    }
}
