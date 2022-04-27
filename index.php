<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>District Demo</title>
</head>
<body>
    <select name="province" id="province" class="form-control" onchange="changeDistrict(this.value)">
        <option value="" selected>-- Select Your Province --</option>
        <option value="1">Province no. 1</option>
        <Province value="2">Province no. 1</option>
        <option value="3">Bagmati Pradesh</option>
        <option value="4">Gandaki Pradesh</option>
        <option value="5">Province no. 5</option>
        <option value="6">Karnali Pradesh</option>
        <option value="7">Sudurpashchim Pradesh</option>
    </select>
    <select name="districts" id="districts" class="form-control notallowed" onchange="changeMun(this.value)" disabled>
        <option value="" selected>-- Select Your District --</option>
    </select>
    <select name="municipality" id="municipality" class="form-control notallowed" disabled>
        <option value="" selected>-- Select Your Municipality --</option>
    </select>

</body>
<script>
    function changeDistrict(province){
        document.getElementById('districts').innerHTML = '<option value="" selected>-- Select Your District --</option>';
        document.getElementById('municipality').innerHTML = '<option value="" selected>-- Select Your Municipality --</option>';
        document.querySelector('#districts').classList.remove('notallowed');
        var mun=document.querySelector('#municipality');
        if(!mun.classList.contains('notallowed')){
            mun.classList.add('notallowed');
            mun.disabled=true;
        }
        document.querySelector('#districts').disabled=false;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('districts').innerHTML += this.responseText;
            }
        }
        xmlhttp.open("GET", "getDistrict.php?province="+province, true);
        xmlhttp.send();
    }
    function changeMun(district){
        document.getElementById('municipality').innerHTML = '<option value="" selected>-- Select Your Municipality --</option>';
        document.querySelector('#municipality').classList.remove('notallowed');
        document.querySelector('#municipality').disabled=false;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('municipality').innerHTML += this.responseText;
            }
        }
        xmlhttp.open("GET", "getMunicipality.php?district="+district, true);
        xmlhttp.send();
    }
</script>
</html>