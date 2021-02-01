<div class="container mt-5">
    <div class="row">


        @foreach ($coursesData as $coursesData)

        <div class="col-md-4 p-1 text-center">
            <div class="card">
                <div class="text-center">
                    <img class="w-100" src="{{$coursesData->course_img}}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{$coursesData->course_name}}</h5>
                    <h6 class="service-card-subTitle p-0 ">{{$coursesData->course_des}}</h6>
                    <a href="{{$coursesData->course_link}}"  class="normal-btn btn" style="text-decoration: none; color:white;">শুরু করুন</a>
                </div>
            </div>
        </div>


        @endforeach



    </div>
</div>
