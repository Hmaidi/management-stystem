<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Order;
use App\Customer;
use App\OrderDetail;
use App\Product;
use App\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
class OrderDetailController extends Controller
{


    public function create()
    {
        $customers=Customer::all();
        $products=Product::all();
        $orders=Order::all()->last();

        return view('admin.order.create_Order', compact('customers','products','orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $inputs = $request->except('_token');
        $rules = [
            'customer_id' => 'required',
            'order_date' => 'required',
            'payment_status' => 'required',
            'vat' => 'required',
            'order_status' => 'required',
            'pay' => 'required',
            'due' => 'required',
            'addmore.*.name' => 'required',
            'addmore.*.qty' => 'required',
            'addmore.*.price' => 'required',
            'addmore.*.tva' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $total=0;
        $total_products=0;

        foreach ($request->addmore as $key => $value) {
            $subTotal[$key]=$value['qty']*$value['price'];
            $Total[$key]  =  $subTotal[$key];
            $total=$total+$Total[$key];
            $total_products=$total_products+1;

            $ProductStocks = new ProductStock();
            $ProductStocks->name = $value['name'];
            $ProductStocks->qty = $value['qty'];
            $ProductStocks->price =$value['price'];
            $ProductStocks->id_order =$request->input('OrderId');;
            $ProductStocks->id_product = $value['name'];

            $ProductStocks->save();

        }


        $orders = new Order();
        $orders->customer_id = $request->input('customer_id');
        $orders->order_date = $request->input('order_date');
        $orders->total_products =$total_products;

        $orders->payment_status = $request->input('payment_status');
        $orders->vat = $request->input('vat');
        $orders->total = $total;
        $orders->order_status = $request->input('order_status');
        $orders->pay = $request->input('pay');
        $orders->due = $request->input('due');

        $orders->save();

        Toastr::success('Projet enregistrée', 'Success!!!');
        return redirect()->route('admin.order.pending');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        return view('admin.projet.show', compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::find($id);
        return view('admin.projet.edit', compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'email' => 'required| email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'image',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));

        $projet = Projet::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('projet'))
            {
                Storage::disk('public')->makeDirectory('projet');
            }

            // delete old post photo
            if (Storage::disk('public')->exists('projet/'.$projet->photo))
            {
                Storage::disk('public')->delete('projet/'.$projet->photo);
            }

            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('projet/'.$imageName, $postImage);
        } else
        {
            $imageName = $projet->photo;
        }


        $projet->name = $request->input('name');
        $projet->email = $request->input('email');
        $projet->phone = $request->input('phone');
        $projet->address = $request->input('address');
        $projet->city = $request->input('city');
        $projet->experience = $request->input('experience');
        $projet->nid_no = $request->input('nid_no');
        $projet->salary = $request->input('salary');
        $projet->vacation = $request->input('vacation');
        $projet->experience = $request->input('experience');
        $projet->photo = $imageName;
        $projet->save();

        Toastr::success('Projet mise a jour', 'Success!!!');
        return redirect()->route('admin.projet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet = Projet::find($id);

        if (Storage::disk('public')->exists('projet/'.$projet->photo))
        {
            Storage::disk('public')->delete('projet/'.$projet->photo);
        }
        $projet->delete(); // delete post from post table

        Toastr::success('Projet supprimé', 'Success');
        return redirect()->back();
    }
}
