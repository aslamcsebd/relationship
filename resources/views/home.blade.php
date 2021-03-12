@extends('layouts.app')

@section('content')
   <div class="container my-4">

      {{-- <div class="d-flex align-items-start row mt-4">
         <div class="nav flex-column col-auto nav-pills bg-light p-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @php
               $RelationNames = App\All_Relation::all();
            @endphp
            @foreach($RelationNames as $RelationName)
               <button class="av-link btn btn-outline-primary p-1 m-1 @if($loop->index==0) active @endif" data-bs-toggle="pill" data-bs-target="#v-pills-{{$RelationName->id}}">
               {{$RelationName->Name}}
               </button>
            @endforeach

         </div>
         <div class="tab-content col" id="v-pills-tabContent">
          
            @foreach($RelationNames as $RelationName)
               <div class="tab-pane fade show @if($loop->index==0) active @endif" id="v-pills-{{$RelationName->id}}">
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <button class="nav-link @if($loop->index==0) active @endif" data-bs-toggle="tab" data-bs-target="#nav-{{$RelationName->id}}_code">Code</button>
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-{{$RelationName->id}}_output">Output</button>
                  </div>

                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active resp-tab-content" id="nav-{{$RelationName->id}}_code" role="tabpanel" aria-labelledby="nav-{{$RelationName->id}}_code-tab">   
                       {!! $RelationName->Code !!}
                     </div>
                     <div class="tab-pane fade" id="nav-{{$RelationName->id}}_output" role="tabpanel" aria-labelledby="nav-{{$RelationName->id}}_output-tab">
                      {!! $RelationName->Output !!}
                     </div>                   
                  </div>
               </div>
            @endforeach

         </div>
      </div> --}}

      {{-- One to One --}}
         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header info">One To one [User -> Address, Phone]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>id</th>
                                 <th>Step</th>
                                 <th>Code</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $all_data = App\One_to_one::all();
                              @endphp
                              @foreach($all_data as $data)
                                 <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->Step}}</td>
                                    <td> <pre>{{ $data->Code}}</pre></td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header success">One To one [User -> address/Phone]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead lass="bg-dark">
                              <tr class="text-center">
                                 <th>id</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th class="bg-info">Address</th>
                                 <th class="bg-info">Phone</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 // $Users = App\User::all();
                                 $Users = App\User::all();

                              @endphp
                              @foreach($Users as $User)
                                 <tr class="text-center">
                                    <td>{{ $User->id}}</td>
                                    <td>{{ $User->name}}</td>
                                    <td>{{ $User->email}}</td>
                                    <td>{{ $User->getAddress->address}}</td>
                                    <td>{{ $User->getPhone->phone}}</td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

      {{-- One to One [Inverse] --}}
         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header info">One To one [Inverse] [Phone -> User]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>id</th>
                                 <th>Step</th>
                                 <th>Code</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $all_data = App\One_to_one_inverse::all();
                              @endphp
                              @foreach($all_data as $data)
                                 <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->Step}}</td>
                                    <td> <pre>{{ $data->Code}}</pre></td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header success">One To one [Inverse] [Phone -> User]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead lass="bg-dark">
                              <tr class="text-center">
                                 <th>id</th>
                                 <th>Phone</th>
                                 <th class="bg-info">Name</th>
                                 <th class="bg-info">Email</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 // $Users = App\User::all();
                                 $phones = App\Phone::with('user')->get();

                              @endphp
                              @foreach($phones as $phone)
                                 <tr class="text-center">
                                    <td>{{ $phone->id}}</td>
                                    <td>{{ $phone->phone}}</td>
                                    <td>{{ $phone->user->name}}</td>
                                    <td>{{ $phone->user->email}}</td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

      {{-- One To Many --}}
         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header info">One To Many [Post ->Comments]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>id</th>
                                 <th>Step</th>
                                 <th>Code</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $all_data = App\One_to_many::all();
                              @endphp
                              @foreach($all_data as $data)
                                 <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->Step}}</td>
                                    <td><pre>{{ $data->Code}}</pre></td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header success">One To Many [Post ->Comments]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead lass="bg-dark">
                              <tr class="text-center">
                                 <th>id</th>
                                 <th>Post Title</th>
                                 <th class="bg-info">Comments</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $posts = App\Post::all();
                              @endphp
                              @foreach($posts as $post)
                                 <tr class="text-center">
                                    @php
                                       $rowspan =$post->comments->count();
                                       $totalRow = $rowspan+1;
                                    @endphp

                                    <td rowspan="{{$totalRow}}">{{ $post->id}}</td>
                                    <td rowspan="{{$totalRow}}">{{ $post->post}}</td>
                                    @foreach($post->comments as $comment)
                                       <tr>
                                          <td>{{ $comment->comment}}</td>                                       
                                       </tr>
                                    @endforeach
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>

               <div class="card mt-3">
                  <div class="card-header success"><h5>Different Design</h5>One To Many [Post ->Comments] </div>
                     <div class="card-body">
                        <table class="table table-bordered">
                           <thead lass="bg-dark">
                              <tr class="text-center">
                                 <th>id</th>
                                 <th>Post Title</th>
                                 <th class="bg-info">Comments</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $posts = App\Post::all();
                              @endphp
                              @foreach($posts as $post)
                                 <tr class="text-center">
                                    <td>{{ $post->id}}</td>
                                    <td>{{ $post->post}}</td>
                                    <td>
                                       @foreach($post->comments as $comment)
                                          {{$loop->index+1}}) {{ $comment->comment}}</br>                                   
                                       @endforeach
                                    </td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

      {{-- One To Many [Inverse] --}}
         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header info">One To Many [Inverse] [Post ->User, Category]</div>
                     <div class="card-body">
                        <table class="table table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>id</th>
                                 <th>Step</th>
                                 <th>Code</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $all_data = App\One_to_many_inverse::all();
                              @endphp
                              @foreach($all_data as $data)
                                 <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->Step}}</td>
                                    <td> <pre>{{ $data->Code}}</pre>
                                    </td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header success">One To Many [Inverse] [Post ->User, Category]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead lass="bg-dark">
                              <tr class="text-center">
                                 <th>id</th>
                                 <th class="bg-info">User Name</th>
                                 <th class="bg-info">Category Name</th>
                                 <th>Post Title</th>
                                 <th>Description</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $posts = App\Post::all();
                              @endphp
                              @foreach($posts as $post)
                                 <tr class="text-center">
                                    <td>{{ $post->id}}</td>
                                    <td>{{ $post->user->name}}</td>
                                    <td>{{ $post->category->categoryName}}</td>
                                    <td>{{ $post->post}}</td>
                                    <td>{{ $post->description}}</td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

      {{-- Many To Many --}}
         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header info">Many To Many [User ->Category [Via Post]]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>id</th>
                                 <th>Step</th>
                                 <th>Code</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $all_data = App\Many_to_many::all();
                              @endphp
                              @foreach($all_data as $data)
                                 <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->Step}}</td>
                                    <td> <pre>{{ $data->Code}}</pre>
                                    </td>
                                 </tr>
                               @endforeach                                               
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="card-header success">Many To Many [User ->Category [Via Post]]</div>
                     <div class="card-body">                       
                        <table class="table table-bordered">
                           <thead lass="bg-dark">
                              <tr class="text-center">
                                 <th>User Id</th>
                                 <th>User Name</th>
                                 <th class="bg-info">Category Name[Job]</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php
                                 $users = App\User::all();
                              @endphp
                              @foreach($users as $user)
                                 <tr class="text-center">
                                    @php
                                       $rowspan =$user->category->count();
                                       $totalRow = $rowspan+1;
                                    @endphp

                                    <td rowspan="{{$totalRow}}">{{ $user->id}}</td>
                                    <td rowspan="{{$totalRow}}">{{ $user->name}}</td>
                                    @foreach($user->category as $categoryName)
                                       <tr  class="text-center">
                                          <td>{{ $categoryName->categoryName }}</td>
                                       </tr>      
                                    @endforeach     
                                 </tr>
                              @endforeach     
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>

   </div>
@endsection