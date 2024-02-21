<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\showQRCodeTable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QrCodeController extends Controller
{


public function delete($id){

    DB::delete('delete from product__q_r__code where Sno = ?', [$id]);

return redirect()->back()->with('message', 'Delete Successfully!');

}


public function deleteGroup(Request $req){

    //   $result=  DB::update('delete from product__q_r__code   where `group` = ? and Category,$req->category,[$req->id]);

    $result= DB::table('product__q_r__code')  // Specify the table name
    ->where('group', '=', $req->id)
    ->where('Category', '=',$req->category)  // Add conditions to match specific rows
    ->delete();


    if($result){
        return redirect()->back()->with('message', "Group Delete Successfully!");
        }else{
            return redirect()->back()->with('message', "Failed!");

        }



        // return $req->all();
}





public function updateAllPoints(Request $req){



    $req->validate([
        "Points"=> "required|numeric",
    ]);


    // $check = DB::select('select Category from _product_category where `id`=?',[$req->category]);

    // $cate=$check[0];
    // $category=$cate->Category;



    // if($type=='update'){
    //     // $data = Category::find($id);


// $cate=$req->category;
    //   $result=  DB::update('update product__q_r__code set `Points` = '.$req->Points.'  where `group` = ? ',[$req->id]);

     $result= DB::table('product__q_r__code')  // Specify the table name
      ->where('group', $req->id)
      ->where('Category',$req->category)
      ->where('status','=',1)// Add conditions to match specific rows
      ->update([
          'Points' => $req->Points,  // Set new values for each column
          // Add more columns and their new values as needed
      ]);





      if($result){
    return redirect()->back()->with('message', "Group Points Successfully!");
    }else{
        return redirect()->back()->with('message', "Failed!");

    }

    // return $req->all();
    // return $cate->Category;
    }







public function updateGroup(Request $req){

// print_r($req->all());
// if($type=='update'){
//     // $data = Category::find($id);


DB::update('update product__q_r__code set `group` = "'.$req->group.'"  where `group` = ?' ,[$req->id]);

return redirect()->back()->with('message', 'Group Update Successfully!');
// }

// return $req->all();

}




public function updatePoints(Request $req,$id){

    $req->validate([
        "Points"=> "required|numeric",
    ]);

    DB::update('update product__q_r__code set points = '.$req->Points. '  where Sno = ?' ,[$id]);


//     $data = showQRCodeTable::find($id);
// $data->Points=$req->Points;
// $data->save();
return redirect()->back()->with('message', 'Points Update Successfully!');

    // print_r($data);

}



    public function addCategory(Request $req)
    {

        $req->validate(['Category' => 'required']);


        $check = Category::where([
            ['Category', '=', $req->Category],
        ]);
        if ($check->count() > 0) {
            return redirect()->back()->with('message', 'Category Already Added');


        }



        $addCategory = new Category;
        $addCategory->Category = $req->Category;
        $addCategory->save();

        return redirect()->back()->with('message', 'Category Add Successfully');

    }

    public function showCategory()
    {

        // $req->validate(['Category'=>'required']);

        return redirect()->back()->with('message', 'Category Add Successfully');

    }



    public function qrCode()
    {

        $showCategory = Category::all();

        $data = compact('showCategory');



        return view('super-admin/Dashboard/Qr-Code/qrcode')->with($data);
    }

    public function qrCodeView($id)
    {

        // $data = Category::find($id);
        // $Category = $data->Category;



        $result = DB::select('select * from product__q_r__code where `Category` = ?', [$id]);




        $rs=DB::select('select DISTINCT `group` from product__q_r__code where `Category` = ?', [$id]);


        $data3=compact('rs');

$id2=$id;


        // $data2=showQRCodeTable::find($Category);
$data2=compact('result');

// $post = Post::findOrFail($id);

$id1=compact('id2');
        // $data2 =$result->toArray();


        // print_r($data2);



        return view('super-admin/Dashboard/Qr-Code/qr-code-view')->with($data2)->with($data3)->with($id1);
    }

    public function qr_Code()
    {
        return view('super-admin/Dashboard/Qr-Code/qr-code');
    }
}
