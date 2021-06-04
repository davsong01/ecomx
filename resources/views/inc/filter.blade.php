<div class="col-xl-3 col-lg-3 col-md-6">
    <div class="row">
        <div class="col-12">
                <div class="small-section-tittle2 mb-45">
                <h4>Filter by Categories</h4>

            </div>
        </div>
    </div>
    <!-- Job Category Listing start -->
    <div class="category-listing" style="margin-bottom: 10px;" >
        <a class="cat" style="color: black;" href="{{ route('dashboard') }}"> All Categories</a><br>
       @foreach($categories as $category)
       <a class="cat" style="color: black;" href="{{ route('category.filter', $category->slug) }}">{{ $category->title }} ({{ $category->products_count }})</a><br>
       @endforeach
    </div>
    <!-- Job Category Listing End -->
</div>