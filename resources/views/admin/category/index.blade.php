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
            <div class="card-header"> All Category</div>
          <table class="table">
  <thead>    
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Category_Name</th>
      <th scope="col">User_ID</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
    @foreach($categories as $cat)
      <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
      <td>{{$cat->category_name}}</td>
      <td>{{$cat->user->name}}</td>
      <td>{{Carbon\Carbon::parse($cat->created_at)->diffForHumans()}}</td>
      <td><a href="{{ url( 'category/edit/'.$cat->id)}}"  class="btn btn-info"> Edit</a>
          <a href ="{{ url('softdelete/category/'.$cat->id)}}" class="btn btn-danger">Delete</a>
    </td>

    </tr>
    @endforeach 
  </tbody>
</table>

 {{ $categories->links()}}
            </div>
        </div>
        <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Category</div> 
                    <div class="card-body">  
        <form action="{{ route('store.category')}}" method="POST">
            @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>

  @error('category')
   <span class="text-danger">{{$message}}</span>
   @enderror
 
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>  
           </div>
          </div>
       
     </div>
     </div>
           
            </div>
        </div>



<!-- Trashed part -->


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
    <div class="card-header"> All Category</div>
  <table class="table">
<thead>    
<tr>
<th scope="col">S/N</th>
<th scope="col">Category_Name</th>
<th scope="col">User_ID</th>
<th scope="col">created_at</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<tr>

@foreach($trashcat as $cat)
<th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
<td>{{$cat->category_name}}</td>
<td>{{$cat->user->name}}</td>
<td>{{Carbon\Carbon::parse($cat->created_at)->diffForHumans()}}</td>
<td><a href="{{ url( 'category/restore/'.$cat->id)}}"  class="btn btn-info"> Restore</a>
  <a href ="{{url('category/pdelete/'.$cat->id)}}" class="btn btn-danger">P Delete</a>
</td>

</tr>
@endforeach 
</tbody>
</table>

{{ $trashcat->links()}}

</div>
</div>

</div>
</div>
   
    </div>
</div>
    </div>
</x-app-layout>
