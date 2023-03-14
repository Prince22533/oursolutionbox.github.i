<?php 
  session_start();
  include "config.php";
  if(!isset($_SESSION['username'])){
    header("location: ");
  }
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App | CodingNepal</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <?php  
  include "config.php";

  

  $sql = "SELECT post.description, post.post_img, user.user_id, user.username, user.First_Name , user.user_img From post LEFT JOIN user ON post.author = user.user_id ORDER BY post.post_id DESC "; 

  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_assoc($result)){  
  ?>
  <section class="home-post my-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <img src="admin/user_image/<?php echo $row['user_img'];?>" class="home-icon">
          <div class="profile-name">
            <h3><?php echo $row['First_Name']; ?></h3>
          </div>
        </div>

      <div class="chat-box">
      </div>
     
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="col form-group" >
          <input type="text" placeholder="Search...." name="search" class="form-control form-control-lg">
        </div>
      </form>
    </div>
    </div>
    </section>
<?php 
}
}
 ?>

  <script src="javascript/chat.js"></script>

</body>
</html>
