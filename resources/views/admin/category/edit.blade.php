<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category 
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="container">
            <div class="row">
        <div class="col-md-8">
                    <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">{{session('success')}}</h4>
                     </div>
     @endif
                        <div class="card-header"> Edit Category</div> 
                    <div class="card-body">  
        <form action="{{ url('update/category/'.$category->id)}}" method="POST">
            @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
    <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  $category->category_name}}">
    <div id="emailHelp" class="form-text"></div>
  </div>

  @error('category')
   <span class="text-danger">{{$message}}</span>
   @enderror
 
  <button type="submit" class="btn btn-primary">Update Category</button>
</form>
</div>  
           </div>
          </div>
       
     </div>
     </div>
           
            </div>
        </div>
    </div>
</x-app-layout>
