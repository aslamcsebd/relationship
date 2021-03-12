<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class All_Relation extends Model
{
    //
}


// home

// <div class="container-fluid mt-4">
//         <style type="text/css">
//             .nav { background: #ecf0f1; }
//             .nav-link.active {
//                /*margin-bottom: -2px !important;*/
//                /*border-top: 2px solid #5AB1D0 !important;*/
//                /*border-bottom: 0px #fff solid !important;*/
//                background-color: cyan; 
//                color: blue;
//             }
//             .btn{ border-radius: 0.1rem; line-height: 1.5; }
//         </style>

//         @php
//                $RelationNames = App\All_Relation::all();
//             @endphp
//             @foreach($RelationNames as $RelationName)

//       <div class="d-flex align-items-start bg-info row">
//          <div class="nav flex-column col-2 nav-pills bg-light p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
//             <button class="av-link btn btn-outline-primary p-1 m-1 active" data-bs-toggle="pill" data-bs-target="#v-pills-home">
//                Home home home
//             </button>
//             <button class="av-link btn btn-outline-primary p-1 m-1" data-bs-toggle="pill" data-bs-target="#v-pills-home2">
//                Home home home
//             </button>
//          </div>
//          <div class="tab-content col" id="v-pills-tabContent">
//             <div class="tab-pane fade show active " id="v-pills-home">
//                <div class="nav nav-tabs" id="nav-tab" role="tablist">
//                   <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-home">Code</button>
//                   <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-profile" >Output</button>
//                </div>
               
//                <div class="tab-content" id="nav-tabContent">
//                   <div class="tab-pane fade show active resp-tab-content" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
//                      <div class="row">
//                         <div class="col">
//                            <div class="card">
//                               <div class="card-header info">One To one [User -> Address, Phone]</div>
//                                  <div class="card-body">                       
//                                     <table class="table table-bordered">
//                                        <thead class="text-center">
//                                           <tr>
//                                              <th>id</th>
//                                              <th>Step</th>
//                                              <th>Code</th>
//                                           </tr>
//                                        </thead>
//                                        <tbody>
//                                           @php
//                                              $all_data = App\One_to_one::all();
//                                           @endphp
//                                           @foreach($all_data as $data)
//                                              <tr>
//                                                 <td>{{ $data->id}}</td>
//                                                 <td>{{ $data->Step}}</td>
//                                                 <td> <pre>{{ $data->Code}}</pre></td>
//                                              </tr>
//                                            @endforeach                                               
//                                        </tbody>
//                                     </table>
//                                  </div>
//                            </div>
//                         </div>
//                      </div>
//                   </div>
//                   <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
//                      <div class="row">
//                         <div class="col">
//                            <div class="card">
//                               <div class="card-header success">One To one [User -> address/Phone]</div>
//                                  <div class="card-body">                       
//                                     <table class="table table-bordered">
//                                        <thead lass="bg-dark">
//                                           <tr class="text-center">
//                                              <th>id</th>
//                                              <th>Name</th>
//                                              <th>Email</th>
//                                              <th class="bg-info">Address</th>
//                                              <th class="bg-info">Phone</th>
//                                           </tr>
//                                        </thead>
//                                        <tbody>
//                                           @php
//                                              // $Users = App\User::all();
//                                              $Users = App\User::all();

//                                           @endphp
//                                           @foreach($Users as $User)
//                                              <tr class="text-center">
//                                                 <td>{{ $User->id}}</td>
//                                                 <td>{{ $User->name}}</td>
//                                                 <td>{{ $User->email}}</td>
//                                                 <td>{{ $User->getAddress->address}}</td>
//                                                 <td>{{ $User->getPhone->phone}}</td>
//                                              </tr>
//                                            @endforeach                                               
//                                        </tbody>
//                                     </table>
//                                  </div>
//                            </div>
//                         </div>
//                      </div>
//                   </div>                   
//                </div>
//             </div>
//          </div>

         
//       </div>

//       