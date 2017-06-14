<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller {

    //

    function index() { 

        
        $title = 'Titulo de teste';
        
        $xss = '<script>alert("ATAQUE XSS");</script>';
        
        $var1 = '123';
        
        $arrayData = [1,23,456,89];
        
        return view('site.home.index',compact('title','xss','var1','arrayData'));
    }

    function contato() {

        return view('site.contact.index');
    }
    
    
    function categoria($id) {

        return "categoria ". $id;
    }
    
}