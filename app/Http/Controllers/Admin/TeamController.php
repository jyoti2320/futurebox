<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function addTeam($id = null)
    {
        try {
            if ($id) {
                $team = Team::findOrFail($id);
            } else {
                $team = null;
            }
            return view('admin.team-add', compact('team'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load Team: ' . $e->getMessage());

            return redirect()->route('admin.team.list')->with('error', 'Team not found or something went wrong.');
        }
    }

    public function storeTeam(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'qualifications' => 'required|string',
            'location' => 'required|string',
            'content' => 'required|string',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'qualifications' => $request->qualifications,
            'email' => $request->email,
            'content' => $request->content,
            'location' => $request->location,
            'status' => $request->status,
        ];

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($id) {
                    $team = Team::find($id);
                    if ($team && !empty($team->image) && file_exists(public_path($team->image))) {
                        unlink(public_path($team->image));
                    }
                }

                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('teams'), $filename);

                $data['image'] = 'teams/' . $filename; // path for public access
            }

            if ($id) {
                $team = Team::find($id);
                if (!$team) {
                    Log::warning("Update failed: team with ID {$id} not found.");
                    return redirect()->back()->with('error', 'team not found.');
                }

                $team->update($data);
                Log::info("team updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.team.list')->with('success', 'team updated successfully');
            } else {
                $created = Team::create($data);
                Log::info("team created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.team.list')->with('success', 'team created successfully');
            }
        } catch (\Exception $e) {
            Log::error("team store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function teamList(Request $request)
    {
        try {
            $query = Team::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }
            $teamList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.team-list', compact('teamList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load team list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading teams.');
        }
    }


    public function deleteTeam($id)
    {
        $team = Team::find($id);

        if (!$team) {
            Log::warning("Delete failed: team with ID {$id} not found.");
            return redirect()->back()->with('error', 'team not found.');
        }
        $originalData = $team->status;
        $team->delete();

        Log::info("team marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'team marked as deleted successfully.');
    }
}
