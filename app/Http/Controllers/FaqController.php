<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // List all FAQs
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.pages.faqs.index', compact('faqs'));
    }

    
    // Show single FAQ
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.pages.faqs.show', compact('faq'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pages.faqs.create');
    }

    // Store new FAQ
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', 
            'status' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('admin-assets/images/admin-image/faqs/'), $imageName);
            $data['image'] = $imageName;
        }

        // Default status = 1 if not given
        $data['status'] = $request->has('status') ? $request->status : 1;

        Faq::create($data);

        return redirect()->route('faqs.index')->with('success', 'FAQ Added Successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.pages.faqs.edit', compact('faq'));
    }

    // Update FAQ
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // optional
            'status' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Update image if new one is uploaded
        if ($request->hasFile('image')) {
            if ($faq->image && file_exists(public_path('admin-assets/images/admin-image/faqs/' . $faq->image))) {
                unlink(public_path('admin-assets/images/admin-image/faqs/' . $faq->image));
            }

            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('admin-assets/images/admin-image/faqs/'), $imageName);
            $data['image'] = $imageName;
        }

        // Update status
        $data['status'] = $request->has('status') ? $request->status : $faq->status;

        $faq->update($data);

        return redirect()->route('faqs.index')->with('success', 'FAQ Updated Successfully!');
    }

    // Delete FAQ
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        if ($faq->image && file_exists(public_path('admin-assets/images/admin-image/faqs/' . $faq->image))) {
            unlink(public_path('admin-assets/images/admin-image/faqs/' . $faq->image));
        }

        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ Deleted Successfully!');
    }

    // Frontend Display (for website)
    public function showFaqs()
    {
        $faqs = Faq::where('status', 1)->latest()->get();
        return view('frontend.faqs', compact('faqs'));
    }
}
