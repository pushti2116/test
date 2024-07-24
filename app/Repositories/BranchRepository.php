<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Support\Facades\Cache;

class BranchRepository
{
    public function all()
    {
        return Cache::remember('branches.all', 60, function () {
            return Branch::all();
        });
    }

    public function find($id)
    {
        return Cache::remember("branches.{$id}", 60, function () use ($id) {
            return Branch::findOrFail($id);
        });
    }

    public function create(array $data)
    {
        return Branch::create($data);
    }

    public function update($id, array $data)
    {
        $branch = Branch::findOrFail($id);
        $branch->update($data);
        return $branch;
    }

    public function delete($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
    }
}
