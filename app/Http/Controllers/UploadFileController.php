<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RewardsImport;
use App\Models\Reward;
use Illuminate\Support\Facades\DB;



class UploadFileController extends Controller
{
    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx',
        ]);
        $file = $request->file('excel_file');

    //     $data = Excel::import($file)->get();

    // foreach ($data as $item) {
    //     Reward::create([
    //         'Category' => $item->category,
    //         'Product_Name' => $item->product_name,
    //         'points' => $item->points,
    //         'status' => 1,
    //         'QR_Code' => $item->qrcode,
    //         'group'=> 'Group 5'
    //         // ... add other columns
    //     ]);

    //     $check = Category::where([
    //         ['Category', '=', $item->category],
    //     ]);
    //     if ($check->count() > 0) {
    //     Category::create([
    //         'Category' => $item->category
    //         // ... add other columns
    //     ]);}
    // }








    // Reward([
    //     'Category' => $row['category'],
    //     'Product_Name' => $row['product_name'],
    //     'points' => $row['points'],
    //     'status' => 1,
    //     'QR_Code' => $row['qrcode'],
    //     'group'=> 'Group 5'
    // ]);
        // Process the uploaded Excel file using the import class
        Excel::import(new RewardsImport, $file);

        return redirect()->back()->with('message', 'Excel data imported and stored in the rewards table.');
    }
}

