<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                        @endif
                        <div class="card-header">
                            All Currencies
                        </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Currency</th>                                        
                                        <th scope="col">Modify</th>                                                         
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($currencies as $currency )                                         
                                      <tr>                       
                                        <td>{{$currency->id}}</td>
                                        <td>{{$currency->code}}</td>
                                        <td>{{$currency->currency}}</td>                                        
                                        <td>{{$currency->created_at}}</td>   
                                        <td><a href="{{url('currency/edit/'.$currency->id)}}" class="btn btn-success">Edit</a></td> 
                                        <td><a href="{{url('currency/delete/'.$currency->id)}}" class="btn btn-danger">Delete</a></td>                                   
                                      </tr>
                                      @endforeach
                                     
                                    </tbody>
                                  </table>
                            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                       <div class="card-header">
                           Create currency
                       </div>
                       <div class="card-body">
                        <form action="{{route('currency-store')}}" method="POST">
                            @csrf
                            <div class="form-group">                              
                              <input type="text" name="code" class="form-control" id="code" placeholder="Code">
                              @error('code')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror                                                          
                            </div>

                            <div class="form-group">                              
                                <input type="text" name="currency" class="form-control" id="currency" placeholder="Currency">
                                @error('currency')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror                                                          
                            </div>                    
                            
                           
                           
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                       </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>
