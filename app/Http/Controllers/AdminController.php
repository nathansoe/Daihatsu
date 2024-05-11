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

    public function allKehadiran(){
        $all = $this->registers->allKehadiran();
        return new PostResource(true, 'Success', $all);
    }

    public function hadir(){

        $hadir = $this->registers->hadir();
        return new PostResource(true, 'Success', $hadir);

    }

    public function tidakHadir(){

        $tidakHadir = $this->registers->tidakHadir();
        return new PostResource(true, 'Success', $tidakHadir);

    }

    public function verifikasiKehadiran($qrcodeId){
        $qrcodeId = Register::findOrFail($qrcodeId);
        return $qrcodeId;die();
        if(!$qrcodeId){
                return response()->json([
                    'code' => 404,
                    'status' => 'Error',
                    'message' => 'Data QR tersebut tidak ada!'
                ], 404);
        }

        $qrcodeId->status = 1;
        $qrcodeId->save();
        return new PostResource(true, 'Kedatangan terverifikasi!', 'NIK anda' . $qrcodeId);

    }
}
