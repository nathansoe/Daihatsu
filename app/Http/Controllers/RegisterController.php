<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisterController extends Controller
{
    public function storeUser(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'nik' => 'required|numeric|digits:16',
                'domisili' => 'required',
                'no_hp' => 'required|numeric',
                'email' => 'required|email',
                'jenis_peserta' => 'required',
                'jumlah_hadir' => 'required|numeric',
            ]);

            if ($validator->fails()) {
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
            $status = 0;
            $createBarcode = $this->generateQrCode($request->nik);

            $register = Register::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'domisili' => $request->domisili,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'jenis_peserta' => $request->jenis_peserta,
                'jumlah_hadir' => $request->jumlah_hadir,
                'status' => $status,
                'qrcode_id' => $createBarcode['nik'],
                'link_qrcode' => $createBarcode['link_file']
            ]);

            $showValue = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'link_qrcode' => storage_path('app/public/' . $createBarcode['link_file'])
            ];

            return response()->json($showValue, 200);
        } catch (GuzzleException $th) {
            return response()->json(['message' => $th->getResponse()], 500);
        }
    }

    public function cekRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Register::where('nik', $request->nik)->where('email', $request->email)->first();
        if (!$data) {
            return response()->json([
                'code' => 404,
                'status' => 'Error',
                'message' => 'Data Anda tidak Ada, Anda belum terdaftar!'
            ], 404);
        }

        $showData = [
            'nama' => $data->nama,
            'nik' => $data->nik,
            'email' => $data->email,
            'link_qrcode' => storage_path('app/public/' . $data->link_qrcode)
        ];

        return new PostResource(true, 'Success', $showData);
    }

    public function downloadQr($nik)
    {
        $data = Register::where('nik', $nik)->first();

        if (!$data) {
            return response()->json([
                'code' => 404,
                'status' => 'Error',
                'message' => 'Qrcode Anda tidak ada!'
            ], 404);
        }

        $filePath =  storage_path('app/public/' . $data->link_qrcode);
          // Check if the file exists
          if (file_exists($filePath)) {
            // Return the file as a response
            return response()->download($filePath);
        } else {
            return response()->json('error', 500);
        }
    }


    public function generateQrCode($nik)
    {
        $qrCodeImage = QrCode::format('png')
            ->margin(1)
            // ->merge('img/t.jpg', 0.1, true)
            ->size(200)->errorCorrection('H')
            ->generate($nik);
        $output_file = 'img/qr-code/img-' . $nik . '.png';
        Storage::disk('public')->put($output_file, $qrCodeImage);

        $resultArray = [
            'link_file' => $output_file,
            'nik' => $nik
        ];

        return $resultArray;
    }
}
