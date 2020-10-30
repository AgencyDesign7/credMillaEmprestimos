<ul class="sidebar-menu">
      <?php 
            if($_SESSION['permissionsVisitors'] === 1){
              echo '
                <li class="header">MENU PRINCIPAL</li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Visitantes</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li class="active"><a href="./visitorsTable.php"><i class="fa fa-circle-o"></i> Total Visitantes</a></li>
                    <li><a href="./visitorsUniqueTable.php"><i class="fa fa-circle-o"></i>Total único visitante</a></li>
                  </ul>
                </li>';
            }
        ?>
        <?php 
            if($_SESSION['permissionsUsers'] === 1){
              echo '
              <li class="header">CONTROLE USUÁRIOS</li>
              <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
              <li class="treeview">
              <a href="allUser.php">
                <i class="fa fa-user"></i> <span>Todos Usuários</span>
              </a>
            </li>
            <li class="treeview">
              <a href="registerUser.php">
                <i class="fa fa-user-plus"></i> <span>Adicionar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="editUser.php">
                <i class="fa fa-user"></i> <span>Editar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="deleteUser.php">
                <i class="fa fa-user-times"></i> <span>Excluir</span>
              </a>
            </li>
            </ul>
        </li>
              ';
            }
            
        ?>
      <?php
        if($_SESSION['permissionsChat'] === 1){
          echo  '<li class="header">CHAT CREDMILLA</li>
          <li>
            <a href="./chatSupport.php" class="chat-queue">
              <i class="fa fa-comments"></i> <span>Chat</span>
  
            </a>
          </li>';
        }
       ?>
      </ul>