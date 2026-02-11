<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Peta Kategori (Satu Sumber Kebenaran)
    private $categoriesMap = [
        'Programming' => ['Web Development', 'Mobile App', 'IoT System'],
        'DKV'         => ['Graphic Design', 'Logo & Branding', 'UI/UX Design', 'ilustrasi', '3D Design'],
        'Game'        => ['2D Game', '3D Game'],
        'Media'       => ['Literasi', 'Foto', 'Video']
    ];

    public function create()
    {
        return view('add-project.add-project');
    }

    public function store(Request $request)
    {
        // 1. Validasi (Input dari form namanya 'sub_category')
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'sub_category' => 'required|string', 
            'authors'      => 'required|array|min:1',
            'authors.*'    => 'string',
            'description'  => 'nullable|string',
            
            // PERUBAHAN DISINI: Ubah 2048 (2MB) menjadi 10240 (10MB)
            // Kalau mau lebih besar, misal 20MB ganti jadi 20480
            'thumbnail'    => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', 
            'gallery.*'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240'
        ], [
            'sub_category.required' => 'Wajib memilih kategori proyek.',
            'thumbnail.required' => 'Thumbnail wajib diupload.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 10MB.',
            'gallery.*.max' => 'Ukuran foto galeri maksimal 10MB per foto.',
        ]);

        // 2. Tentukan Main Category secara Otomatis
        $mainCategory = 'Lainnya';
        foreach ($this->categoriesMap as $main => $subs) {
            if (in_array($validated['sub_category'], $subs)) {
                $mainCategory = $main;
                break;
            }
        }

        // 3. Upload File
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('gallery', 'public');
            }
        }

        // 4. Simpan ke Database
        Project::create([
            'title'        => $validated['title'],
            'category'     => $mainCategory,           
            'sub_category' => $validated['sub_category'], 
            'authors'      => $validated['authors'],
            'description'  => $validated['description'],
            'thumbnail'    => $thumbnailPath,
            'gallery'      => $galleryPaths,
        ]);

        return redirect()->route('welcome')->with('success', 'Karya berhasil diupload!');
    }

    public function index(Request $request)
    {
        $mainCategory = $request->query('main', 'Programming');
        $filter = $request->query('cat'); 

        if (!array_key_exists($mainCategory, $this->categoriesMap)) {
            $mainCategory = 'Programming';
        }

        $subCategories = $this->categoriesMap[$mainCategory];

        $query = Project::query();
        $query->where('category', $mainCategory);

        if ($filter) {
            $query->where('sub_category', $filter);
        }

        $projects = $query->latest()->get();

        return view('category.index', [
            'projects' => $projects,
            'filter' => $filter,
            'activeMainCategory' => $mainCategory,
            'subCategories' => $subCategories
        ]);
    }
    
    // Method Show (Detail Project)
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $related = Project::where('category', $project->category)
                          ->where('id', '!=', $id)
                          ->latest()
                          ->take(6)
                          ->get();

        return view('project.project', [
            'project' => $project,
            'related' => $related
        ]);
    }
}