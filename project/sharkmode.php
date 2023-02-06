<!DOCTYPE html>
<html lang="">
  <head>
    <style>
      .container {
        text-align: center;
        font-family: Verdana, sans-serif;
      }
	  .sharkpropaganda {
		margin: auto;
		width: 55%;
		padding: 20px;
		transform: translateY(-50%, -50%);
	  }
      .prompt {
        margin: auto;
        width: 45%;
        padding: 15px;
        overflow-wrap: break-word;
        border: 3px solid lightgray;
        transform: translateY(-50%, -50%);
      }
      .button {
        background-color: white;
        font-size: 20px;
        width: 23%;
        padding: 10px;
        border: 3px solid lightgray;
      }
      button {
        margin: 8px;
      }
      button:active {
        background-color: lightgray;
        border: 3px solid white;
      }
      img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 17%;
        padding: 10px;
      }
	  p {
		font-size:10px;
	  }
      body {
        background-image: url("assets/sharkbackground.png");
      }
      main {
        position: absolute;
        top: 10%;
        left: 10%;
        -ms-transform: translateY(-50%, -50%);
        transform: translateY(-50%, -50%);
        width: 80%;
        height: 80%;
        border: 10px solid lightgray;
        background-color: white;
      }
    </style>
    <meta charset="utf-8">
    <title>Shark Mode</title>
  </head>
  <body>
    <header></header>
    <main>
      <div class="container">
        <img src="assets/sharkmode.png" alt="Cartoonish drawing of a shark. Its gills are the Royal Hackathon logo" />
        <div class="prompt">
          <h1 id="promptSpace"></h1>
        </div>
        <button class="button" id="normal">Normal mode</button>
        <button class="button" id="SHARKMODE!!!">Shark mode</button>
		<div class="sharkpropaganda">
			<p>Sharks are a beautiful creature with a ruined reputation. They very rarely attack humans, and they never do so deliberately. In fact, many species of sharks are too small to do humans any harm. Unfortunately, 100 million sharks are killed by humans each year, causing the shark population to drop. Sharks have been around for at least 420 million years: longer than even trees. Also, sharks love to suggest ideas for hackathons. We can’t do anything about the rest of the issues affecting sharks, but we can let them pursue their passion. Sharkmode!</p>
		</div>
	  </div>
    </main>
    <footer></footer>
	<script>
	function get_information(link, callback) {
		var xhr = new XMLHttpRequest();
		xhr.open("GET", link, true);
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4) {
				callback(xhr.responseText);
			}
		};
		xhr.send(null);
	}

	function generate(sharkmode = false){
		get_information("https://jkybett.uk/sharkmode.php", function(text) {
			var div = document.getElementById("promptSpace");
			div.innerHTML = text;
			var page = sharkmode ? "http://ec2-13-42-12-253.eu-west-2.compute.amazonaws.com/output_shark.txt" : "http://ec2-13-42-12-253.eu-west-2.compute.amazonaws.com/output_normal.txt";
			get_information(page, function(text) {
				var div = document.getElementById("promptSpace");
				div.innerHTML += " "+text;
				get_information("https://jkybett.uk/languages.json", function(text) {
					var div = document.getElementById("promptSpace");
					text=JSON.parse(text);
					text = text[Math.floor(Math.random() * text.length)];
					div.innerHTML += " in "+text;
					div.innerHTML = div.innerHTML.charAt(0).toUpperCase() + div.innerHTML.slice(1)
					// Do something with the div here, like inserting it into the page
				});
			});
			// Do something with the div here, like inserting it into the page
		});
	}

	generate();
	document.getElementById("normal").onclick = function(){generate()};
	document.getElementById("SHARKMODE!!!").onclick = function(){generate(true)};
	</script>
  </body>
</html>

<?php

$command = escapeshellcmd('python3 ./selenium_to_scratch.py');
$output = shell_exec($command);
echo $output;

?>
