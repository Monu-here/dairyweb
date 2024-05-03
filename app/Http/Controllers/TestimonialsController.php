<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index',['testimonials'=>$testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'content' => 'required|string',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonial_images'), $imageName);
        } else {
            $imageName = null;
        }

        $testimonial=new Testimonial();
        $testimonial->name = $request->input('name');
        $testimonial->address = $request->input('address');
        $testimonial->image = $imageName;
        $testimonial->content = $request->input('content');

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit' ,['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonial_images'), $imageName);
        } else {
            $imageName = null;
        }

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->input('name');
        $testimonial->address = $request->input('address');
        $testimonial->image = $imageName;
        $testimonial->content = $request->input('content');

        $testimonial->save();

        return redirect()->route('admin.testimonials.edit',['testimonial' => $testimonial])->with('success', 'Testimonial Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index',['testimonial' => $testimonial])->with('success', 'Testimonial deleted successfully.');
    }
}
