<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function addFeature($id = null)
    {
        try {
            if ($id) {
                $feature = Feature::findOrFail($id);
            } else {
                $feature = null;
            }
            return view('admin.feature-add', compact('feature'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load feature: ' . $e->getMessage());

            return redirect()->route('admin.feature.list')->with('error', 'feature not found or something went wrong.');
        }
    }

    public function storeFeature(Request $request, $id = null)
    {
        $request->validate([
            'icon_class' => 'required|string|max:255',
            'heading' => 'required|string',
            'short_desc' => 'required|string',
        ]);

        $data = [
            'icon_class' => $request->icon_class,
            'heading' => $request->heading,
            'short_desc' => $request->short_desc,
            'status' => $request->status,

        ];

        try {
            if ($id) {
                $feature = Feature::find($id);
                if (!$feature) {
                    Log::warning("Update failed: feature with ID {$id} not found.");
                    return redirect()->back()->with('error', 'feature not found.');
                }

                $feature->update($data);
                Log::info("feature updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.feature.list')->with('success', 'feature updated successfully');
            } else {
                $created = Feature::create($data);
                Log::info("feature created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.feature.list')->with('success', 'feature created successfully');
            }
        } catch (\Exception $e) {
            Log::error("feature store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function featureList(Request $request)
    {
        try {
            $query = Feature::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('heading', 'like', '%' . $search . '%');
            }
            $featureList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.feature-list', compact('featureList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load feature list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading features.');
        }
    }


    public function deleteFeature($id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            Log::warning("Delete failed: feature with ID {$id} not found.");
            return redirect()->back()->with('error', 'feature not found.');
        }
        $originalData = $feature->status;
        $feature->delete();

        Log::info("feature marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'feature marked as deleted successfully.');
    }
}
