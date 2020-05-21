<?php 
    class adminController extends Controller
    {
        function __construct()
        {
            $this->layout = "admin";    
        }

        function index()
        {   
            $d['adminName'] = "Mr Buoi";
            $this->set($d);
            $this->render("index");
        }

        function getValue($id)
        {
            $d["value"] = $id + 2;
            $this->set($d);
            $this->render("getValue");   
        }
    }
?>