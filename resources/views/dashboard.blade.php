<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.... <b>{{Auth::user()->name}} </b>
            <b style="float:right"> Total User
            <span class="badge badge-danger">{{ count( $users)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="container">
            <div class="row">

            <table class="table">
  <thead>

    
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">created_at</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @php($i = 1)
    @foreach($users as $user)
      <th scope="row">{{$i ++ }}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
    </tr>

    @endforeach
    
   
  </tbody>
</table>
            </div>
        </div>
           
            </div>
        </div>
    </div>
</x-app-layout>
