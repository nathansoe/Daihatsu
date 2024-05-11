<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Register extends Model
{
    use HasFactory;
    protected $table = 'register';
    protected $guarded = ['id'];

    function __construct()
	{
		parent::__construct();
	}


      public function allKehadiran(){
        $query = "SELECT 
        nama as NAMA, email as EMAIL, nik as NIK, domisili as DOMISILI, jenis_peserta as JENIS, jumlah_hadir as JUMLAH,  
        case 
        when status = 0 then 'Tidak Hadir'  
        when status = 1 then 'Hadir' end as KEHADIRAN 
        from register";
        $hadir = DB::select($query);
        return $hadir;
    }

    public function hadir(){
        $query = "SELECT 
        nama as NAMA, email as EMAIL, nik as NIK, domisili as DOMISILI, jenis_peserta as JENIS, jumlah_hadir as JUMLAH,  
        case 
        when status = 0 then 'Tidak Hadir'  
        when status = 1 then 'Hadir' end as KEHADIRAN 
        from register WHERE status = 1" ;
        $hadir = DB::select($query);
        return $hadir;
    }
    public function tidakHadir(){
        $query = "SELECT 
        nama as NAMA, email as EMAIL, nik as NIK, domisili as DOMISILI, jenis_peserta as JENIS, jumlah_hadir as JUMLAH,  
        case 
        when status = 0 then 'Tidak Hadir'  
        when status = 1 then 'Hadir' end as KEHADIRAN 
        from register WHERE status = 0";
        $hadir = DB::select($query);
        return $hadir;
    }
}
