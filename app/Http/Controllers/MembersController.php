<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MembersRequest;
use App\Http\Controllers\BaseController as BaseController;
use App\Repository\Members\MembersInterface;
class MembersController extends BaseController
{
        protected MembersInterface $orderRepository;  

    public function __construct(MembersInterface $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        return view('module.members.index');
    }

    public function datatable(){
        $task = array();
        try {
            $task = $this->orderRepository->getAll();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Members Fetched Success');
    }

    public function store(MembersRequest $request){
        $task = array();
        try {
            $task = $this->orderRepository->store($request->all());
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Members Added success');
    }

    public function show($params){
        $task = array();
        try {
            $task = $this->orderRepository->getOne($params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Members Show Success'); 
    }

    public function update(MembersRequest $request, $params){
        $task = array();
        try {
            $task = $this->orderRepository->update($request->all(), $params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Members Updated success');
    }

     public function option(){
        $task = array();
        try {
            $task = $this->orderRepository->getOption();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Members fetched Success'); 
    }

    public function delete(Request $request, $params){
        $task = array();
        try {
            $task = $this->orderRepository->delete($request, $params);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(),400);
        }
        return $this->sendResponse($task,'Members Deleted success');
    }
}
