<?php

namespace App\Services;

use App\Repositories\BranchRepository;
use Illuminate\Support\Facades\Log;

class BranchService
{
    protected $branchRepository;

    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function getAllBranches()
    {
        try {
            return $this->branchRepository->all();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Error fetching branches');
        }
    }

    public function getBranchById($id)
    {
        try {
            return $this->branchRepository->find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Error fetching branch');
        }
    }

    public function createBranch(array $data)
    {
        try {
            return $this->branchRepository->create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Error creating branch');
        }
    }

    public function updateBranch($id, array $data)
    {
        try {
            return $this->branchRepository->update($id, $data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Error updating branch');
        }
    }

    public function deleteBranch($id)
    {
        try {
            $this->branchRepository->delete($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Error deleting branch');
        }
    }
}
