<script type="text/javascript">

    function ajax_call() {

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", 'test2.php?num1=' +
            document.getElementById('num1').value +
            '&num2=' + document.getElementById('num2').value, true);
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                document.getElementById('result').innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.send(null);
        return false;
    }
</script>

<h2 id="result"></h2>
<form name="form1" action="" onsubmit="return ajax_call()">
    <input type="text" name="num1" id="num1"/> +
    <input type="text" name="num2" id="num2"/>
    <br>
    <input type="submit" name="semajax" value="AJAX"/>
</form>
