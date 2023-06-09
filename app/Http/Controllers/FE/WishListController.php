<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function showWishList()
    {
        try {
            $user_id = Auth::id();
            $wish_lists = WishList::selectRaw('wish_lists.*, products.*')
                ->join('products', 'wish_lists.product_id', 'like', 'products.product_id')
                ->where('wish_lists.user_id', $user_id)
                ->get();
            return response()->json($wish_lists);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addWishList(Request $request)
    {
        $user_id = Auth::id();
        $product_id = $request->pid;
        $wishExist = WishList::where('user_id', $user_id)->where('product_id', 'like', $product_id)->first();
        if ($wishExist){
            return response()->json($wishExist);
        }

        $wish_list = WishList::create([
            'user_id' => $user_id,
            'product_id' => $request->pid
        ]);

        return response()->json($wish_list);
    }

    public function destroy($wish_list_id = 0)
    {
        $wish_list = WishList::find($wish_list_id);
        $wish_list->delete();
        return response()->json($wish_list);
    }
}
