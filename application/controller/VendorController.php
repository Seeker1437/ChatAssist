<?php
/**
 * Created by PhpStorm.
 * User: Darnell
 * Date: 4/15/2018
 * Time: 8:27 AM
 */

class VendorController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    public function index()
    {
        $this->View->render('vendoronboarding/index');
    }
}