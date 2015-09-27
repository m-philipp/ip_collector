
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $bp; ?>favicon.ico">

    <title>IP Collector</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $bp; ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $bp; ?>style.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="<?php echo $bp; ?>">Home</a></li>
            <li role="presentation"><a href="<?php echo $bp; ?>view">View</a></li>
            <li role="presentation"><a href="<?php echo $bp; ?>imprint">Imprint</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">IP Collector</h3>
      </div>

        <?php print($content); ?>
	  

      <footer class="footer">
        <p>&copy; <a target="_blank" href="http://www.martin-philipp.de">Martin Philipp</a> 2015</p>
      </footer>

    </div> <!-- /container -->


  </body>
</html>
