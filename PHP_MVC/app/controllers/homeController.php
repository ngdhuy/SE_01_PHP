<?php
    class homeController extends Controller
    {
        function index()
        {
            $this->render("index");
        }

        function show()
        {
            $d['data'] = "Test page";
            $this->set($d);
            $this->render("show");
        }
    }
?>