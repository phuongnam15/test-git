<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TestMergeController extends Controller
{
    //
    public function merge(){
        return "merge";
    }
    public function phuong(){
        return "phuong";
    }
    public function messi(){
        return "messi";
    }
}
