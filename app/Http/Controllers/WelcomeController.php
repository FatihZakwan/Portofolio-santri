<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        // 1. Logika Pencarian (Search)
        if ($request->has('q') && $request->q != '') {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%")
                  ->orWhere('sub_category', 'like', "%{$keyword}%")
                  ->orWhere('authors', 'like', "%{$keyword}%");
            });
        }

        // 2. Pagination: Batasi 12 item per halaman
        $projects = $query->latest()->paginate(12);

        // 3. Logika AJAX (Dipanggil saat tombol "Tampilkan Lainnya" diklik)
        if ($request->ajax()) {
            $view = view('partials.project-list', compact('projects'))->render();
            return response()->json([
                'html' => $view,
                'next_page' => $projects->nextPageUrl()
            ]);
        }

        return view('welcome', compact('projects'));
    }
}