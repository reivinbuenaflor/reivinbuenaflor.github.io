<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/router.php';

if(isset($_GET['thread']))
{
	$id = $_GET['thread'];
	$view = new ThreadView();
}
if(isset($_POST['submit']))
{
	$submitComment = new CommentCont();
	$submitComment->onCommentSubmit($_POST['reply'],$_POST['id']);
}
$id = $_GET['thread'];
$comment = new CommentView();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $view->threadShowTitle($id);?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="stylesheet/thread-style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../public/home.php">
        Forum
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          	<li class="nav-item active">
            	<a class="nav-link" href="../public/home.php">Home <span class="sr-only">(current)</span></a>
          	</li>
        </ul>
        <ul class="navbar-nav">
        	<div>
        		
        	</div>
        </ul>
        <ul class="navbar-nav ml-auto">
    		<form class="form-inline">
    			<input class="form-control" type="search" placeholder="Search" aria-label="Search">
    			<button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit">Search</button>
			</form>
          	<div class="dropdown">
            	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	 	<?= $_SESSION['user']?>
            	</button>
            	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
             	 	<a class="dropdown-item" href="../public/profile.php">Profile</a>
            		<a class="dropdown-item" href="../app/config/logout.php">Logout</a>
    			</div>
          	</div>
        </ul>
      </div>
    </nav>
	<div class="container">
			<div class="title">
				<h5 class="d-flex flex-row"><?php echo $view->threadShowTitle($id);?> <button class="btn btn-danger ml-auto button-pad" onclick="document.location.href='../public/home.php'"> Close </button></h5>
			</div>
			<br>
				<div class="card h-100">
					<div class="card-body">
						<ul class="nav nav-pills card-header-pills">
							<li class="nav-item">
	        					<a class="nav-link disabled"><p class="font-weight-light">Posted by</p></a>
	      					</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><?php echo $view->threadShowCreatedBy($id);?></a>
							</li>
							<li class="nav-item">
	        					<a class="nav-link disabled"><p class="font-weight-light"><?php echo $view->threadShowDateCreated($id);?></p></a>
	      					</li>
						</ul>
						<p class="font-weight-normal"><?php echo $view->threadShowContent($id);?></p>
						<br>
						<form action="thread.php" method="post">
							<p class="font-weight-light">Comment as <?= $_SESSION['user']?></p>
							<div class="form-group">
						    	<textarea class="form-control" placeholder = "What are your thoughts?"rows="3" name="reply" required></textarea>
							</div>
							<input type="hidden" name="id" value="<?php echo $_GET['thread']?>">
							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</form>
					</div>	
				</div>	
			<div class="comment-border">
				<p class="font-weight-light">Comments</p>
			</div>	
			<?php echo $comment->showComment($id);?>	
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>