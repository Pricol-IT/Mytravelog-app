<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToCollection, WithStartRow ,WithChunkReading, WithBatchInserts
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    public function collection(Collection $rows)
    {
       
        foreach ($rows as $row) 
        {
            if($row!=null){
            info($row);
            $user=User::create([
                'name' => $row[0],
                'email'=> $row[1],
                'password'=>Hash::make($row[2]),
                'emp_id'=>$row[3],
            ]);
            UserDetail::create([
                'user_id'=>$user->id,
                'role'=>$row[4],
                'designation'=>$row[5],
                'department'=>$row[6],
                'grade'=>$row[7],
                'company'=>$row[8],
                'repostingto'=>$row[9],
                'location'=>$row[10],
                'dob'=>Carbon::parse($row[11])->format('Y-m-d'),
                'aadharno'=>$row[12],
                'passportno'=>$row[13],
                'mobilenumber'=>$row[14],
            ]);
        }
    }
    }
}
