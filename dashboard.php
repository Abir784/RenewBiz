<?php 
include('page_includes/dashboard_header.php')
//setting global
?>

<!-- Main Content -->
<div class="main-content">
  <div class="header p-0 p-md-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center">
          <div class="col d-flex align-items-center">
            <a href="#" class="back-arrow bg-white circle circle-sm shadow-dark-80 rounded mb-0"><img src="assets/svg/icons/chevrons-left1.svg" alt="Chevrons"></a>
            <div class="ps-0 ps-md-3">
              <h1 class="h4 mb-0">
                Dashboard
              </h1>
            </div>
          </div>
          <div class="col-auto d-flex flex-wrap align-items-center">
            <a href="#" class="text-dark h5 mb-0 notification dnd"><img src="assets/svg/icons/notification.svg" style="width:20px;" alt="Notification"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="assets/svg/icons/setting1.svg" alt="Setting"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="assets/svg/icons/hamburger1.svg" alt="Hamburger"></a>
            <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="assets/img/templates/avatar1.svg" alt="Avatar">
                <span class="avatar-status avatar-sm-status avatar-danger">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-3 bg-gray-200">
  <div class="px-0 px-md-3">
    <div class="container-fluid pt-2 pt-lg-3 pb-md-3">
      <div class="row">
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Revenue</span>
                  <span class="h5 mb-0">$2,563</span>
                </div>
                <div class="col-auto">
                  <span class="badge badge-success py-2 px-2"><span class="px-1">156+ <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                    <g data-name="icons/tabler/trend-up" transform="translate(0)">
                      <rect data-name="Icons/Tabler/Trend background" width="16" height="16" fill="none"/>
                      <path d="M.249,9.315.18,9.256a.616.616,0,0,1-.059-.8L.18,8.385,5.1,3.462A.616.616,0,0,1,5.9,3.4l.068.059L8.821,6.309,13.9,1.231H9.641A.616.616,0,0,1,9.031.7L9.025.616a.617.617,0,0,1,.532-.61L9.641,0h5.728a.614.614,0,0,1,.569.346h0l0,.008,0,.008h0a.613.613,0,0,1,.048.168V.541A.621.621,0,0,1,16,.61V6.359a.616.616,0,0,1-1.226.083l-.005-.083V2.1L9.256,7.615a.616.616,0,0,1-.8.059l-.069-.059L5.539,4.768,1.05,9.256a.615.615,0,0,1-.8.059Z" transform="translate(0 3)" fill="#ffffff"/>
                    </g>
                  </svg>
                  </span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Friends</span>
                  <span class="h5 mb-0">9 New</span>
                </div>
                <div class="col-auto">
                  <div class="avatar-group">
                    <span class="avatar avatar-circle">
                      <img class="avatar-img" src="assets/img/templates/avatar2.png" alt="Avatar">
                    </span>
                    <span class="avatar avatar-circle">
                      <img class="avatar-img" src="assets/img/templates/avatar3.png" alt="Avatar">
                    </span>
                    <span class="avatar avatar-circle">
                      <img class="avatar-img" src="assets/img/templates/avatar4.png" alt="Avatar">
                    </span>
                    <span class="avatar avatar-circle">
                      <span class="avatar-initials avatar-dark-light border-transprant">+6</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Freebies</span>
                  <span class="h5 mb-0">$156.00</span>
                </div>
                <div class="col-auto">
                  <div class="position-relative">
                    <img src="assets/svg/icons/gift.svg" style="width: 32px;" alt="Gift" class="mt-1">
                    <span class="position-absolute top-0 start-100 translate-middle badge border border-warning rounded-circle bg-orange-300 p-1"><span class="visually-hidden">unread messages</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">This week</span>
                  <span class="h5 mb-0">Progress</span>
                </div>
                <div class="col-auto">
                  <div id="MuseColumnsChartOne" style="width: 105px;height: 50px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-8 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="card-body px-3 px-md-4">
              <div class="d-flex align-items-center border-bottom border-gray-200 pb-3 mb-2">
                <h6 class="card-header-title mb-0">Breakdown</h6>
                <div class="ms-auto">
                  <select class="form-select form-select-sm">
                    <option>Today</option>
                  </select>
                </div>
              </div>
              <div id="MuseMultipleColumnsChartOne"></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4 mb-4">
          <div class="card h-100 rounded-12 shadow-dark-80">
            <div class="card-body px-3 px-md-4">
              <div class="d-flex align-items-center border-bottom border-gray-200 pb-3 mb-2">
                <h6 class="card-header-title mb-0">Refferals</h6>
                <div class="ms-auto">
                  <select class="form-select form-select-sm">
                    <option>Today</option>
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-center mt-4">
                <div id="MusePieChartOne" style="height: 380px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-4 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="p-3 p-md-4 border-bottom border-gray-200">
              <h6 class="mb-0 ">Projects</h6>
            </div>
            <div class="card-body pb-2 pt-0">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar30.png" alt="Avatars">
                        <span class="avatar-status avatar-success">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Amarachi Nkechi</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 3hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar31.png" alt="Avatars">
                        <span class="avatar-status avatar-warning">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Lara Madrigal</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 4hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar32.png" alt="Avatars">
                        <span class="avatar-status avatar-danger">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Ray Cooper</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 4hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar33.png" alt="Avatars">
                        <span class="avatar-status avatar-offline">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Linzell Bowman</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 4hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-8 mb-4">
          <div class="card rounded-12 shadow-dark-80 h-100">
            <div class="card-body px-3 px-md-4">
              <div class="d-flex align-items-center pb-3">
                <h6 class="card-header-title mb-0">Map</h6>
                <div class="ms-auto">
                  <select class="form-select form-select-sm">
                    <option>Today</option>
                  </select>
                </div>
              </div>
              <div id="MuseMapChart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="d-flex align-items-center px-4 py-3">
              <h6 class="card-header-title mb-0">Goals</h6>
              <div class="ms-auto">
                <select class="form-select form-select-sm">
                  <option>Today</option>
                </select>
              </div>
            </div>
            <div class="table-responsive mb-0">
              <table class="table card-table table-nowrap">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Progress</th>
                    <th>Due date</th>
                    <th class="text-end">Team</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="list"><tr>
                    <td class="goal-project">
                      Monthly Report
                    </td>
                    <td class="goal-status">
                      <span class="avatar-status avatar-sm-status avatar-success position-relative me-1 bottom-0 end-0">&nbsp;</span> Completed
                    </td>
                    <td class="goal-progress">100%</td>
                    <td class="goal-date">01/12/21</td>
                    <td>
                      <div class="avatar-group justify-content-end">
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar2.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar3.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar4.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <span class="avatar-initials avatar-dark-light border-0">+9</span>
                        </span>
                      </div>
                    </td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" style="width:16px;" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="goal-project">
                      UI Design
                    </td>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-warning position-relative me-1 bottom-0 end-0">&nbsp;</span> Pending</td>
                    <td class="goal-progress">60%</td>
                    <td class="goal-date">05/12/21</td>
                    <td>
                      <div class="avatar-group justify-content-end">
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar2.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar3.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar4.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <span class="avatar-initials avatar-dark-light border-0">+6</span>
                        </span>
                      </div>
                    </td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" style="width:16px;" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="goal-project">
                      React Components
                    </td>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-danger position-relative me-1 bottom-0 end-0">&nbsp;</span> Cancelled</td>
                    <td class="goal-progress">0%</td>
                    <td class="goal-date">06/12/21</td>
                    <td>
                      <div class="avatar-group justify-content-end">
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar2.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar3.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar4.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <span class="avatar-initials avatar-dark-light border-0">+2</span>
                        </span>
                      </div>
                    </td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" style="width:16px;" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="goal-project">
                      Bootstrap 5 Upgrade
                    </td>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-offline position-relative me-1 bottom-0 end-0">&nbsp;</span> Not started</td>
                    <td class="goal-progress">0%</td>
                    <td class="goal-date">24/12/21</td>
                    <td>
                      <div class="avatar-group justify-content-end">
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar3.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar4.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar1.svg" alt="Avatar">
                          <span class="avatar-status avatar-xs-status avatar-offline">&nbsp;</span>
                        </span>
                      </div>
                    </td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" style="width:16px;" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="goal-project">
                      Fonts Design
                    </td>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-offline position-relative me-1 bottom-0 end-0">&nbsp;</span> Not started</td>
                    <td class="goal-progress">
                      0%
                    </td>
                    <td class="goal-date">17/12/21</td>
                    <td>
                      <div class="avatar-group justify-content-end">
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar4.png" alt="Avatar">
                        </span>
                        <span class="avatar avatar-xs avatar-circle">
                          <img class="avatar-img border-0" src="assets/img/dashboard/avatar1.svg" alt="Avatar">
                          <span class="avatar-status avatar-xs-status avatar-offline">&nbsp;</span>
                        </span>
                      </div>
                    </td>
                    <td class="text-end">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="assets/svg/icons/dots1.svg" style="width:16px;" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-5 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="px-3 px-md-4 py-3 border-bottom border-gray-200 d-flex align-items-center">
              <h6 class="mb-0 py-1">Activity</h6>
              <a href="#" class="py-1 tiny font-weight-semibold ms-auto btn btn-link link-primary">View all<svg class="ms-1" data-name="icons/tabler/chevron right" xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 16 16">
                <rect data-name="Icons/Tabler/Chevron Right background" width="16" height="16" fill="none"></rect>
                <path d="M.26.26A.889.889,0,0,1,1.418.174l.1.086L8.629,7.371a.889.889,0,0,1,.086,1.157l-.086.1L1.517,15.74A.889.889,0,0,1,.174,14.582l.086-.1L6.743,8,.26,1.517A.889.889,0,0,1,.174.36Z" transform="translate(4)" fill="#0D6EFD"></path>
              </svg></a>
            </div>
            <div class="card-body px-3 px-md-4 pb-2 pt-0">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar30.png" alt="Avatars">
                        <span class="avatar-status avatar-success">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Amarachi Nkechi</a>
                      </h6>
                      <p class="card-text small text-gray-600">Uploaded Team.zip file on shared cloud</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">Just now</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar31.png" alt="Avatars">
                        <span class="avatar-status avatar-warning">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Lara Madrigal</a>
                      </h6>
                      <p class="card-text small text-gray-600">Shared a new blog post Design Systems</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">3m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar32.png" alt="Avatars">
                        <span class="avatar-status avatar-danger">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Ray Cooper</a>
                      </h6>
                      <p class="card-text small text-gray-600">Changed his profile photo</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">1 hour ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="assets/img/dashboard/avatar33.png" alt="Avatars">
                        <span class="avatar-status avatar-offline">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Linzell Bowman</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated his stastus to Available</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">2 days ago</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-7 mb-4">
          <div class="card h-100 rounded-12 shadow-dark-80">
            <div class="px-3 px-md-4 py-3 border-bottom border-gray-200 d-flex align-items-center">
              <h6 class="mb-0 py-1">Checklist</h6>
              <div class="ms-auto">
                <select class="form-select form-select-sm">
                  <option>Today</option>
                </select>
              </div>
            </div>
            <div class="card-body px-3 px-md-4">
              <div class="check-list">
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label ms-2" for="flexCheckDefault">
                    Work on new kit style guide and intro
                  </label>
                </div>
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                  <label class="form-check-label ms-2" for="flexCheckDefault1">
                    Download all file assets for Sketch and Figma
                  </label>
                </div>
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                  <label class="form-check-label ms-2" for="flexCheckDefault2">
                    Upgrade network and fix latency issues
                  </label>
                </div>
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                  <label class="form-check-label ms-2" for="flexCheckDefault3">
                    Organize and plan next week work
                  </label>
                </div>
                <div class="form-check mb-2 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                  <label class="form-check-label ms-2" for="flexCheckDefault4">
                    Launch müse Bootstrap 5 template
                  </label>
                </div>
              </div>
            </div>
            <div class="row g-0 align-items-center checklist-box px-4 py-3 border-top border-gray-200">
              <div class="col">
                <textarea class="form-control py-0" rows="1" placeholder="Add new item..."></textarea>
              </div>
              <div class="col-auto">
                <button class="btn btn-sm btn-primary text-uppercase rounded">Add Item</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include('page_includes/dashboard_footer.php')
?>
