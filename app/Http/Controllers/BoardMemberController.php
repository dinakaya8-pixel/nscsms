<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoardMemberController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'parent_id' => ['nullable', 'exists:board_members,id'],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'group_label' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = 'storage/'.$request->file('photo')->store('board', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        BoardMember::create($validated);

        return back()->with('board_status', 'Board member added successfully.');
    }

    public function update(Request $request, BoardMember $boardMember): RedirectResponse
    {
        $validated = $request->validate([
            'parent_id' => ['nullable', 'exists:board_members,id', 'not_in:'.$boardMember->id],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'group_label' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            if ($boardMember->photo && str_starts_with($boardMember->photo, 'storage/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $boardMember->photo));
            }
            $validated['photo'] = 'storage/'.$request->file('photo')->store('board', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $boardMember->update($validated);

        return back()->with('board_status', 'Board member updated.');
    }

    public function destroy(BoardMember $boardMember): RedirectResponse
    {
        if ($boardMember->photo && str_starts_with($boardMember->photo, 'storage/')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $boardMember->photo));
        }

        $boardMember->delete();

        return back()->with('board_status', 'Board member removed.');
    }
}
