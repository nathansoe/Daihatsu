<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Routing\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

        return new PostResource(true, 'Success', $registers);

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
        $sheet->setCellValue('G1', 'JENIS KEHADIRAN');
        $sheet->setCellValue('H1', 'KEHADIRAN');
        $sheet->setCellValue('I1', 'TANGGAL DAFTAR');

        $row = 9;
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
        return response()->download($fileName)->deleteFileAfterSend(true);
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
        $qrcodeId->save();
        return new PostResource(true, 'Kedatangan terverifikasi!', 'NIK anda ' . $qrcodeId->nik);

    }
}
