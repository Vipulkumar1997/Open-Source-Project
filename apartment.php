<?php
    include'header.php';
    include'connect.php';
?>
 <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio">
      <div class="container pt-5">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
            <h2 class="font-weight-bold">Search your apartment here !!</h2>
            </ul>
          </div>
        </div>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form class="form-group" action="#" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-5 form-group">
                    <input type="text" name="location" class="form-control" placeholder="Enter Location" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                  </div>

                  <div class="col-md-5 form-group">
                    <input type="text" name="price" class="form-control" id="email" placeholder="Enter Price" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                  <div class="text-center"><input class="btn btn-outline-danger w-auto btn-block text-center" type="submit" value="Search" name="submit"></div>
              </div>
            </form>
          </div>
        </div>
        <?php

            if(isset($_POST['submit'])){
                    
                $location = $_POST["location"];
                $price = $_POST["price"];

                $id = 0;
                $sql = "SELECT * FROM home where location like '%".$location."%' or price <= $price";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="row blog justify-content-between align-items-center" data-aos="fade-up">';
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="img-fluid" style="height:300px; width:600px;" />';
                    //   echo '<a href="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" data-gall="portfolioGallery" class="venobox preview-link" title="apartment"><i class="bx bx-plus"></i></a>';
                    echo '<div class="portfolio-info">';
                    // echo "<br> - Name: "" " . $row["price"] ." " . $row["discription"] ." ". $row["rating"] . "<br>";
                    echo '<h4>'. $row["location"]. '</h4>';
                    echo '<p>'. $row["discription"] .'</p>';
                    echo '<p style="color:red;" class="font-weight-bold"> RS.'. $row["price"] .'</p>';
                    $id = $row["id"];
                    // echo $id;  
                    echo' <form id="form1" name="form1" method="post" action="viewDetails.php">
                            <input type="hidden" name="id" id="'. $id .'" value="'. $id .'" />
                            <input type="submit" class="text-center btn btn-outline-info" name="book" id="'. $id .'" value="Book Now" />
                            </form>';
                            // echo '<a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>';
                    echo '</div>';
                    echo '</div>';
                    // }
                   
                    // } else {
                    //     echo "0 results";
                    }
                } else {
                        echo'
                            <div class="container p-5 bg-soft">
                                <h4 class="text-danger">Sorry !! 0 Record found </h4>
                            </div>
                        ';
                    }
            }
          ?>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
<?php
    include'footer.php';
?>