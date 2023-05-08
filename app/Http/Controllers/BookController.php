<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BooksRequest;
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

    public function store(BooksRequest $request){
        $task = array();
        try {
            $task = $this->orderRepository->store($request->all());
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Books Added success');
    }

    public function show($params){
        $task = array();
        try {
            $task = $this->orderRepository->getOne($params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Books Show Success'); 
    }

    public function update(BooksRequest $request, $params){
        $task = array();
        try {
            $task = $this->orderRepository->update($request->all(), $params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Books Updated success');
    }

    public function delete(Request $request, $params){
        $task = array();
        try {
            $task = $this->orderRepository->delete($request, $params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Books Deleted success');
    }

}
