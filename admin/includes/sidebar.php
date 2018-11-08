<div class="sidebar" data-background-color="white" data-active-color="info">
    <div class="logo">
        <a href="<?php echo $basepath; ?>dashboard" class="simple-text logo-mini">
            CC
        </a>
        <a href="<?php echo $basepath; ?>dashboard" class="simple-text logo-normal">
            CConversion
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <?php $sql = "SELECT * from  admin ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {       ?>
            <div class="photo">
                <img src="<?php echo $basepath ?>packageimages/<?php echo htmlentities($result->profileimg); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false" aria-controls="collapseExample">
                    <span>
                        <?php echo htmlentities($result->Name); ?>
                        <b class="dropdown-toggle"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="profile" class="nav-link">
                                <span class="sidebar-mini">Mp</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="edit-profile" class="nav-link">
                                <span class="sidebar-mini">Ep</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php }} ?>
        </div>
        <ul class="nav flex-column">

            <li <?php if($url == 'dashboard') {echo 'class="nav-item active"';} ?> class="nav-item">
                <a class="nav-link" href="<?php echo $basepath ?>dashboard">
                    <i class="ti-panel"></i> <p>Dashboard</p>
                </a>
            </li>
            
            <li <?php if($url == 'manage-conactusquery') {echo 'class="nav-item active"';} ?> class="nav-item">
                <a class="nav-link" href="<?php echo $basepath ?>manage-conactusquery">
                    <i class="ti-help-alt"></i> <p>ContactUs Query</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $basepath ?>logout">
                    <i class="ti-power-off"></i> <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>