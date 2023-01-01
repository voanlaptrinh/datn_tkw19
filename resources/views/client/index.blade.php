@php
    use Carbon\Carbon;
@endphp
@extends('client.layout.index')
@section('client')

    <body>
        <div class="home-banner margin-bottom-0" style="background:#00ab46 url('banner-bg.jpg')" data-overlay="5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container">
                            <div class="col-lg-12">
                                <form id="search-form" action="{{ route('home.search') }}" name="gs" method="submit"
                                    role="search">
                                    <div class="row">
                                        <div class="col-lg-3 align-self-center">
                                            <fieldset>
                                                <input type="address" name="key" class="searchText"
                                                    placeholder="Tìm Kiêm..." autocomplete="on">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-3 align-self-center">
                                            <fieldset>
                                                <select class="form-select" name="majors">
                                                    <option selected disabled>Chuyên Ngành</option>
                                                    @foreach ($majors as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-3 align-self-center">
                                            <fieldset>
                                                <select class="form-select" name="location">
                                                    <option selected disabled>Địa chỉ</option>
                                                    @foreach ($location as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->label }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-3">
                                            <fieldset>
                                                <button class="main-button"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="middle space gray">
            <div class="container border" style="background: #ffff">
                <div class="container container-header-box border ">
                    <h1 class="header-box">Tìm việc làm nhanh 24h, việc làm mới nhất trên toàn quốc</h1>
                    <p class="header-box-description">Tiếp cận 30,000+ tin tuyển dụng việc làm mới mỗi ngày từ hàng nghìn
                        doanh nghiệp uy tín tại Việt Nam</p>
                    @if (!Auth::guard('user')->check())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Hệ thống mong muốn bạn đăng nhập để có thể
                            hiển thị các việc làm phù hợp nhất!, <strong><a href="#" class="show-turn-on-location"
                                    data-toggle="modal" data-target="#exampleModallogin">Đăng
                                    nhập tại đây!</a></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                        </div>
                    @endif

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Hãy báo cáo cho tôi nếu bạn gặp phải sự cố hoặc bạn phát hiện ai đó có hành vi lừa đảo!, <strong><a
                                href="{{ route('index') }}" class="show-turn-on-location">Liên hệ!</a></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>

                </div>
                <div class="search-book">
                    <h2 class="ft-bold">Tin tuyển dụng, việc làm tốt nhất</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="container p-3">

                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3" id="paginated-list">
                            @foreach ($job as $value)
                                <div class="col render-job-search">

                                    <div class="p-3 border bg-light box-showdow">
                                        <div class="position-absolute ab-right">
                                            <a type="button"
                                                class="
                                            p-3
                                            border
                                            circle
                                            d-flex
                                            align-items-center
                                            justify-content-center
                                            bg-white
                                            text-gray
                                            ">
                                                <i
                                                    class="
                                            lni lni-heart-filled
                                            position-absolute
                                            snackbar-wishlist
                                        "></i>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="job_grid_thumb mb-3 title-name px-3 col-4">
                                                <a href="home/detail/{{ $value->title . '-' . $value->id }}"
                                                    class="d-block m-auto"><img src="{{ $value->logo }}" class="img-fluid"
                                                        alt="" /></a>
                                            </div>
                                            <div class="job_grid_caption title-name px-3 col-8 g-1">
                                                <h4 class="mb-0 ft-medium medium ml-20">
                                                    <a href="home/detail/{{ $value->title . '-' . $value->id }}"
                                                        class="text-dark fs-md" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Tooltip on top">
                                                        <p
                                                            style="width: 200px !important;overflow: hidden !important;text-overflow: ellipsis !important;white-space: nowrap">
                                                            {{ $value->title }}
                                                        </p>
                                                    </a>
                                                </h4>

                                                <div class="jbl_location ml-20" style="margin-top: -10px">
                                                    <a href="" class="text-dark fs-md"> {{ $value->nameCompany }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="job_grid_footer d-flex align-items-center justify-content-between text-mute-footer">
                                            <div class="df-1 text-muted">
                                                <i class="lni lni-wallet mr-1"></i> {{ $value->getwage->name }}
                                            </div>
                                            <div class="df-1 text-muted ml-2">
                                                <i class="lni lni-timer mr-1"></i>{{ $value->end_job_time }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <br>
                                <br>
                                <br>
                                <br>
                                <span class="page-item text-center pagination-container">
                                    <div id="pagination-numbers">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
        </section>
        @if (Auth::guard('user')->check())
            @if (!$user->getProfileUse == null)
                <section class="bg-light">
                    <div class="container">

                        <!-- Item Wrap Start -->
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <!-- row -->
                            <div class="text-interesting border">
                                <h2 class="ft-bold">Việc làm phù hợp với bạn</h2>
                            </div>
                            <div class="row align-items-center">

                                <!-- Single -->

                                <div class="row justify-content-center">
                                    <div class="container p-3">
                                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3" id="paginated-list">
                                            @foreach ($jobForUser as $value)
                                                <div class="col render-job-search">
                                                    <div class="p-3 border bg-light box-showdow">
                                                        <div class="position-absolute ab-right">
                                                            <a type="button"
                                                                class="p-3
                                            border
                                            circle
                                            d-flex
                                            align-items-center
                                            justify-content-center
                                            bg-white
                                            text-gray
                                            ">
                                                                <i
                                                                    class="
                                            lni lni-heart-filled
                                            position-absolute
                                            snackbar-wishlist
                                        "></i>
                                                            </a>
                                                        </div>
                                                        <div class="row" style="height: 80px;">
                                                            <div class="job_grid_thumb mb-3 title-name px-3 col-4">
                                                                <a href="home/detail/{{ $value->title . '-' . $value->id }}"
                                                                    class="d-block m-auto"><img src="{{ $value->logo }}"
                                                                        class="img-rounded"
                                                                        style="width: 70% !important; height: 70% !important"
                                                                        alt="" /></a>
                                                            </div>
                                                            <div class="job_grid_caption title-name px-3 col-8 g-1">
                                                                <h4 class="mb-0 ft-medium medium ml-20">
                                                                    <a href="home/detail/{{ $value->title . '-' . $value->id }}"
                                                                        class="text-dark fs-md" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Tooltip on top">
                                                                        <p
                                                                            style="width: 200px !important;overflow: hidden !important;text-overflow: ellipsis !important;white-space: nowrap">
                                                                            {{ $value->title }}
                                                                        </p>
                                                                    </a>
                                                                </h4>

                                                                <div class="jbl_location ml-20" style="margin-top: -10px">
                                                                    <a href="" class="text-dark fs-md">
                                                                        {{ $value->nameCompany }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="job_grid_footer d-flex align-items-center justify-content-between text-mute-footer">
                                                            <div class="df-1 text-muted">
                                                                <i class="lni lni-wallet mr-1"></i>
                                                                {{ $value->getwage->name }}
                                                            </div>
                                                            <div class="df-1 text-muted ml-2">
                                                                <i
                                                                    class="lni lni-timer mr-1"></i>{{ $value->end_job_time }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <span class="page-item text-center pagination-container">
                                                    <div id="pagination-numbers">
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                    </div>
                </section>
            @endif
        @endif
        <!-- ======================= Job List ======================== -->

        <!-- ======================= All category ======================== -->
        <section class="space gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="sec_title position-relative text-center mb-5">
                            <h2 class="ft-bold">Top Ngành Nghề nổi Bật</h2>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row justify-content-center">

                    <div class="page-white-100">
                        <div id="box-discover">
                            <div class="container">
                                <div class="list-discover">
                                    @foreach ($majors as $item)
                                        <div class="item">
                                            <div class="image">
                                                <img src="{{ $item->image_majors }}" alt="">
                                            </div>
                                            <div class="title">{{ $item->name }}</div>
                                            <p class="count">(<span class="number count_job_manager">2,682</span> việc
                                                làm)</p>
                                            <div>
                                                <a target="_blank" href="" class="see-more">Khám phá
                                                    ngay </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======================= Blog Start ============================ -->
        <section class="space min gray">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="sec_title position-relative text-center mb-4">
                            <h2 class="ft-bold">Tin Tức
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <!-- Single Item -->
                    @foreach ($new as $item)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="blg_grid_box">
                                <div class="blg_grid_thumb">
                                    <a href="blog-detail.html"><img src="{{ $item->new_image }}"
                                            class="img-fluid w-75 rounded "
                                            style="display : block;
                                                   margin-left: auto;
                                                   margin-right: auto;
                                                   margin-top: 10px;"alt=""></a>
                                </div>
                                <div class="blg_grid_caption">
                                    <p class="theme-cl px-3 py-1 rounded bg-light-success d-inline-flex">
                                        {{ $item->majors }}
                                    </p>
                                    <div class="blg_title">
                                        <h4><a href="blog-detail.html">{{ $item->title }}</a></h4>
                                    </div>
                                    <div class="blg_desc  "
                                        style="
                                           max-height: 20px;
                                           overflow: hidden;
                                           text-overflow: ellipsis !important;
                                            ">
                                        <p>{{ $item->describe }}...</p>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div
                                        class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb "><a href="instructor-detail.html"><img
                                                            src="{{ $item->new_image }}" class="img-fluid circle "
                                                            width="30px" alt=""></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li>
                                                        <div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
                                                        <div class="elsio_tx">10k Views</div>
                                                    </li>
                                                    <li>
                                                        <div class="elsio_ic"><i class="fa fa-clock text-warning"></i>
                                                        </div>
                                                        <div class="elsio_tx">{{ $item->created_at->format('d-m-Y') }}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ======================= Newsletter Start ============================ -->
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
        <!-- Button trigger modal -->
        <!-- Modal login -->
        <div class="modal fade" id="exampleModallogin" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chào mừng bạn đến với ITWork</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <client-login
                            :data="{{ json_encode([
                                'urlStore' => route('owner.store'),
                                'urlRegister' => route('owner.update.register'),
                                'message' => $message ?? '',
                            ]) }}">
                            <client-login>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @if (Auth::guard('user')->check())
        @if ($user->getProfileUse == null)
            <div class="loading-div">
                <div class="loader-img"></div>
            </div>
            <div class="modal fade" id="checkmodalProfile" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel"
                                style="margin-left: 15%; font-size: 24px; font-weight: 500">Vui lòng bổ sung các thông tin
                                dưới đây để hoàn tất đăng ký tài khoản
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <user-profile
                                :data="{{ json_encode([
                                    'lever' => $lever,
                                    'experience' => $experience,
                                    'wage' => $wage,
                                    'skill' => $skill,
                                    'timework' => $timework,
                                    'profession' => $profession,
                                    'majors' => $majors,
                                    'location' => $location,
                                    'workingform' => $workingform,
                                    'user' => $user,
                                    'urlStore' => route('profile.store'),
                                    'urlBack' => route('profile.index'),
                                    'getskill' => $getskill,
                                ]) }}">
                            </user-profile>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#checkmodalProfile").modal('show');
                });
            </script>
        @endif
    @endif
@endsection
