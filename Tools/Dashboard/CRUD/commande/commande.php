<!doctype html>
<html lang="en">
         <head>
            <!-- Required meta tags -->
            <?php include '../../../partials/head.php'; ?>
            <title>Liste de Commande</title>
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
                     <h5 class="card-header">Liste de Commande</h5>
                     <div class="card-body p-0">
                        <div class="table-responsive">
                           <table class="table">
                              <thead class="bg-light">
                                 <tr class="border-0">
                                    <th class="border-0"></th>
                                    <th class="border-0">Id_Commande </th>
                                    <th class="border-0">Nom  </th>
                                    <th class="border-0">Telephone</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Nom Livre</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    while ($i=mysqli_fetch_array($Commande))
                                    {
                                    ?>
                                 <tr>
                                    <td><span class="social-sales-icon-circle facebook-bgcolor mr-2"><img src="../../../../../assets/img/portfolio/<?php echo $i["img"]; ?>.jpg" alt=""></span></td>
                                    <td><span class="badge-dot badge-brand mr-1"></span><?php echo $i["id"]; ?> </td>
                                    <td><?php echo $i["nom"]; ?>  </td>
                                    <td><?php echo $i["tel"]; ?> </td>
                                    <td><?php echo $i["email"]; ?> </td>
                                    <td><?php echo $i["noml"]; ?> </td>
                                    <td>
                                       <?php
                                          echo " <a href='supp.php?id=".$i["id"]."'>Supprimer</a></td>";
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