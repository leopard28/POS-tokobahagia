<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\Supplier;
use App\Purchase;
use App\Purchase_Detail;
use App\Shipping;
use App\Product;
use Session;

class PurchaseController extends Controller
{
    public function index()
	{
		$data = Purchase::all();
    	return view('employees.purchase.purchase', compact('data'));
	}

	 public function create()
    {
        $data = Supplier::all();
        $data2 = Shipping::all();
        $data3 = Product::all();
        return view('employees.purchase.add_purchase_v2', compact('data', 'data2','data3'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        try{
            $this->validate($request, array(
                //Purchase
                'user_id'        => 'required',
                'supplier_id'    => 'required',
                'shipping_id'    => 'required',
                'purchase_no'    => 'required',
                'po_description' => 'required',
                'purchase_date'  => 'required',
                'promised_date'  => 'required',
                'shipping_date'  => 'required',
                'freight_charge' => 'required'

				// //Purchase Order Detail
                // 'product_id'     => 'required',
                // 'number'      => 'required',
                // 'quantity'       => 'required',
                // 'price_per_unit' => 'required',
                // 'discount'       => 'required',
                // 'price_total'    => 'required'
             ));

            
	        // Add Purchase  Table
	        $purchase = new Purchase(array(
                'user_id'        => $request->get('user_id'),
                'supplier_id'    => $request->get('supplier_id'),
                'shipping_id'    => $request->get('shipping_id'),
                'purchase_no'    => $request->get('purchase_no'),
                'po_description' => $request->get('po_description'),
                'purchase_date'  => $request->get('purchase_date'),
                'promised_date'  => $request->get('promised_date'),
                'shipping_date'  => $request->get('shipping_date'),
                'freight_charge' => $request->get('freight_charge')
	        ));

            if($purchase->save())
            {
                $lastPurchase = $purchase->id;
                //return "Success";
            }

            $number = $request->number;
            $product_id = $request->product_id;
            $quantity = $request->quantity;
            $price_per_unit = $request->price_per_unit;
            $discount = $request->discount;
            $price_total = $request->price_total;

            for($i=0; $i<count($number); $i++) {
                $PD = new Purchase_Detail();
                $PD->number = $number[$i];
                $PD->product_id = $product_id[$i];
                $PD->purchase_id = $lastPurchase;
                $PD->quantity = $quantity[$i];
                $PD->price_per_unit = $price_per_unit[$i];
                $PD->discount = $discount[$i];
                $PD->price_total = $price_total[$i];

                if($number[$i] == null){
                    //return "Success v2";
                    Session::flash('new', 'New Purchase V1 was successfully added!');
                    return redirect()->to('purchase');
                }

                else
                {
                    $PD->save();
                    
                }
            }
            Session::flash('new', 'New Purchase V2 was successfully added!');
            return redirect()->to('purchase');

            // return "Success";

        //     // Add Order Detail Table First
        //     $purchase_detail = new Purchase_Detail(array(
        //         'product_id'     => $request->get('product_id'),
        //         'number'      => $request->get('number'),
        //         'quantity'       => $request->get('quantity'),
        //         'price_per_unit' => $request->get('price_per_unit'),
        //         'discount'       => $request->get('discount'),
        //         'price_total'    => $request->get('price_total')
        //     ));
            
            

	       // if($purchase_detail->save()){
	       // 		Session::flash('new', 'New Purchase was successfully added!');
		      //   return redirect()->to('purchase');
	       // }
	            
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', ' Sorry something went worng. Please try again.');
        }
            
    }

    public function show($id)
    {

        // $model = DB::select("SELECT pro.product_name as pid, od.quantity_in as qin, od.quantity_out as qout, od.line_total as total, od.discount as dist, od.grand_total as grand, od.price_ref as price
        //     FROM order_details as od, orders as o, products as pro
        //     WHERE o.order_detail_id = '$id' and o.order_detail_id = od.id and pro.id = od.product_id");
        // return view('employees.order.detail_order', ['data' => $model]);
        $data = Purchase::find($id);
        $data2 = Purchase_Detail::find($id);
        return view('employees.purchase.detail_purchase', compact('data','data2'));
    }

    public function edit($id)
    {
        // $data = Customer::all();
        // $data2 = Shipping::all();
        // $data3 = Product::all();
        // return view('employees.order.edit_order', compact('data', 'data2','data3'));
    }

    public function update(Request $request, $id)
    {
        // try{
        //     $this->validate($request, array(
        //         'product_id'        => 'required',
        //         'quantity_in'       => 'required',
        //         'quantity_out'      => 'required',
        //         'line_total'        => 'required',
        //         'discount'          => 'required',
        //         'grand_total'       => 'required',
        //         'price_ref'         => 'required',
        //         ///
        //         'customer_id'       => 'required',
        //         'shipping_id'       => 'required',
        //         'order_detail_id'   => 'required',
        //         'order_no'          => 'required',
        //         'order_date'        => 'required',
        //         'po_number'         => 'required',
        //         'freight_charge'    => 'required',
        //         'sales_tax_rate_po' => 'required'
        //     ));
            
        //     if(Order::find($id)->update($request->all())){
        //         Session::flash('new', 'Product was successfully updated!');
        //         return redirect('order');
        //     }
        // } 
        // catch(\Exception $e){
        //     return redirect()->back()->with('error', ' Sorry something went worng. Please try again.');
        // } 

    }

    public function destroy($id)
    {
        // if(Order::find($id)->delete())
        // {
        //     Session::flash('delete', 'Order was successfully deleted!');
        //     return redirect('order');
        // }
    }

    public function detailPurchase($id)
    {

        $data = Purchase::find($id);
        $data2 = Purchase_Detail::find($id);
        return view('employees.purchase.detail_purchase_v2', compact('data','data2'));
    }

}
