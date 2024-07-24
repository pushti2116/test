<?php

namespace App\Http\Controllers;

use App\Services\BranchService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function index()
    {
        $branches = $this->branchService->getAllBranches();
        return response()->json(['message' => 'Branch listed successfully', 'data' => $branchs]);
    }

    public function show($id)
    {
        $branch = $this->branchService->getBranchById($id);
        return response()->json(['message' => 'Branch show successfully', 'data' => $branch]);
    }

    public function store(Request $request)
    {
        $data = $request->only(['branch_name', 'address', 'latitude', 'longitude']);
        $branch = $this->branchService->createBranch($data);
        return response()->json(['message' => 'Branch saved successfully', 'data' => $branch]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['branch_name', 'address', 'latitude', 'longitude']);
        $branch = $this->branchService->updateBranch($id, $data);
        return response()->json(['message' => 'Branch deleted successfully', 'data' => $branch]);
    }

    public function destroy($id)
    {
        $this->branchService->deleteBranch($id);
        return response()->json(['message' => 'Branch deleted successfully', 'data' => []]);
    }
}

