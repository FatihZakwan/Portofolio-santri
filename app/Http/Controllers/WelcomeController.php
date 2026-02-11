<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        // 1. Fitur Search (Mencari di Judul, Deskripsi, Kategori, Sub Kategori, dan Penulis)
        if ($request->has('q') && $request->q != '') {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%")
                  ->orWhere('sub_category', 'like', "%{$keyword}%")
                  ->orWhere('authors', 'like', "%{$keyword}%"); // Mencari text dalam JSON
            });
        }

        // 2. Pagination (12 Item per load)
        $projects = $query->latest()->paginate(12);

        // 3. Logika AJAX (Khusus tombol Load More)
        if ($request->ajax()) {
            // Render hanya potongan kartu project
            $view = view('partials.project-list', compact('projects'))->render();
            
            return response()->json([
                'html' => $view,
                'next_page' => $projects->nextPageUrl()
            ]);
        }

        // 4. Tampilan Awal (Full Page)
        return view('welcome', compact('projects'));
    }
}