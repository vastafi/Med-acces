
<header class="ec-main-header" id="header">
  <nav class="navbar navbar-static-top navbar-expand-lg">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle"></button>

      <img src="assets/img/icons/translate.svg" alt="user" style="height: 30px; width: auto; margin-top: 16px; margin-right: 10px;">
      <div id="google_translate_element"></div>

    <!-- search form -->
    <div class="search-form d-lg-inline-block"> </div>

    <!-- navbar right -->
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <!-- User Account -->

        <li class="dropdown user-menu">
          <?php
          $aid=$_SESSION['odmsaid'];
          $sql="SELECT * from  tbladmin where id=:aid";
          $query = $dbh -> prepare($sql);
          $query->bindParam(':aid',$aid,PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          if($query->rowCount() > 0)
          {
            foreach($results as $row)
            { 
              ?>
              <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <?php 
                if($row->photo=="avatar15.jpg")
                { 
                  ?>
                  <img src="../assets/img/user/user.jpg" class="user-image" alt="User Image" />
                  <?php 
                } else { 
                  ?>
                  <img class="user-image" alt="User Image" src="profileimages/<?php  echo $row->photo;?>" alt="">
                  <?php 
                } ?>
                
              </button>
              <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                <!-- User image -->

                <li class="dropdown-header">
                  <?php 
                  if($row->photo=="avatar15.jpg")
                  { 
                    ?>
                    <img src="../assets/img/user/user.jpg" class="img-circle" alt="User Image" />
                    <?php 
                  } else { 
                    ?>
                    <img class="img-circle" alt="User Image" src="profileimages/<?php  echo $row->photo;?>" alt="">
                    <?php 
                  } ?>
                  
                  <div class="d-inline-block">
                    <?php  echo $row->firstName;?>&nbsp;<?php  echo $row->lastName;?> <small class="pt-1"><?php  echo $row->email;?></small>
                  </div>
                </li>
                
                <li>
                  <a href="user-profile.php">
                    <i class="mdi mdi-account"></i> My Profile
                  </a>
                </li>
                <li class="right-sidebar-in">
                  <a href="javascript:0"> <i class="mdi mdi-settings-outline"></i> Setting </a>
                </li>
                <li class="dropdown-footer">
                  <a href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                </li>

              </ul>
              <?php
            }
          } ?>
        </li>
        <li class="dropdown notifications-menu custom-dropdown">
          <button class="dropdown-toggle notify-toggler custom-dropdown-toggler">
            <i class="mdi mdi-bell-outline"></i>
          </button>

          <div class="card card-default dropdown-notify dropdown-menu-right mb-0">
            <div class="card-header card-header-border-bottom px-3">
              <h2>Notifications</h2>
            </div>

            <div class="card-body px-0 py-0">
              <ul class="nav nav-tabs nav-style-border p-0 justify-content-between" id="myTab"
              role="tablist">
              <li class="nav-item mx-3 my-0 py-0">
                <a href="#" class="nav-link active pb-3" id="home2-tab"
                data-bs-toggle="tab" data-bs-target="#home2" role="tab"
                aria-controls="home2" aria-selected="true">All (10)</a>
              </li>

              <li class="nav-item mx-3 my-0 py-0">
                <a href="#" class="nav-link pb-3" id="profile2-tab" data-bs-toggle="tab"
                data-bs-target="#profile2" role="tab" aria-controls="profile2"
                aria-selected="false">Msg (5)</a>
              </li>

              <li class="nav-item mx-3 my-0 py-0">
                <a href="#" class="nav-link pb-3" id="contact2-tab" data-bs-toggle="tab"
                data-bs-target="#contact2" role="tab" aria-controls="contact2"
                aria-selected="false">Others (5)</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent3">
              <div class="tab-pane fade show active" id="home2" role="tabpanel"
              aria-labelledby="home2-tab">
              <ul class="list-unstyled" data-simplebar style="height: 360px">
                <li>
                  <a href="javscript:void(0)"
                  class="media media-message media-notification">
                  <div class="position-relative mr-3">
                      <i class="mdi mdi-account-multiple-check font-size-20"></i>
                    <span class="status away"></span>
                  </div>
                  <div class="media-body d-flex justify-content-between">
                    <div class="message-contents">
                      <h4 class="title">Felicia</h4>
                      <p class="last-msg">We have an emergency, the medicines are finished</p>

                      <span
                      class="font-size-12 font-weight-medium text-secondary">
                      <i class="mdi mdi-clock-outline"></i> 30 min
                      ago...
                    </span>
                  </div>
                </div>
              </a>
            </li>

            <li>
              <a href="javscript:void(0)"
              class="media media-message media-notification media-active">
              <div class="position-relative mr-3">
                  <i class="mdi mdi-account-multiple-check font-size-20"></i>
                <span class="status active"></span>
              </div>
              <div class="media-body d-flex justify-content-between">
                <div class="message-contents">
                  <h4 class="title">Andrei</h4>
                  <p class="last-msg">I need to order some medicine</p>

                  <span
                  class="font-size-12 font-weight-medium text-white">
                  <i class="mdi mdi-clock-outline"></i> Just
                  now...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="position-relative mr-3">
                <i class="mdi mdi-account-multiple-check font-size-20"></i>
              <span class="status away"></span>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Andra</h4>
                <p class="last-msg">We have completed the purchases, we can move on.</p>

                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs
                  ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification event-active">
            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
              <i class="mdi mdi-calendar-check font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Upcomming event added</h4>
                <p class="last-msg font-size-14">20/March/2023 (1pm - 2pm)</p>

                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 10 min ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">

            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
              <i class="mdi mdi-chart-areaspline font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Yearly Sales report</h4>
                <p class="last-msg font-size-14">We have some huge sales this month</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
              <i
              class="mdi mdi-account-multiple-check font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">New request</h4>
                <p class="last-msg font-size-14">Add Covas Daniel as your contact. </p>

                <span
                class="my-1 btn btn-sm btn-success">Accept</span>
                <span
                class="my-1 btn btn-sm btn-secondary">Delete</span>

                <span class="font-size-12 font-weight-medium text-secondary d-block">
                  <i class="mdi mdi-clock-outline"></i> 5 min ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-danger text-white">
              <i class="mdi mdi-server-network-off font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Server overloaded</h4>
                <p class="last-msg font-size-14">We apologize, but the data will be updated a little later.</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 30 min ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">

            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-purple text-white">
              <i class="mdi mdi-playlist-check font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Task complete</h4>
                <p class="last-msg font-size-14">The data and tasks were executed correctly and completely.</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 2 hrs
                  ago...
                </span>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>

    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile2-tab">
      <ul class="list-unstyled" data-simplebar style="height: 360px">
        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="position-relative mr-3">
                <i class="mdi mdi-account-multiple-check font-size-20"></i>
              <span class="status away"></span>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Sara</h4>
                <p class="last-msg">I would like to order some products from you.</p>

                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="position-relative mr-3">
                <i class="mdi mdi-account-multiple-check font-size-20"></i>
              <span class="status away"></span>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Alex</h4>
                <p class="last-msg">I like how you formatted everything, it's so intuitive and easy everything.</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs
                  ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification media-active">
            <div class="position-relative mr-3">
                <i class="mdi mdi-account-multiple-check font-size-20"></i>
              <span class="status active"></span>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Daniel</h4>
                <p class="last-msg">I need some products...</p>

                <span class="font-size-12 font-weight-medium text-white">
                  <i class="mdi mdi-clock-outline"></i> Just now...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="position-relative mr-3">
                <i class="mdi mdi-account-multiple-check font-size-20"></i>
              <span class="status away"></span>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Alex</h4>
                <p class="last-msg">Medicines are so essential and useful for us...</p>

                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="position-relative mr-3">
                <i class="mdi mdi-account-multiple-check font-size-20"></i>
                <span class="status away"></span>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Vitalie</h4>
                <p class="last-msg">Thank you very much for the products, they are very perfect and suit both me and my family.</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs ago...
                </span>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>

    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
      <ul class="list-unstyled" data-simplebar style="height: 360px">
        <li>
          <a href="javscript:void(0)" class="media media-message media-notification event-active">

            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
              <i class="mdi mdi-calendar-check font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Upcomming event added</h4>
                <p class="last-msg font-size-14">03/April/2020 (1pm - 2pm)</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 10 min ago...
                </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">
            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
              <i class="mdi mdi-chart-areaspline font-size-20"></i>
            </div>
            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">New Sales report</h4>
                <p class="last-msg font-size-14">The best prices, and the biggest sales.</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 1 hrs
                  ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">

            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
              <i class="mdi mdi-account-multiple-check font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">New Request</h4>
                <p class="last-msg font-size-14">Add Valentina Tina as your contact.</p>
                <span class="my-1 btn btn-sm btn-success">Accept</span>
                <span class="my-1 btn btn-sm btn-secondary">Delete</span>
                <span class="font-size-12 font-weight-medium text-secondary d-block">
                  <i class="mdi mdi-clock-outline"></i> 5 min ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">

            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-danger text-white">
              <i class="mdi mdi-server-network-off font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">Server overloaded</h4>
                <p class="last-msg font-size-14">Wait some time and we will reconnect...</p>
                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 30 min ago...
                </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="javscript:void(0)" class="media media-message media-notification">

            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-purple text-white">
              <i class="mdi mdi-playlist-check font-size-20"></i>
            </div>

            <div class="media-body d-flex justify-content-between">
              <div class="message-contents">
                <h4 class="title">New Task complete</h4>
                <p class="last-msg font-size-14">The task was executed successfully</p>

                <span class="font-size-12 font-weight-medium text-secondary">
                  <i class="mdi mdi-clock-outline"></i> 2 hrs ago...
                </span>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>

    <ul class="dropdown-menu dropdown-menu-right d-none">
      <li class="dropdown-header">You have 5 notifications</li>
      <li>
        <a href="#">
          <i class="mdi mdi-account-plus"></i> New user registered
          <span class=" font-size-12 d-inline-block float-right"><i
            class="mdi mdi-clock-outline"></i> 10 AM
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="mdi mdi-account-remove"></i> User deleted
          <span class=" font-size-12 d-inline-block float-right"><i
            class="mdi mdi-clock-outline"></i> 07 AM
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
          <span class=" font-size-12 d-inline-block float-right"><i
            class="mdi mdi-clock-outline"></i> 12 PM
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="mdi mdi-account-supervisor"></i> New client
          <span class=" font-size-12 d-inline-block float-right"><i
            class="mdi mdi-clock-outline"></i> 10 AM
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="mdi mdi-server-network-off"></i> Server overloaded
          <span class=" font-size-12 d-inline-block float-right"><i
            class="mdi mdi-clock-outline"></i> 05 AM
          </span>
        </a>
      </li>
      <li class="dropdown-footer">
        <a class="text-center" href="#"> View All </a>
      </li>
    </ul>
          <li class="right-sidebar-in right-sidebar-2-menu">
              <i class="mdi mdi-settings-outline mdi-spin"></i>
          </li>
  </nav>
</header>