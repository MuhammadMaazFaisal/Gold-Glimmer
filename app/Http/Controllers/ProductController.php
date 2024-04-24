<?php

namespace App\Http\Controllers;

use App\Models\AdditionalStep;
use App\Models\FinishedProduct;
use App\Models\InventoryItem;
use App\Models\PolisherStep;
use App\Models\PolishingType;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ReturnedItem;
use App\Models\ReturnedStoneStep;
use App\Models\Stock;
use App\Models\StockDetail;
use App\Models\Stone;
use App\Models\StoneSetterStep;
use App\Models\Vendor;
use App\Models\VendorType;
use App\Models\Zircon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $manufacturers = Vendor::where('type', VendorType::where('name', 'Manufacturing')->first()->id)->get();
        $polishers= Vendor::where('type', VendorType::where('name', 'Polishing')->first()->id)->get();
        $stoneSetters = Vendor::where('type', VendorType::where('name', 'Stone Setting')->first()->id)->get();
        $vendors = Vendor::where('type', VendorType::where('name', 'Additional Vendor')->first()->id)->where('name', '!=', 'existing')->get();
        
        $products = Product::where('status', 0)->with('vendor')->get();
        return view('admin.product.index', compact('manufacturers', 'polishers', 'stoneSetters', 'vendors', 'products'));
    }

    public function completeProduct($id)
    {
        $product = Product::where('id', $id)->with('vendor', 'productType')->first();
        return view('admin.product.complete', compact('product'));
    }

    public function edit($id)
    {
        $manufacturers = Vendor::where('type', VendorType::where('name', 'Manufacturing')->first()->id)->get();
        $polishers= Vendor::where('type', VendorType::where('name', 'Polishing')->first()->id)->get();
        $stoneSetters = Vendor::where('type', VendorType::where('name', 'Stone Setting')->first()->id)->get();
        $vendors = Vendor::where('type', VendorType::where('name', 'Additional Vendor')->first()->id)->where('name', '!=', 'existing')->get();
        $products = Product::where('status', 0)->with('vendor')->get();
        $product = Product::where('id', $id)->with('vendor', 'productType')->first();
        $polisherStep = PolisherStep::where('product_id', $id)->with( 'polishingType')->first();
        $stoneSetterSteps = StoneSetterStep::where('product_id', $id)->with('vendor', 'zircons', 'stones')->get();
        $returnedStoneSteps = ReturnedStoneStep::where('product_id', $id)->with('vendor', 'returnedItems')->get();
        $additionalSteps = AdditionalStep::where('product_id', $id)->with('vendor')->get();
        $stockItems = StockDetail::all();

        return view('admin.product.edit', compact('manufacturers', 'polishers', 'stoneSetters', 'vendors', 'products', 'product', 'polisherStep', 'stoneSetterSteps', 'stockItems', 'returnedStoneSteps', 'additionalSteps'));
    }

    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->barcode); $i++) {
            $product= new FinishedProduct();
            $product->barcode = $request->barcode[$i];
            $product->weight = $request->weight[$i];
            $product->price = $request->price[$i];
            $product->category = $request->category[$i];
            $product->description = $request->description[$i];
            if (isset($request->image) && $request->image != null) {
                $image = $request->image;
                $imageName = time() . uniqid() . '.' . $image->extension();
                $image->move(public_path('images/products'), $imageName);
                $product->image = $imageName;
            }
            $product->status = 0;
            $product->save();
        }

        return response()->json($notification);
    }

    public function storeStepOne(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        if (!$product) {
            $product = new Product();
            $product->id = $request->product_id;
        }
        $product->vendor_id = $request->vendor_id;
        $product->date = $request->date;
        $product->details = $request->details;
        $product->product_type = ProductType::where('name', $request->type)->first()->id;
        $product->quantity = $request->quantity;
        $vendor = Vendor::where('id', $request->vendor)->first();
        $product->purity = $request->purity;
        $product->rate =  $request->rate;
        $product->purity_text = $request->purity_text;
        $product->unpolished_weight = $request->unpolish_weight;
        $product->dimension = $request->dimension;
        $product->wastage = $request->wastage;
        $product->total = $request->tValues;
        if (isset($request->image) && $request->image != null) {
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
        $product->save();

        $notification = array(
            'message' => 'Record saved successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function storeStepTwo(Request $request)
    {
        // dd($request->all());
        $product = Product::where('id', $request->product_id)->first();
        $polisherStep = PolisherStep::where('product_id', $product->id)->first();
        if (!$polisherStep) {
            $polisherStep = new PolisherStep();
            $polisherStep->product_id = $product->id;
        }
        // check if polishing type exists
        $polishingType = PolishingType::where('name', $request->polish_type)->first();
        if (!$polishingType) {
            $polishingType = new PolishingType();
            $polishingType->name = $request->polish_type;
            $polishingType->save();
        }
        $polisherStep->polishing_type = $polishingType->id;
        $polisherStep->vendor_id = $request->vendor_id;
        $polisherStep->date = $request->date;
        $polisherStep->details = $request->details;
        $polisherStep->difference = $request->difference;
        $polisherStep->rate = $request->p_rate;
        $polisherStep->wastage = $request->wastage;
        $polisherStep->payable = $request->payable;
        $polisherStep->polish_weight = $request->polish_weight;
        if (isset($request->image) && $request->image != null) {
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
            $polisherStep->image = $imageName;
        }
        $polisherStep->save();

        $notification = array(
            'message' => 'Record saved successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function storeStepThree(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $stoneSetterStep = StoneSetterStep::where('product_id', $product->id)->where('vendor_id', $request->vendor[0])->first();
        if (!$stoneSetterStep) {
            $stoneSetterStep = new StoneSetterStep();
            $stoneSetterStep->product_id = $product->id;
        }
        $stoneSetterStep->vendor_id = $request->vendor[0];
        $stoneSetterStep->date = $request->date[0];
        $stoneSetterStep->detail = $request->detail[0];
        $stoneSetterStep->retained_weight = $request->retained_weight[0];
        $stoneSetterStep->total_weight = $request->s_total_weight[0];
        $stoneSetterStep->Issued_weight = $request->Issued_weight[0];
        $stoneSetterStep->z_total_weight = $request->zircon_total_weight[0];
        $stoneSetterStep->z_total_quantity = $request->zircon_total_quantity[0];
        $stoneSetterStep->s_total_weight = $request->stone_total_weight[0];
        $stoneSetterStep->s_total_quantity = $request->stone_total_quantity[0];
        $stoneSetterStep->grand_weight = $request->grand_total_weight[0];
        if (isset($request->image) && $request->image != null) {
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
            $stoneSetterStep->image = $imageName;
        }
        $stoneSetterStep->save();

        // delete all zircons and stones
        Zircon::where('stone_setter_step_id', $stoneSetterStep->id)->delete();
        Stone::where('stone_setter_step_id', $stoneSetterStep->id)->delete();
        for ($i = 0; $i < count($request->zircon_code); $i++) {
            $item= new Zircon();
            $item->stone_setter_step_id = $stoneSetterStep->id;
            $item->weight = $request->zircon_weight[$i];
            $item->quantity = $request->zircon_quantity[$i];
            $item->item_id = StockDetail::where('barcode', $request->zircon_code[$i])->first()->item_id;
            $item->save();
        }

        for ($i = 0; $i < count($request->stone_code); $i++) {
            $item= new Stone();
            $item->stone_setter_step_id = $stoneSetterStep->id;
            $item->weight = $request->stone_weight[$i];
            $item->quantity = $request->stone_quantity[$i];
            $item->item_id = StockDetail::where('barcode', $request->stone_code[$i])->first()->item_id;
            $item->save();
        }

        $notification = array(
            'message' => 'Record saved successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function storeReturnedStepThree(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $stoneSetterStep = ReturnedStoneStep::where('product_id', $product->id)->where('vendor_id', $request->vendor_id)->first();
        if (!$stoneSetterStep) {
            $stoneSetterStep = new ReturnedStoneStep();
            $stoneSetterStep->product_id = $product->id;
        }
        
        $stoneSetterStep->vendor_id = $request->vendor_id;
        $stoneSetterStep->received_weight = $request->received_weight;
        $stoneSetterStep->stone_weight = $request->r_stone_weight;
        $stoneSetterStep->stone_quantity = $request->r_stone_quantity;
        $stoneSetterStep->total_weight = $request->r_total_weight;
        $stoneSetterStep->rate = $request->r_rate;
        $stoneSetterStep->shruded_quantity = $request->sh_qty;
        $stoneSetterStep->wastage = $request->r_wastage;
        $stoneSetterStep->grand_weight = $request->r_grand_weight;
        $stoneSetterStep->payable = $request->r_payable;
        $stoneSetterStep->save();

        // delete all returned items
        ReturnedItem::where('returned_stone_step_id', $stoneSetterStep->id)->delete();
        for ($i = 0; $i < count($request->r_code); $i++) {
            $item= new ReturnedItem();
            $item->code = $request->r_code[$i];
            $item->returned_stone_step_id = $stoneSetterStep->id;
            $item->weight = $request->r_weight[$i];
            $item->quantity = $request->r_quantity[$i];
            $item->save();
        }

        $notification = array(
            'message' => 'Record saved successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function storeStepFour(Request $request)
    {
        // dd($request->all());
        $product = Product::where('id', $request->product_id)->first();
        AdditionalStep::where('product_id', $product->id)->delete();
        for ($i = 0; $i < count($request->vendor_id); $i++) {
            $additionalStep = AdditionalStep::where('product_id', $product->id)->where('vendor_id', $request->vendor_id[$i])->first();
            if (!$additionalStep) {
                $additionalStep = new AdditionalStep();
                $additionalStep->product_id = $product->id;
            }
            $additionalStep->vendor_id = $request->vendor_id[$i];
            $additionalStep->type = $request->type[$i];
            $additionalStep->amount = $request->amount[$i];
            $additionalStep->date = $request->date[$i];
            $additionalStep->save();
        }

        $notification = array(
            'message' => 'Record saved successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function getManufacturerPurity(Request $request)
    {
        $vendor = Vendor::where('id', $request->id)->first();
        return response()->json($vendor);
    }

    public function getPolisherRate(Request $request)
    {
        $vendor = Vendor::where('id', $request->id)->first();
        return response()->json($vendor);
    }

    public function getStoneSetterRate(Request $request)
    {
        $vendor = Vendor::where('id', $request->id)->first();
        return response()->json($vendor);
    }

    public function getStockItems(Request $request)
    {
        $stockItems = StockDetail::all();
        return response()->json($stockItems);
    }

    public function getStockItemDetail(Request $request)
    {
        $stockItem = StockDetail::where('barcode', $request->barcode)->first();
        return response()->json($stockItem);
    }
}
