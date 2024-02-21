<?php

namespace App\Imports;
use App\Models\Category;

use App\Models\Reward;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class RewardsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
          $check = Category::where([
            ['Category', '=', $row['category']],
        ]);
        if ($check->count() == 0) {
            // return redirect()->back()->with('message', 'Category Already Added');
            Category::create([
                        'Category' => $row['category']
                //         // ... add other columns
                    ]);

        }



        $check1 = Reward::where([
            ['QR_Code', '=', $row['qrcode']],
        ]);
        if ($check1->count() == 0) {
         Reward::create([
                'Category' => $row['category'],
                'Product_Name' => $row['product_name'],
                'points' => $row['points'],
                'status' => 1,
                'QR_Code' => $row['qrcode'],
                'group'=> 'Group 5'
            ]);

        }
            // dd($row);
        return [];
    }
}

