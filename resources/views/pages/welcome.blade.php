@extends('main')

@section('ajax')
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getperson.blade.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
@endsection

@section('content')
<div class="spacing-top"><h2>Deel je verlanglijst of Sinterklaas gedicht!   <a href="/blog">Klik hier om te beginnen</a></h2></div>           
<img class="image" src="img/sinterklaas.jpg"/>   


<div>
<h4>Ajax Test: Family Guy</h4>
<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Peter Griffin</option>
  <option value="2">Lois Griffin</option>
  <option value="3">Joseph Swanson</option>
  <option value="4">Glenn Quagmire</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>
</div>
<hr>


<h4>Ajax Test 2: Weergave gedichten</h4>

<div id="comments">
<?php
    
$con = mysqli_connect('localhost','root','','sinterklaas');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"sinterklaas");
$sql="SELECT * FROM comments LIMIT 2";
$result = mysqli_query($con,$sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo $row['name'];
            echo "<br>";
            echo $row['comment'];
            echo "</p>";
            
        }
    } else {
        echo "There are no comments!";
    }
?>

</div>

<button>Show 2 more Comments</button>

@endsection

@section('ajax2')
<script>
    $(document).ready(function(){
        var commentCount = 2;
        $("button").click(function(){
            commentCount = commentCount + 2;
            $("#comments").load("load-comments.blade.php", {
                commentNewCount: commentCount
            });
        });
    });
</script>
@endsection