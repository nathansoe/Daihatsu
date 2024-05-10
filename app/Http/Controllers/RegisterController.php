<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        try {
                    
        $validator = Validator::make($request -> all(),[
            'nama' => 'required',
            'nik' =>'required',
            'domisili'=> 'required',
            'no_hp' => 'required',
            'email'=> 'required',
            'jenis_peserta'=> 'required',
            'jumlah_hadir' => 'required',
            'status' => 'required'
        ]);

        if($validator -> fails()){
            return response()->json($validator->errors(), 422);
        }

        $checkNIK = Register::where('nik', $request->nik)->first();
        if ($checkNIK) {
            return response()->json([
                'code' => 409,
                'status' => 'Error',
                'message' => 'Anda Sudah terdaftar!'
            ], 409);
        }
        // return 'berhasil';

        $createBarcode = $this->generateQrCode($request->nik);
        // $qrCodeImage = QrCode::format('png')
        // // ->merge('img/t.jpg', 0.1, true)
        // ->size(200)->errorCorrection('H')
        // ->generate($request->nik);
        // $output_file = '/img/qr-code/img-' . $request->nik . '.png';
        // $saveImage = Storage::disk('local')->put($output_file, $qrCodeImage);
        // // Register::create([
        // // 'qrcode_id' => $nik,
        // // 'link_qrcode' => $saveImage
        // // ]);
        // // return $saveImage;
        die();

        $messageHeader = 'Selamat datang di Daihatsu';
        Mail::to($request->email)->send(new SendEmail($messageHeader));
         
        $register = Register::create([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'domisili'=> $request->domisili,
            'no_hp' => $request->no_hp,
            'email'=> $request->email,
            'jenis_peserta'=> $request->jenis_peserta,
            'jumlah_hadir' => $request->jumlah_hadir,
            'status' => $request->status
        ]);
            
        return new PostResource(true, 'Sukses Registrasi!', $register);
        } catch (GuzzleException $th) {
            return response()->json(['message' => $th->getResponse()], 500);
        }


    }


    public function generateQrCode($nik){
        $qrCodeImage = QrCode::format('png')
                    // ->merge('img/t.jpg', 0.1, true)
                    ->size(200)->errorCorrection('H')
                    ->generate($nik);
        $output_file = '/img/qr-code/img-' . $nik . '.png';
        $saveImage = Storage::disk('local')->put($output_file, $qrCodeImage);
        Register::create([
            'qrcode_id' => $nik,
            'link_qrcode' => $saveImage
        ]);

        return $saveImage;  
    }

}
