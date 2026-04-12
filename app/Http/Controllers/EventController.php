<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Tampilkan acara yang terdekat lebih dulu
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'status' => 'required|in:upcoming,completed',
            'description' => 'nullable|string'
        ]);

        Event::create($data);
        return redirect()->route('events.index')->with('success', 'Jadwal kegiatan berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'status' => 'required|in:upcoming,completed',
            'description' => 'nullable|string'
        ]);

        $event->update($data);
        return redirect()->route('events.index')->with('success', 'Jadwal kegiatan berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('success', 'Jadwal kegiatan berhasil dihapus!');
    }
}