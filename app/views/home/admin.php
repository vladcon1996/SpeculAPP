<!DOCTYPE html>
<html>
<head>
<title> Admins </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href="../css/exchangeform.css">
<link rel="stylesheet" type="text/css" href="../css/portofolio.css">

</head>
<body onload="showDivs(2,1)">

<div id="log">
    Signed in as, <br>
    <?php
        if( $_SESSION['username'] ) {
            echo $_SESSION['username'];
        }
    ?>
</div>    

<div id="adm">
    Administrator
</div>

<!-- header -->
<div class="header">
</div>

<!-- nav -->
<nav>

    <!-- add currency -->
    <ul class="myPage">
        <li><a class="active" href="#add">Game</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(2,2)">Currency</a>
            <div class="dropdown-content">
                
            </div>
        </li>
        <li><a class="nosld" href="index">Logout</a></li>
    </ul>

    <!-- currencies -->
    <ul class="myPage">
        <li><a href="#add" onclick="showDivs(2,1)">Game</a></li>
        <li class="dropdown">
            <a class="dropbtn active">Currency</a>
            <div class="dropdown-content">
                
            </div>
        </li>
        <li><a class="nosld" href="index">Logout</a></li>
    </ul>

</nav>

<div>

    <!-- add currency -->
    <div class="full exchange myPage">
        <form name="newCurrency" action="javascript:void(0)" method="POST">
            <div class="row2">
                <div class="col-25">
                    <label for="new">Currency name:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="new" name="currencyName" required pattern="[A-Z]+">
                </div>
            </div>
            <div class="row2">
                <div class="col-25">
                    <label for="interval"> Interval: </label>
                </div>
                <div class="col-75">
                    <input type="number" id="interval" name="intervalbg" required min="0">
                </div>
                <div class="col-25"></div>
                <div class="col-75">
                    <input type="number" id="interval2" name="intervalend" required min="0">
                </div>
            </div>
            <div class="row2">
                <div class="col-25">
                    <label for="valTime"> Echange validity time (seconds) </label>
                </div>
                <div class="col-75">
                    <input type="number" id="valTime" name="exchangevaliditytime" required min="1">
                </div>
            </div>
            <div class="row2">
                <input type="submit" value="Add Currency">
            </div>

            <p id="addCurrencyMessage"></p>
        </form>
        
        <form name="setLimits" action="javascript:void(0)" method="POST">
            <div class="row2">
                <div class="col-25">
                    <label for="inf">
                        Losing limit (RON): 
                    </label>
                </div>
                <div class="col-75">
                    <input type="number" id="inf" name="lose" required min="100" max="999">
                </div>
            </div>
            <div class="row2">
                <div class="col-25">
                    <label for="sup"> Winning limit (RON): </label>
                </div>
                <div class="col-75">
                    <input type="number" id="sup" name="win" required min="2000">
                </div>
            </div>
            <div class="row2">
                <input type="submit" value="Set win/lose limits">
            </div>
        </form>
    </div>

    <!-- currencies -->
    <div class="row myPage">
        
        <div class="side2">
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" id="Current">EURO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Into</th>
                        <td>
                        <select id="otherValue" name="OtherCurrencies" size="1">
                            <option value="RON">RON</option>
                            <option value="EURO">EURO</option>
                            <option value="USD">USD</option>
                            <option value="GBP">GBP</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Amount</th>
                        <td id="currentValue"> 4.45 </td>
                    </tr>
                    <tr>
                        <th scope="row">Random Interval (RON) </th>
                        <td id="inter"> 4.1 - 6.6 </td>
                    </tr>
                    <tr>
                        <th scope="row">Change Time (s) </th>
                        <td id="time"> 3 </td>
                    </tr>
                </tbody>
            </table>
        </div>
            
        <div class="main2">
            <div id="chartContainer"></div><br>
            <!-- <button id="addDataPoint" onclick="addPoint()">Add Data Point</button>  
            <button id="updateDataPoint" onclick="updatePoint()">Update Data Point</button>   -->
        </div>
    </div>


</div>




<!-- footer -->
<div class="footer">
  <div class="side">
    <ul>
        <li>Contact</li>
        <li>Email</li>
        <li>mihai.strugari@yahoo.com</li>
        <li>vlad.condurache@gmail.com</li>
    </ul>
  </div>
  <div class="side main">
    <ul>
        <li>Product</li>
        <li>About</li>
        <li>Logistics</li>
        <li>Pricing</li>
        <li>Assets tracking</li>
    </ul>
  </div>
</div>

<script src="../js/slider.js?v=2"></script>
<script src="../js/formvalidation.js?v=7"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="../js/chart.js?v=3"></script>
<script src="../js/adminAjax.js?v=1"></script>
<script src="../js/ajax.js"></script>

</body>
</html>