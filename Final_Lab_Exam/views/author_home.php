<?php
	require_once('../php/session_header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Welcome Home!<?=$_SESSION['username']?></h1> 
	<a href="../views/create_post.php?username=<?=$_SESSION['username']?>">Create New Post</a> |
	<a href="../views/all_post.php?username=<?=$_SESSION['username']?>">All Posts</a> |
	<a href="../php/logout.php">Logout</a> 
</body>
</html>