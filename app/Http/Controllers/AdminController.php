<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Routing\Controller;
use App\Http\Resources\PostResource;

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

    public function registExport( Request $request){
        $status = $request->query('status');
        $fileName = $status.'_register.xlsx';

        
    }

    // public function allKehadiran(){
    //     $all = $this->registers->allKehadiran();
    //     return new PostResource(true, 'Success', $all);
    // }

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
