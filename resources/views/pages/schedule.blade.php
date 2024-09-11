@extends('components.body')

@section('title', 'Scheduling System with Automated Conflict Resolver')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('build/assets/DataTables/datatables.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('body')
    {{-- Title pane --}}
    <div class="title">
        <h1 class="font-normal text-2xl ml-4 mt-2">Manage Schedules</h1>
    </div>
    <div class="outer-container flex flex-col md:flex-row items-center justify-between">
        <div class="search-box md:w-3/12 w-11/12">
            <input type="search" name="searchBar" id="search" placeholder="search schedule.." class="relative left-0 top-0 bg-zinc-200 md:ml-4 mt-2 px-3 py-1.5 rounded-md w-full md:w-72">
        </div>

        <div class="buttons flex items-center justify-evenly w-80 mt-2">
            <!-- Button trigger modal -->
            <span class="hidden md:block">
                <button type="button" class="relative text-sm flex items-center bg-[#800000] text-white w-[150px] h-[40px] cursor-pointer group rounded-xl" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <span class="text-white font-semibold transform translate-x-[30px] transition-all group-hover:text-transparent rounded-xl">Add Sched</span>
                    <span class="absolute flex items-center justify-center bg-[#800000] border-[#800000] h-full w-[39px] transform translate-x-[109px] transition-all group-hover:w-[148px] group-hover:translate-x-0 rounded-xl">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="w-[30px] stroke-white">
                        <line y2="19" y1="5" x2="12" x1="12"></line>
                        <line y2="12" y1="12" x2="19" x1="5"></line>
                      </svg>
                    </span>
                </button> 
            </span>

            <span class="block md:hidden">
                <button type="button" class="relative flex items-center bg-[#800000] text-white w-[100px] h-[40px] cursor-pointer group rounded-xl text-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <span class="text-white font-semibold translate-x-[25px] transition-all group-hover:text-transparent rounded-xl">Add</span>
                    <span class="absolute flex items-center justify-around  bg-[#800000] border-[#800000] h-full w-[34px] transform translate-x-[65px]  transition-all group-hover:w-[95px] group-hover:translate-x-0 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="w-[24px] md:w-[30px] stroke-white">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg>
                    </span>
                </button>                
            </span>

            <button class="w-[100px] md:w-[150px] h-[40px] md:h-[40px] flex items-center text-sm justify-center bg-gray-300 border border-gray-300 rounded-[10px] gap-[10px] text-[16px] cursor-pointer overflow-hidden font-medium shadow-[0_10px_10px_rgba(0,0,0,0.065)] transition-all duration-300 group">
                <span class="flex flex-col items-center justify-center w-[20px] h-full">
                  <span class="flex items-end justify-center h-1/2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 92 75" class="w-full h-auto translate-y-[4px]">
                      <path
                        stroke-width="5"
                        stroke="black"
                        d="M12 37.5H80C85.2467 37.5 89.5 41.7533 89.5 47V69C89.5 70.933 87.933 72.5 86 72.5H6C4.067 72.5 2.5 70.933 2.5 69V47C2.5 41.7533 6.75329 37.5 12 37.5Z"
                      ></path> x
                      <mask fill="white" id="path-2-inside-1_30_7">
                        <path
                          d="M12 12C12 5.37258 17.3726 0 24 0H57C70.2548 0 81 10.7452 81 24V29H12V12Z"
                        ></path>
                      </mask>
                      <path
                        mask="url(#path-2-inside-1_30_7)"
                        fill="black"
                        d="M7 12C7 2.61116 14.6112 -5 24 -5H57C73.0163 -5 86 7.98374 86 24H76C76 13.5066 67.4934 5 57 5H24C20.134 5 17 8.13401 17 12H7ZM81 29H12H81ZM7 29V12C7 2.61116 14.6112 -5 24 -5V5C20.134 5 17 8.13401 17 12V29H7ZM57 -5C73.0163 -5 86 7.98374 86 24V29H76V24C76 13.5066 67.4934 5 57 5V-5Z"
                      ></path>
                      <circle fill="black" r="3" cy="49" cx="78"></circle>
                    </svg>
                  </span>
              
                  <span class="flex items-start justify-center h-1/2 w-full">
                    <span class="w-[70%] h-[10px] border border-black bg-white transform translate-y-0 origin-top transition-all duration-300 group-hover:h-[16px] group-hover:bg-gray-200"></span>
                  </span>
                </span>
                Print
            </button>              
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center bg-[#800000]">
                        <h1 class="modal-title fs-5 text-center text-neutral-100" id="staticBackdropLabel">Create New Schedule</h1>
                    </div>
                    <div class="modal-body">
                        {{-- Modal form --}}
                        <form action="" method="post" name="schedulesForm" id="schedules-form" class="inputs grid grid-cols-2 gap-4">
                            @csrf
                            @method('post')

                            {{-- Input controls --}}
                            <input type="text" name="teacherName" id="teacher-name" class="form-control col-span-2 w-full p-2 rounded-xl" placeholder="Teacher Name: ">
                            <input type="text" name="subject" id="subject" class="form-control w-full p-2 rounded-xl" placeholder="Subject: ">
                            <input type="text" name="studentNum" id="student-number" class="form-control w-full p-2 rounded-xl" placeholder="Student No.: ">
                            <input type="text" name="yearSection" id="year-section" class="form-control w-full p-2 rounded-xl" placeholder="Year & Section: ">
                            <input type="text" name="room" id="room" class="form-control w-full p-2 rounded-xl" placeholder="Room: ">
                            
                            <div class="col-span-2 grid grid-cols-2 gap-4">
                                <input type="date" name="date" id="date" class="form-control w-full p-2 rounded-xl">
                                <input type="time" name="time" id="time" class="form-control w-full p-2 rounded-xl">
                            </div>

                             {{-- Buttons --}}
                            <div class="flex justify-end gap-2 col-span-2">
                                <button type="button" class="border-[#800000] border-2 p-2 w-[120px] text-[#800000] rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="bg-[#800000] p-2 w-[120px] text-white rounded-lg" data-bs-dismiss="modal">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="datatable w-[95%] mx-auto md:mt-4">
        <table id="schedulesTable" class="table table-bordered table-sm mt-4">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Subject</th>
                    <th>Student Number</th>
                    <th>Year/Section</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Science</td>
                    <td>12345</td>
                    <td>Grade 10 - A</td>
                    <td>Room 101</td>
                    <td>2023-09-04</td>
                    <td>10:00 AM</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <!-- jQuery cdn link-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS library script -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#schedulesTable').DataTable();
        });
    </script>

@endsection