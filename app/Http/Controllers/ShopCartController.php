<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use App\Http\Requests\StoreShopCartRequest;
use App\Http\Requests\UpdateShopCartRequest;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreShopCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShopCart $shopCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopCart $shopCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopCartRequest  $request
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopCartRequest $request, ShopCart $shopCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopCart $shopCart)
    {
        //
    }
}
