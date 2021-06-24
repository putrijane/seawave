        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fish"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SEAWAVE </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">

            </div>

            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-eye"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "  SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu` 
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC 
                            ";
            $menu = $this->db->query($queryMenu)->result_array();


            ?>
            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                </li>


                <!-- menyiapkan sub-menu sesuai menu-->
                <?php
                $menuid = $m['id'];
                $querySubMenu = "SELECT *
                                     FROM `user_sub_menu` JOIN `user_menu`
                                       ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuid 
                                      AND `user_sub_menu`.`is_active` = 1
                                    ";

                $submenu = $this->db->query($querySubMenu)->result_array();

                ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">
                    profil

                </div>
                </li>
                <?php foreach ($submenu as $sm) : ?>
                    <?php if ($title ==  $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>

                    <?php endforeach; ?>





                <?php endforeach; ?>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">
                    menu
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="info">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Info produk</span></a>
                </li>

                <!-- Divider
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">
                    Menu
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="cektarif">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Cek Tarif</span></a> -->
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">

                </div>
                <li class="nav-item">
                    <a class="nav-link" href="about">
                        <i class="fas fa-info-circle"></i>
                        <span>About</span></a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">



        </ul>