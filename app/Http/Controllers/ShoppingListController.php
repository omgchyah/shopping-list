<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Item;

class ShoppingListController extends Controller
{
    public function showList(Request $request)
    {
        $user = $request->user();
        $shoppingList = $user->shoppingList->with('items')->first();

        return view('profile.shopping-list', [
            'user' => $user,
            'shoppingList' => $shoppingList
        ]);
        
    }

    public function editItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        return view('/profile.editList', [
            'item' => $item
        ]);

    }
    
    public function updateItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required', 'string', 'max:255',
            'quantity' => 'required', 'integer', 'min:1',
        ]);

        $item->update($validatedData);

        return redirect('/shopping-list');
    }
    
    public function deleteItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect('/shopping-list');
    }

    public function createItem(Request $request)
    {
        return view('/profile.createList');
    }
}
