<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ApiController extends Controller
{
    public function getBiometricLogs($user_id, Request $request) {
        $start = $request->start ? Carbon::parse($request->start) : Carbon::now();
        $end = $request->end ? Carbon::parse($request->end) : Carbon::now();

        $start = $start->startOfDay()->format('Y-m-d');
        $end = $end->endOfDay()->format('Y-m-d');
        $attendance = DB::connection('access')->select('SELECT Transactions.[ID], Transactions.[date], Transactions.[time], Transactions.[SerialNo], Transactions.[TransType], Transactions.[pin], Transactions.[ReceivedDate], Transactions.[ReceivedTime], templates.[FirstName], templates.[LastName], UnitSiteQuery.[UnitName] FROM (Transactions LEFT JOIN UnitSiteQuery ON Transactions.Address = UnitSiteQuery.Address) LEFT JOIN templates ON (Transactions.pin = templates.pin) AND (Transactions.finger = templates.finger) WHERE (Transactions.[TransType] = 7 OR Transactions.[TransType] = 8) AND Transactions.[ID] > 704020 AND Transactions.[pin] = '.$user_id.' AND Transactions.[date] >= #' . $start . '# ANd Transactions.[date] <= #' . $end . '# ORDER BY Transactions.[date] DESC');

        $data = [];
        foreach ($attendance as $row) {
            $data[] = [
                'biometric_id' => $row->ID,
                'bio_date' => $row->date,
                'bio_time' => $row->time,
                'serial_no' => $row->SerialNo,
                'trans_type' => $row->TransType,
                'employee_id' => $row->pin,
                'received_date' => $row->ReceivedDate,
                'received_time' => $row->ReceivedTime,
                'unit_name' => $row->UnitName,
                'type' => 'raw data',
            ];
        }

        return response()->json($data);
    }
}
