<?php
$email = "mehedi@pmail.com"
?>



<p id ="data1"></p>
<p id ="data2"></p>
 
<script>
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "parkinghome_ajax.php?email=<?php echo $email;?>", true);
    ajax.send();
 
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
 
            var html = "";
            for(var a = 0; a < data.length; a++) {
                var firstName = data[a].firstname;
                var lastName = data[a].lastname;
 
                html += "<tr>";
                    html += "<td>" + firstName + "</td>";
                    html += "<td>" + lastName + "</td>";
                html += "</tr>";
            }
            document.getElementById("data1").innerHTML = firstName;
            document.getElementById("data2").innerHTML = lastName;
        }
    };
</script>