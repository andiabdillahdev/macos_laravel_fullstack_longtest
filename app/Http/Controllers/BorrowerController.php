<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BorrowRequest;
use App\Http\Controllers\BaseController as BaseController;
use App\Repository\Borrower\BorrowerInterface;

class BorrowerController extends BaseController
{
    protected BorrowerInterface $orderRepository;  

    public function __construct(BorrowerInterface $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        return view('module.borrower.index');
    }

    public function datatable(){
        $task = array();
        try {
            $task = $this->orderRepository->getAll();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Borrower Fetched Success');
    }

    public function store(BorrowRequest $request){
        $task = array();
        try {
            $task = $this->orderRepository->store($request->all());
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Borrower Added success');
    }

    public function show($params){
        $task = array();
        try {
            $task = $this->orderRepository->getOne($params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Borrower Show Success'); 
    }

    public function update(BorrowRequest $request, $params){
        $task = array();
        try {
            $task = $this->orderRepository->update($request->all(), $params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Borrower Updated success');
    }

    public function delete(Request $request, $params){
        $task = array();
        try {
            $task = $this->orderRepository->delete($request, $params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Borrower Deleted success');
    }

}
