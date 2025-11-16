<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContractRequest;
use App\Http\Resources\ContractResource;

class ContractController extends Controller
{
    public function index()
    {
        return ContractResource::collection(
            Contract::with('tenant', 'property')->get()
        );
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->validated());
        return new ContractResource($contract->load('tenant', 'property'));
    }

    public function show(Contract $contract)
    {
        return new ContractResource($contract->load('tenant', 'property'));
    }

    // Add update/destroy as needed (e.g., for admin or property owner)
}