<?php

namespace App\Http\Controllers\Api;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function listReports(){
        return ReportResource::collection(Report::orderBy('created_at', 'desc')->get());
    }
    public function getReport(Request $request){

        $report = Report::find($request->report_id);
        $file = Storage::path($report->report_link);
        return response()->download($file);

        // $report = Report::find($request->report_id);
        // $headers = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="file.pdf"'
        // ];
        // // // return response()->download($report->report_link);
        // return response()->download('file.pdf','file.pdf', $headers, 'inline');
    }
    public function generateReport(Request $request){
        $form = $this->parseData($request->params['form']);

        Report::create($this->parseCreateReportData($form));

        (new UsersExport($form['fecha_inicio'], $form['fecha_fin']))
        ->store($form['file_name']);
        // ->queue("invoices".date("H:i:s").".xlsx")->chain([
        //     // new NotifyUserOfCompletedExport(request()->user()),
        // ]);
        return response()->json(['ok' => true]);
    }
    private function parseData($data){
        return [
            'descripcion'    => $data['descripcion'],
            'fecha_inicio'   => $data['fecha_nacimiento_inicio'],
            'fecha_fin'      => $data['fecha_nacimiento_fin'],
            'file_name'      => "report-".date("H-i-s").".xlsx"
        ];
    }
    private function parseCreateReportData($data){
        return [
            'title' => $data['descripcion'],
            'report_link' => $data['file_name'],
        ];
    }
}
