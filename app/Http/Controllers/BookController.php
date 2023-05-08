<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests\BooksRequest;
use App\Http\Controllers\BaseController as BaseController;
use App\Repository\Books\BooksInterface;
class BookController extends BaseController
{
    protected BooksInterface $orderRepository;  

    public function __construct(BooksInterface $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        return view('module.books.index');
    }

    public function datatable(){
        $task = array();
        try {
            $task = $this->orderRepository->getAll();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Books Fetched Success');
    }

    

}
