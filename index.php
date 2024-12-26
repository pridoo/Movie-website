<?php
session_start();
include('admin/includes/connection.php');

$query = $conn->query("SELECT * FROM movies limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
include 'admin/includes/movies.php';
include 'admin/includes/packages.php';
$movies = json_decode(getMovie($conn));
$packages = json_decode(getPackage($conn));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <title>CineFlix - Home</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
  <?php
  include_once 'header.php';
  ?>

  <div class="home_container">

    <!-- <section>

      <div>

        <div>

          <select name="genre" class="genre">
            <option value="all genres">All genres</option>
            <option value="action">Action</option>
            <option value="adventure">Adventure</option>
            <option value="animal">Animal</option>
            <option value="animation">Animation</option>
            <option value="biography">Biography</option>
          </select>

          <select name="year" class="year">
            <option value="all years">All the years</option>
            <option value="2022">2022</option>
            <option value="2020-2021">2020-2021</option>
            <option value="2010-2019">2010-2019</option>
            <option value="2000-2009">2000-2009</option>
            <option value="1980-1999">1980-1999</option>
          </select>

        </div>

        <div>

          <input type="radio" name="grade" id="featured" checked>
          <label for="featured">Featured</label>

          <input type="radio" name="grade" id="popular">
          <label for="popular">Popular</label>

          <input type="radio" name="grade" id="newest">
          <label for="newest">Newest</label>

          <div class="checked-radio-bg"></div>

        </div>

      </div>
    </section> -->

    <main>

      <div class="selection">
        <h2>Latest Releases</h2>
        <a href="#" class="selection_movie btn_select"><span><i class="fas fa-play-circle"></i></span>Movies</a>
        <a href="#" class="selection_package btn_select"><span><i class="fas fa-burger-soda"></i></span>Foods</a>
      </div>

      <section class="movies_sec">
        <h2>Movies List</h2>
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Title</th>
              <th>Theme</th>
              <th>Price</th>
            </tr>
          </thead>

          <tbody>
            <?php
            sort($movies);
            foreach ($movies as $movie) {
              echo "
                                  <tr class='table_element'>
                                  <td><img src='admin/images/movies/$movie->movie_pic' height='150px' width='150px'></td>
                                  <td>$movie->movie_name</td>
                                  <td>$movie->theme</td>
                                  <td>$movie->movie_price</td>
                                  <td><a href='add-book.php' class='btn btn_book'><span><i class='fas fa-cart-plus'></i></span>Book Now</a></td>
                                  </tr>
                              ";
            }
            ?>
          </tbody>
        </table>
      </section>

      <section class="packages_sec">
        <h2>Package List</h2>
        <table class="table">
          <tr>
            <th></th>
            <th>Name</th>
            <th>Price</th>
            <th></th>
          </tr>
          <?php
          sort($packages);
          foreach ($packages as $package) {
            echo "
                                <tr class='table_element'>
                                <td><img src='admin/images/foods/$package->package_pic' height='150px' width='150px'></td>
                                <td>$package->package_name</td>
                                <td>$package->package_price</td>
                                <td><a href='add-book.php' class='btn btn_book'><span><i class='fas fa-cart-plus'></i></span>Book Now</a></td>
                                </tr>
                            ";
          }
          ?>
        </table>
      </section>

    </main>

    <?php
    include_once 'footer.php';
    ?>

  </div>

  <script src="js/index.js" defer></script>
</body>

</html>