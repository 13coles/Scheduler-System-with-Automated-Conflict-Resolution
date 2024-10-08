@extends('components.body')

@section('title', 'Scheduling System with Automated Conflict Resolver')

@section('body')
    {{-- Title pane --}}
    <div class="title">
        <h1 class="font-normal text-2xl mt-2">Teachers Loading</h1>
    </div>
    <div class="outer-container flex flex-col md:flex-row items-center justify-between">
        <div class="search-box md:w-3/12 w-11/12">
            {{-- <i class="fas fa-search absolute"></i> --}}
            <input type="search" name="searchBar" id="search" placeholder="search teacher.." class="relative left-0 top-0 bg-zinc-200 mt-2 px-3 py-1.5 rounded-sm w-full md:w-72">
        </div>

        <div class="buttons flex items-center justify-evenly w-80 mt-2">
            <div class="buttons flex items-center justify-end gap-2 w-80 mt-2">
                {{-- Print button --}}
                <button class="button bg-gradient-to-r from-[#d3d3d3] to-[#c0c0c0] text-gray-800 border border-transparent rounded-full flex items-center gap-1.5 px-2 py-2 shadow-custom transition-transform duration-300 hover:border-[#a9a9a9] active:transform active:scale-95 active:shadow-custom-active">
                    <svg stroke-linejoin="round" stroke-linecap="round" fill="none" stroke="currentColor" stroke-width="1.5"
                      viewBox="0 0 24 24"
                      height="40"
                      width="40"
                      class="w-6 h-6"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill="none" d="M0 0h24v24H0z" stroke="none"></path>
                      <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                      <path d="M7 11l5 5l5 -5"></path>
                      <path d="M12 4l0 12"></path>
                    </svg>
                </button>
                  
                {{-- Add button with modal trigger --}}
                <button class="group cursor-pointer outline-none hover:rotate-90 duration-300" title="Add New" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <svg class="stroke-blue-950 fill-none group-hover:fill-blue-100 group-active:stroke-blue-900 group-active:fill-blue-950 group-active:duration-0 duration-300" viewBox="0 0 24 24"
                        height="50px" width="50px" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-width="1" d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"></path>
                        <path stroke-width="1" d="M8 12H16"></path>
                        <path stroke-width="1" d="M12 16V8"></path>
                    </svg>
                </button>
            </div>    
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{-- Modal header --}}
                    <div class="modal-header text-center bg-[#223a5e]">
                        <h1 class="modal-title fs-5 text-center text-neutral-100" id="staticBackdropLabel">Add New Load</h1>
                    </div>
                    {{-- Modal body --}}
                    <div class="modal-body">
                        <form action="" method="post" name="teachersForm" id="teachers-form">
                            @csrf
                            @method('post')

                            <div class="mb-3">
                                <input type="text" name="teachertName" id="teacher-name" class="form-control col-span-2 w-full p-2 rounded-md" placeholder="Teacher's Name: ">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="subjectName" id="subject-name" class="form-control col-span-2 w-full p-2 rounded-md" placeholder="Subject Name: ">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="numberHours" id="number-hours" class="form-control col-span-2 w-full p-2 rounded-md" placeholder="No. of Hours: ">
                            </div>

                            {{-- Modal buttons --}}
                            <div class="modal-button flex items-center justify-end gap-2 mt-3">
                                <button type="button" class="border-[#223a5e] border-2 p-2 w-[120px] text-[#223a5e] rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="bg-[#223a5e] p-2 w-[120px] text-white rounded-lg" data-bs-dismiss="modal">Save</button>
                            </div>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    {{-- Table --}}
    <span class="hidden md:block">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                <th scope="col">Teacher's Name</th>
                <th scope="col">Subject Name</th>
                <th scope="col">No. of Hours</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">Eric Coles</th>
                <td>Event Driven Programming</td>
                <td>2 Hours</td>
                <td>
                    <a href="" class="btn btn-success"><i class="fas fa-pencil text-black"></i></a>
                    <a href="" class="btn btn-danger"><i class="fas fa-trash text-black"></i></a>
                </td>
                </tr>
            </tbody>
        </table>
    </span>

    {{-- Table for mobile--}}
    <span class="block md:hidden">
        <table class="table table-success table-striped text-center">
            <thead>
                <tr>
                <th scope="col">Teacher's Name</th>
                <th scope="col">Subject Name</th>
                <th scope="col"># of Hours</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">Eric Coles</th>
                <td>Event Driven Programming</td>
                <td>2 Hours</td>
                <td>
                    <div class="dropdown">
                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Edit</a></li>
                            <li><a class="dropdown-item" href="">Delete</a></li>
                        </ul>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>
    </span>
@endsection