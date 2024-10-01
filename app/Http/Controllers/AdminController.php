<?php
namespace App\Http\Controllers;

use App\Http\Middleware\AdminCheck;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // Admin dashboard logic
    }
}
