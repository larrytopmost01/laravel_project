<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
           
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
            <div class="card-header"> All Brand</div>
          <table class="table">
  <thead>    
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Brand_Name</th>
      <th scope="col">Brand_Image</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
    @foreach($brand as $brands)
      <th scope="row">{{ $brands->FirstItem()+$loop->index }}</th>
      <td>{{$brands->brand_name}}</td>
      <td><img src="{{$brands->brand_image}}" alt=""></img></td>
      <td>{{Carbon\Carbon::parse($brands->created_at)->diffForHumans()}}</td>
      <td><a href=""  class="btn btn-info"> Edit</a>
          <a href ="" class="btn btn-danger">Delete</a>
    </td>

    </tr>
    @endforeach 
  </tbody>
</table>
 {{ $brand->links()}}
            </div>
        </div>
        <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Brand</div> 
                    <div class="card-body">  
        <form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
            @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  
  @error('brand_name')
   <span class="text-danger">{{$message}}</span>
   @enderror
   </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
    <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>

  @error('brand_image')
   <span class="text-danger">{{$message}}</span>
   @enderror
   </div>
 
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>
</div>  
           </div>
          </div>
       
     </div>
     </div>
           
            </div>
        </div>

</div>
    </div>
</x-app-layout>
