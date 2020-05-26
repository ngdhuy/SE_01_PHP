<?php
    use model\Account;
    use bus\AccountBUS;

    class homeController extends Controller
    {
        function index()
        {
            $accBUS = new AccountBUS();
            $d["accounts"] = $accBUS->getAll();
            $this->set($d);
            $this->render("index");
        }
    }
?>