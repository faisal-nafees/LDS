<?php

namespace App\Http\Controllers;

use App\Models\DrawerOrder;
use Illuminate\Http\Request;
use App\Models\DrawerProduct;
use App\Models\SelectOption;
use App\Models\DrawerWishlist as Wishlist;

class HomeController extends Controller
{

    function index()
    {
        $products  = DrawerProduct::all();
        $bracket  = SelectOption::where('for', 0)->get();
        $frontNotch  = SelectOption::where('for', 1)->get();
        $backNotch  = SelectOption::where('for', 2)->get();
        $bottomThickness  = SelectOption::where('for', 3)->get();

        return view('index', compact('products', 'bracket', 'frontNotch', 'backNotch', 'bottomThickness'));
    }


    public function dashboard()
    {
        $drawerOrder = DrawerOrder::paginate(5);
        $selectOptions = SelectOption::all();
        return view('admin.dashboard', compact('drawerOrder', 'selectOptions'));
    }

    public function addNewItem(Request $request)
    {
        $products  = DrawerProduct::all();
        $id = $request->id;
        $id++;

        return view('renderablefiles.additem', compact('products', 'id'))->render();
    }

    public function getProductImage(Request $request)
    {
        $product = DrawerProduct::where('id',  $request->id)->first();

        $data = [
            'html' => view('renderablefiles.productimage', compact('product'))->render(),
            'type' => $product->type
        ];
        return $data;
    }

    public function changeUnit(Request $request)
    {
        session(['unit' => $request->unit]);
        return;
    }

    public function selectOptions(Request $request)
    {
        $request->validate([
            'option' => ['required'],
            'price' => ['required'],
            'for' => ['required']
        ]);

        $option = new SelectOption();
        $option->option = $request->option;
        $option->price = $request->price;
        $option->for = $request->for;


        try {
            $option->save();
            return back()->withSuccess('New Option is added Successfully!');
        } catch (\Exception $th) {
            return back()->withErrors('Something Went Wrong! PLease Try Again!');
        }
    }

    public function selectOptionDestroy(Request $request, $id)
    {
        $option = SelectOption::findOrFail($id);

        try {
            $option->delete();
            return back()->withSuccess('Option is removed Successfully!');
        } catch (\Exception $th) {
            return back()->withErrors('Something Went Wrong! PLease Try Again!');
        }
    }

    public function ajaxFormValidation(Request $request)
    {

        $errors = [];

        if (empty($request->unit) || is_null($request->unit)) {
            $errors[]  = 'Please select unit';
        }


        if (empty($request->bottom_thickness_grain_direction) || is_null($request->bottom_thickness_grain_direction)) {
            $errors[]  = 'Please select bottom thickness grain direction';
        }

        if (empty($request->back_notch_drill_undermount_slide) || is_null($request->back_notch_drill_undermount_slide)) {

            $errors[]  = 'Please select back notch drill undermount slide';
        }

        if (empty($request->front_notch_undermount_slide) || is_null($request->front_notch_undermount_slide)) {
            $errors[]  = 'Please select front notch undermount slide';
        }

        if (empty($request->bracket) || is_null($request->bracket)) {
            $errors[]  = 'Please select Bracket';
        }

        if (empty($request['product']) || is_null($request['product'])) {
            $errors[]  = 'Please select Items';
        } else {

            foreach ($request['product'] as $key => $value) {

                $product_type = DrawerProduct::where('id', $request['product'][$key])->pluck('type')->first();
                $item = $request['id'][$key];

                if (empty($request['product'][$key])) {
                    $errors[]  =  'Product Field Cannot be empty in Item ' . $item;
                }

                if ($product_type == 1) {
                    if (empty($request['note'][$key])) {
                        $errors[]  = 'Note Field Cannot be empty in Item ' . $item;
                    }

                    if (empty($request['design'][$key])) {
                        $errors[]  = 'Design Field Cannot be empty in Item ' . $item;
                    }
                } else {
                    if (empty($request['width'][$key])) {
                        $errors[] = 'Width Field Cannot be empty in Item ' . $item;
                    }
                    if (empty($request['height'][$key])) {
                        $errors[] = 'Height Field Cannot be empty in Item ' . $item;
                    }
                    if (empty($request['depth'][$key])) {
                        $errors[] = 'Depth Field Cannot be empty in Item ' . $item;
                    }
                }
            }
        }


        if (count($errors) > 0) {
            return response()->json([
                'success' => false,
                'errors' => $errors
            ]);
        }


        return response()->json([
            'success' => true,
        ]);;
    }

    public function ajaxValidateWishlistName(Request $request)
    {
        session(['additional_note' => $request->additional_note]);
        if ($request->cart == 1) {
            $data = ['basicDetail' => session('basicDetail'), 'items' => session('items'), 'additionalNote' => session('additional_note')];
            Wishlist::create([
                'user_id' => $request->id,
                'name' => $request->name,
                'data' => $data
            ]);

            session()->forget('basicDetail');
            session()->forget('items');
            session()->forget('billingDetails');

            return response()->json([
                'success' => true
            ]);
        }


        $name = Wishlist::where('name', 'LIKE', '%' . $request->name . '%')->where('user_id', $request->id)->latest('id')->pluck('name')->first();
        if (!is_null($name)) {
            preg_match('#\((.*?)\)#', $name, $val);

            $number = intval($val[1] ?? 0) + 1;

            return response()->json(
                [
                    'success' => true,
                    'number' => $number
                ]
            );
        }
        return response()->json(
            [
                'success' => false,
            ]
        );
    }

    public function downloadPdf($orderId, $type)
    {
        $name = $orderId . '.pdf';
        $pathToFile = public_path() . '/pdf/' . $type . '/' . $name;
        $headers =  array(
            'Content-Type: application/pdf',
        );

        return response()->download($pathToFile, $name, $headers);
    }
}
