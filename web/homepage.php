<html lang="en">
	<head>
		<title>Jake Batson's Homepage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="homepagestyle.css">
		<script src="homepagescript.js"></script>
	</head>
	<body>
		<div id="main">
			<div id="header">
				<h1>Batson</h2>
				<h2>My Homepage</h2>
			</div>
			<div id="nav">
				<table id ="navigation">
					<tr>
						<th><a href="homepage.php">Homepage</a></th>
						<th><a href="index.html">Assignment Index</a></th>					
					</tr>
				</table>
			</div>
			<div id="content">
				<h3>About Me</h3>
				<p id="intro">
					I am from San Diego, California. I'm studying Computer Science mainly because I accidentally took<br>
					the first course for the major and ended up loving it. I am a huge sports fan, mainly football and <br>
					basketball. I enjoy playing sports, lifting weights, playing video games, and of course programming.<br>
					Since I usually share these interests with most people I would like to use this page to show another<br>
					interest that not many know I have: 3D Modeling.<br>
				</p>
				<hr>
				<h3>3D Models</h3>
				<p>
					Click on a picture to learn more.
				</p>
				<div id="3d">
					<div id="man" class="imgs" onclick="showDescription('manDescription')">
						<img src="man.png" alt="3d Man" height="180" width="320">
					</div>
					<div id="manDescription" class="descriptions">
						<p>
							<b>Man</b><br>
							This is one of my most recent models. I have often struggled<br> 
							with making realistic human bodies, but this has been my most<br>
							successful attempt. Obviously it is not very detailed, but I<br>
							plan to add more details in the future.
						</p>
					</div>
						<div class="close">
					</div><br><br>
					<div id="skeleton" class="imgs" onclick="showDescription('skeletonDescription')">
						<img src="skeleton.png" alt="3d Skeleton" height="180" width="320">
					</div>
					<div id="skeletonDescription" class="descriptions">
						<p>
							<b>Skeleton</b><br>
							This is likely the model that took me the longest to make.<br>
							I became interested in making it when I was learning about<br>
							the skeletal system in a science class. I made each individual<br>
							bone and then put them all together, while trying to be as<br>
							accurate as possible.
						</p>
					</div>
					<div class="close">
					</div><br><br>
					<div id="tiefighter" class="imgs" onclick="showDescription('tiefighterDescription')">
						<img src="tiefighter.png" alt="3d TieFighter" height="180" width="320">
					</div>
					<div id="tiefighterDescription" class="descriptions">
						<p>
							<b>Tie Fighter</b><br>
							This was one of the most fun models to make. I am a huge Star<br>
							Wars fan so I decided I should try to make something cool from<br>
							one of the movies. I decided to make a Tie Fighter because I <br>
							thought that they were the coolest ships. Out of the three models<br>
							this one was the easiest to make.
						</p>
					</div>
					<div class="close">
					</div><br><br>
				</div>		
			</div>
<?php
echo "Today's date: " . date("m/d/Y") . "<br>";
?>
		</div>
	</body>
</html>