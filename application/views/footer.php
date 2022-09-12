<!-- Optional JavaScript -->

    <!-- Font Awesome JS -->
    <script defer src="<?php echo base_url('assets/vendor/js/all.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/bootstrap.min.js'); ?>"></script>
    
    <!--<script src="https://kit.fontawesome.com/9d4ef25b14.js" crossorigin="anonymous"></script>-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->



    <!--<script type="text/javascript" src="<?php echo base_url('assets/vendor/js/loader.js'); ?>"></script> 

    <script type="text/javascript">
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawMainChart); 
    google.charts.setOnLoadCallback(drawodChart); 
    google.charts.setOnLoadCallback(drawphChart); 
    google.charts.setOnLoadCallback(drawsalChart); 
    google.charts.setOnLoadCallback(drawtempChart); 
       
    function drawMainChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Main/csvtojson' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.LineChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 1200, height: 600, title: "Vista general"}); 
    }

    function drawodChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Main/od_data' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.LineChart(document.getElementById('od')); 
      chart.draw(data, {width: 600, height: 300, title: "Oxígeno Disuelto"}); 
    }

    function drawphChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Main/ph_data' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.LineChart(document.getElementById('ph')); 
      chart.draw(data, {width: 600, height: 300, title: "pH", colors: ['red']}); 
    }

    function drawsalChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Main/sal_data' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.LineChart(document.getElementById('sal')); 
      chart.draw(data, {width: 600, height: 300, title: "Salinidad", colors: ['orange']}); 
    }

    function drawtempChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/Main/temp_data' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.LineChart(document.getElementById('temp')); 
      chart.draw(data, {width: 600, height: 300, title: "Temperatura", colors: ['green']}); 
    }
 
    </script> -->
  
  </body>
</html>