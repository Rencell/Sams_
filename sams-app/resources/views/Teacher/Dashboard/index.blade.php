<x-layout>
    <div class="container">
        <div class="row text-white m-4 d-flex gap-3" >
            <div class="col-lg-7 col-sm-12 dashboard d-flex bg-primary rounded-5" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="dashboard-word flex-grow-1">
                    <div class="fs-sm fw-light">Welcome Back, User</div>
                    <div>Start a day with a smile</div>
                    <a href="rfid" class="btn btn-success flex-shrink-0 align-self-start mt-2 rounded-pill"><i class="bi bi-arrow-90deg-right"></i> RFID Attendance</a>
                </div>
                <div class="photo">
                    <div class="image-view">
                        <img src="{{asset('images/dashboard-image.svg')}}" alt="image">
                    </div>
                </div>

            </div>

            <div class="col p-0 d-flex flex-column gap-2">
                <div class="flex-grow-1 rounded-5 d-flex justify-content-between align-items-center p-2 System-color" style="font-size: 50px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px">
                    <div class="d-flex flex-column ms-3 h-100" >
                        <div class="fs-6 " >Total Students</div>
                        <div >0</div>
                    </div>
                    <div class="h-100 d-flex align-items-center me-3"><i class="bi bi-person-circle "></i></div>
                </div>
                <div class="flex-grow-1  rounded-5 d-flex justify-content-between align-items-center p-2 System-color"  style="font-size: 50px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px">
                    <div class="d-flex flex-column ms-3 h-100">
                        <div class="fs-6 " >Total Students</div>
                        <div class=" d-flex align-items-center">0</div>
                    </div>
                    <div class="me-3"><i class="bi bi-person-circle "></i></div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
