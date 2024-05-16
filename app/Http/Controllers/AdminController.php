<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\PostResource;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{

    protected $registers;

    public function __construct(Register $registers){
        $this->registers = $registers;
    }

    public function filterKehadiran($status){
        if($status == '0'){
            $registers = $this->registers->tidakHadir();
        }
        else if($status == 1){
            $registers = $this->registers->hadir();

        }else {
            $registers = $this->registers->allKehadiran();
        }

        return response()->json($registers);

    }

    public function exportExcel(Request $request){
        $status = $request->query('status');
        
        if($status == '0'){
            $registers = $this->registers->tidakHadir();
        }
        else if($status == 1){
            $registers = $this->registers->hadir();

        }else {
            $registers = $this->registers->allKehadiran();
        }


        //create new spreadsheet
        $excel = new Spreadsheet();
        $sheet = $excel->getActiveSheet();

        $sheet->setCellValue('A1', 'NIK');
        $sheet->setCellValue('B1', 'NAMA');
        $sheet->setCellValue('C1', 'EMAIL');
        $sheet->setCellValue('D1', 'DOMISILI');
        $sheet->setCellValue('E1', 'NOHP');
        $sheet->setCellValue('F1', 'JUMLAH HADIR');
        $sheet->setCellValue('G1', 'JENIS PESERTA');
        $sheet->setCellValue('H1', 'KEHADIRAN');
        $sheet->setCellValue('I1', 'TANGGAL DAFTAR');

        $row = 2;
        foreach ($registers as $item) {
            $sheet->setCellValue('A'. $row , $item->nik);
            $sheet->setCellValue('B'. $row , $item->nama);
            $sheet->setCellValue('C'. $row , $item->email);
            $sheet->setCellValue('D'. $row , $item->domisili);
            $sheet->setCellValue('E'. $row , $item->no_hp);
            $sheet->setCellValue('F'. $row , $item->jumlah);
            $sheet->setCellValue('G'. $row , $item->jenis);
            $sheet->setCellValue('H'. $row , $item->kehadiran);
            $sheet->setCellValue('I'. $row , $item->tanggal_daftar);

            $row++;
        }

        $writer = new Xlsx($excel);
        if($status == '0'){
            $fileName = 'Data_Tidak_Hadir.xlsx';
        }
        else if($status == 1){
            $fileName = 'Data_Hadir.xlsx';
        }else {
            $fileName = 'Data_Kehadiran_All.xlsx';
        }
        $writer->save($fileName);
        return response()->download($fileName);
    }

    public function jsonDataKehadiran($qrcodeId){
        $qrcodeId = Register::where('nik', $qrcodeId)->first();
        if(!$qrcodeId){
                return response()->json([
                    'code' => 404,
                    'status' => 'Error',
                    'message' => 'Data QR tersebut tidak ada!'
                ], 404);
        }

        $data_json = [
            'nik' => $qrcodeId->nik,
            'nama' => $qrcodeId->nama,
            'email' => $qrcodeId->email
        ];

        return new PostResource(true, 'success', $data_json);
    }

    public function verifikasiKehadiran($qrcodeId){
        $qrcodeId = Register::where('nik', $qrcodeId)->first();
        if(!$qrcodeId){
                return response()->json([
                    'code' => 404,
                    'status' => 'Error',
                    'message' => 'Data QR tersebut tidak ada!'
                ], 404);
        }

        $qrcodeId->status = 1;
        $qrcodeId->time_arrive = Carbon::now();
        $qrcodeId->save();
        return redirect()->back()->with('success', 'Kedatangan Terverifikasi');
    }

    public function destroy($id){
        Register::find($id)->delete();
        // return response()->json('success');
        return redirect()->back()->with('success', 'Data Register Terhapus!');
    }

    public function destroyCheckList(Request $request){
        $nik_checklist = $request->input('nik');
        Register::whereIn('nik', $nik_checklist)->delete();
        return redirect()->back()->with('success', 'Data Register Terhapus!');

    }
}
