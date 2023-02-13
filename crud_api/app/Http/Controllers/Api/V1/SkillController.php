<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillResource;
class SkillController extends Controller
{
    public function index()
    {
        return  SkillResource::collection(Skill::all());
    }

    public function store(StoreSkillRequest $request)
    {   
     
        Skill::create($request->validated());
        return response()->json('skill created');
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function update(StoreSkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        
        return response()->json("Skill Updated");
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json("Skill Deleted");
    }
}
