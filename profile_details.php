<!-- Modal -->
<div class="modal" id="myViewModel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <div class="page-content page-container" id="page-content">
                    <div class="">
                        <div class="row row-col-auto container d-flex justify-content-center">
                            <div class="col-xl-12 col-xl-12">
                                <div class="card user-card-full">
                                    <div class="row">
                                        <div class="col-md-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img src="http://localhost/chat_app/assest/upload/<?= $_SESSION['file_name'] ?? 'default.png' ?>"
                                                        class="img-radius" alt="User-Profile-Image">
                                                </div>
                                                <h6 class="f-w-600 full_name"></h6>
                                                <p>Active User</p>
                                                <i
                                                    class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16 Edit"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400 email"></h6>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <p class="m-b-10 f-w-600">Password</p>
                                                        <h6 class="text-muted f-w-400 password"></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <p class="m-b-10 f-w-600">Phone</p>
                                                        <h6 class="text-muted f-w-400 phone"></h6>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <p class="m-b-10 f-w-600">Pin_code</p>
                                                        <h6 class="text-muted f-w-400 pincode"></h6>
                                                    </div>
                                                </div>

                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                            title="" data-original-title="facebook" data-abc="true"><i
                                                                class="mdi mdi-facebook feather icon-facebook facebook"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                            title="" data-original-title="twitter" data-abc="true"><i
                                                                class="mdi mdi-twitter feather icon-twitter twitter"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                            title="" data-original-title="instagram" data-abc="true"><i
                                                                class="mdi mdi-instagram feather icon-instagram instagram"
                                                                aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>