<?php

namespace App\Controllers\Client;

use App\Controller;
use App\Models\Banner;
use App\Models\Product;

class HomeController extends Controller
{

    private Product $product;
    private Banner $banner;

    public function __construct()
    {
        $this->product = new Product();
        $this->banner = new Banner();
    }
    public function index()
    {
        $banner = $this->banner->findAll();



        $product = $this->product->findAll();

        return view(
            'client.home',
            compact('banner', 'product')
        );
    }


    public function productDetail($id)
    {
        $productDetail = $this->product->find($id);


        $heading1 = 'Trang chi tiết sản phẩm';
        $subHeading1 = '*********************';


        return view('client.productDetail', compact('productDetail', 'heading1', 'subHeading1'));
    }
}