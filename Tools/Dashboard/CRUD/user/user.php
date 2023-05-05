      <!doctype html>
      <html lang="en">
         <head>
            <?php include '../../../partials/head.php'; ?>
            <title>Liste de User</title>
            <style>
               img{
               max-width: 253%;
               border-radius: 40px;
               padding: 0 2% 0 0;
               margin: -8px 0px 0px -10px;
               }
               .dashboard-wrapper{
               margin-top: 5%;
               }
            </style>
         </head>
         <body>
            <?php
               include '../../../../connection/connection.php'; 
               
               
                        
                        
                        ?>
            <!-- ============================================================== -->
            <!-- main wrapper -->
            <!-- ============================================================== -->
            <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <?php include '../../../partials/navbar.php'; ?>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <?php include '../../../partials/slidebar.php'; ?>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
               <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                  <div class="card">
                     <h5 class="card-header">Liste de User</h5>
                     <div class="card-body p-0">
                        <div class="table-responsive">
                           <table class="table">
                              <thead class="bg-light">
                                 <tr class="border-0">
                                    <th class="border-0"></th>
                                    <th class="border-0">Id_User </th>
                                    <th class="border-0">Nom  </th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Telephone</th>
                                    <th class="border-0">Mot de Pass</th>
                                    <th class="border-0">Type</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    while ($i=mysqli_fetch_array($admin))
                                    {
                                    ?>
                                 <tr>
                                    <td><span class="social-sales-icon-circle facebook-bgcolor mr-2"><img src="../../../../../assets/img/team/<?php echo $i["img"]; ?>.jpg" alt=""></span></td>
                                    <td><span class="badge-dot badge-brand mr-1"></span><?php echo $i["iduser"]; ?> </td>
                                    <td><?php echo $i["nom"]; ?>  </td>
                                    <td><?php echo $i["email"]; ?> </td>
                                    <td><?php echo $i["tel"]; ?> </td>
                                    <td><?php echo $i["mdp"]; ?> </td>
                                    <td><?php echo $i["type"]; ?> </td>
                                    <td>
                                       <?php
                                          echo "<a href='update.php?iduser=".$i["iduser"]."'>Modifier</a> | <a href='supp.php?iduser=".$i["iduser"]."'>Supprimer</a></td>";
                                          ?>
                                    </td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                  <div class="card">
                     <h5 class="card-header">Liste de Commande</h5>
                     <div class="card-body p-0">
                        <div class="table-responsive">
                           <table class="table">
                              <thead class="bg-light">
                                 <tr class="border-0">
                                    <th class="border-0"></th>
                                    <th class="border-0">Id_User </th>
                                    <th class="border-0">Nom  </th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Telephone</th>
                                    <th class="border-0">Mot de Pass</th>
                                    <th class="border-0">Type</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    while ($i=mysqli_fetch_array($User))
                                    {
                                    ?>
                                 <tr>
                                    <td><span class="social-sales-icon-circle facebook-bgcolor mr-2"><img src="../../../../../assets/img/team/<?php echo $i["img"]; ?>.jpg" alt=""></span></td>
                                    <td><span class="badge-dot badge-brand mr-1"></span><?php echo $i["iduser"]; ?> </td>
                                    <td><?php echo $i["nom"]; ?>  </td>
                                    <td><?php echo $i["email"]; ?> </td>
                                    <td><?php echo $i["tel"]; ?> </td>
                                    <td><?php echo $i["mdp"]; ?> </td>
                                    <td><?php echo $i["type"]; ?> </td>
                                    <td>
                                       <?php
                                          echo "<a href='update.php?iduser=".$i["iduser"]."'>Modifier</a> | <a href='supp.php?iduser=".$i["iduser"]."'>Supprimer</a></td>";
                                          ?>
                                    </td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end main wrapper  -->
            <!-- ============================================================== -->
            <!-- Optional JavaScript -->
            <?php include '../../../partials/scripte.php'; ?>
         </body>
      </html>