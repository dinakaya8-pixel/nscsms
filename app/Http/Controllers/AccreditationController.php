<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'badge_number' => ['nullable', 'string', 'max:10'],
            'title'        => ['required', 'string', 'max:255'],
            'subtitle'     => ['nullable', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'theme'        => ['required', 'in:forest,gold,emerald,pine,amber'],
            'icon'         => ['required', 'in:award,book,chart,check,bulb'],
            'sort_order'   => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['badge_number'] = $validated['badge_number'] ?: '01';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Accreditation::create($validated);

        return back()->with('success', 'Accreditation / recognition card added.');
    }

    public function update(Request $request, Accreditation $accreditation): RedirectResponse
    {
        $validated = $request->validate([
            'badge_number' => ['nullable', 'string', 'max:10'],
            'title'        => ['required', 'string', 'max:255'],
            'subtitle'     => ['nullable', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'theme'        => ['required', 'in:forest,gold,emerald,pine,amber'],
            'icon'         => ['required', 'in:award,book,chart,check,bulb'],
            'sort_order'   => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['badge_number'] = $validated['badge_number'] ?: '01';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $accreditation->update($validated);

        return back()->with('success', 'Accreditation / recognition card updated.');
    }

    public function destroy(Accreditation $accreditation): RedirectResponse
    {
        $accreditation->delete();

        return back()->with('success', 'Accreditation / recognition card removed.');
    }
}