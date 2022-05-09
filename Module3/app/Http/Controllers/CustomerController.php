<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers =Customer::paginate(5);
        return view ('customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->employeecode = $request->input('employeecode');
        $customer->staffgroup = $request->input('staffgroup');
        $customer->fullname = $request->input('fullname');
        $customer->gender = $request->input('gender');
        $customer->Dateofbirth = $request->input('Dateofbirth');
        $customer->phone = $request->input('phone');
        $customer->CMND = $request->input('CMND');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->save();

        session()->flash('success', 'Tạo mới nhân viên' . ' ' . $request->fullname . ' ' .  'thành công');
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
    
        return view('customer.edit', compact('customer',));
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
        $customer = new Customer();
        $customer->employeecode = $request->input('employeecode');
        $customer->staffgroup = $request->input('staffgroup');
        $customer->fullname = $request->input('fullname');
        $customer->gender = $request->input('gender');
        $customer->Dateofbirth = $request->input('Dateofbirth');
        $customer->phone = $request->input('phone');
        $customer->CMND = $request->input('CMND');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        
        $customer->save();

        session()->flash('success', 'Cập nhật nhân viên' . ' ' . $request->fullname . ' ' .  'thành công');

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        //dung session de dua ra thong bao
        session()->flash('success', 'Xóa' . ' ' . $request->fullname . ' ' .  'thành công');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('fullname', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return view('customer.list', compact('customers'));
    }
}
