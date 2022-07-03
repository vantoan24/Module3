<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function __construct(){
        $this->user = auth('api')->user();
    }


    public function index(Request $request)
    {
        $query = Customer::query(true);
        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
            $query->orwhere('phone', 'LIKE', '%' . $request->name . '%');
        }

        //chỉ xem được khách hàng do mình thêm vào
        $query->where('user_id',$this->user->id);

        $items = $query->paginate(5);
        return response()->json($items, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name     = $request->name;
        $customer->address  = $request->address;
        $customer->phone    = $request->phone;
        $customer->note     = $request->note;
        $customer->user_id  = $this->user->id;
        
        try {
            $customer->save();
            return response()->json([
                'message' => 'Thêm khách hàng thành công',
                'customer' => $customer
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Thêm khách hàng không thành công'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Customer::find($id);
        return response()->json($item, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Customer::where('phone',$id)->first();
        return response()->json($item, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        try {
            $customer->delete();
            return response()->json([
                'message' => 'Xóa thành công !'
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Xóa không thành công !'
            ], 403);
            
        }    
    }
}
