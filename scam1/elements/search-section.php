<div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover"
                  style="background-color: #FFC005;background-size: auto 100%; ">
                  <div class="card-body container pt-10 pb-8">
                     <div class="d-flex align-items-center">
                        <h1 class="fw-bold me-3 text-dark">Search Here</h1>
                        <span class="fw-bold text-dark opacity-50">From World's No1 Scam Database</span>
                     </div>
                     <form action="search-result.php" method="POST">
                        <div class="d-flex flex-column">
                           <div class="d-lg-flex align-lg-items-center">
                              <div
                                 class="rounded d-flex flex-column flex-lg-row align-items-lg-center bg-white p-5 w-xxl-850px h-lg-60px me-lg-10 my-5" style="width:100% !important;">
                                 <div class="row flex-grow-1 mb-5 mb-lg-0">
                                    <div class="col-lg-4 d-flex align-items-center mb-3 mb-lg-0"
                                       style="width: 100%">
                                       <span class="svg-icon svg-icon-1 svg-icon-gray-400 me-1">
                                          <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                             <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                   d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                   fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                   d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                   fill="#000000" fill-rule="nonzero" />
                                             </g>
                                          </svg>
                                       </span>
                                       <input type="text" class="form-control form-control-flush flex-grow-1"
                                          name="search" value="<?php if(isset($_POST['search'])){
                                             echo $_POST['search'];
                                          } ?>" placeholder="Search Scams" style="border:0px solid black; width:100% !important;" />
                                    </div>
                                 </div>
                                 <div class="min-w-150px text-end">
                                    <button type="submit" class="btn btn-dark btn-block" style="background:#221ECA; border:0px solid black;">Search</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>