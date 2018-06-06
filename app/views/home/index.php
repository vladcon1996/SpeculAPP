<!DOCTYPE html>
<html>
<head>
<title> Home </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href="../css/exchangeform.css">
<link rel="stylesheet" type="text/css" href="../css/portofolio.css">

</head>
<body onload="showDivs(4,1)">

<!-- header -->
<div class="header">
</div>

<!-- nav -->
<nav>
    
    <!-- how it works -->
    <ul class="myPage">
        <li><a class="active">How it works</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(4,2)">Currency</a>
            <div class="dropdown-content">
                
            </div>
        </li>
        <li><a href="#login" onclick="showDivs(4,3)">Login</a></li>
        <li><a href="#register" onclick="showDivs(4,4)">Register</a></li>
    </ul>

    <!-- Currency -->
    <ul class="myPage">
        <li><a class="#login" onclick="showDivs(4,1)">How it works</a></li>
        <li class="dropdown">
            <a class="dropbtn active">Currency</a>
            <div class="dropdown-content">
                
            </div>
        </li>
        <li><a href="#login" onclick="showDivs(4,3)">Login</a></li>
        <li><a href="#register" onclick="showDivs(4,4)">Register</a></li>
    </ul>

    <!-- Login -->
    <ul class="myPage">
        <li><a href="#how" onclick="showDivs(4,1)">How it works</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(4,2)">Currency</a>
            <div class="dropdown-content">
                
            </div>
        </li>
        <li><a class="active" href="#login">Login</a></li>
        <li><a href="#register" onclick="showDivs(4,4)">Register</a></li>
    </ul>

    <!-- Register -->
    <ul class="myPage">
        <li><a href="#how" onclick="showDivs(4,1)">How it works</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(4,2)">Currency</a>
            <div class="dropdown-content">
                
            </div>
        </li>
        <li><a href="#login" onclick="showDivs(4,3)">Login</a></li>
        <li><a href="#register" class="active">Register</a></li>
    </ul>
</nav>

<div>

    <!-- how it works -->
    <div class="full myPage">
        <h2>how does it work</h2>
        <p>Sa se creeze un joc Web simuland operatiuni de specula valutara. Administratorul va putea stabili valutele (EUR, USD, GBP etc.), marjele de randomizare a cursului (de exemplu, pentru o moneda intre valori fixe precum 4.10 si 6.50 RON), durata de valabilitate a cursului in secunde, suma de inceput in RON (e.g., 1000 RON), pragul de castig (e.g., peste 2000 RON) si pragul de pierdere (de pilda, sub 100 RON). Jucatorul va avea la dispozitie doua seturi de comenzi: afla curs pentru valuta V (daca precedentul curs generat e mai vechi decat durata de valabilitate setata va fi generat un nou curs, altfel va fi luat in considerare cel vechi) si schimba X unitati din valuta V in W (dupa fiecare operatiune de schimb valutar, se calculeaza valoarea totala a portofoliului in RON; daca aceasta valoare e mai mica decat pragul de pierdere, jucatorul a pierdut jocul, iar daca e mai mare decat cel de castig, atunci a castigat jocul, altfel poate continua cu alte operatiuni). Clasamentul celor mai "bogati" jucatori va fi generat dinamic si ca flux de stiri RSS sau drept raport disponibil in formatele HTML, JSON si PDF. Bonus: generarea de vizualizari edificatoare pentru un grup de persoane, in functie de valuta si sumele vehiculate.</p>
    </div>

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
                        <td id="time"> 10 </td>
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

    <!-- login -->
    <div class="myPage">
        <div class="full exchange">
            <form name="login" action="javascript:void(0)" onsubmit="getLoginMessage(this)">
                <div class="row2">
                    <div class="col-25">
                        <label for="user"><b>Username</b></label>
                    </div>
                    <div class="col-75">
                        <input id="user" type="text" placeholder="Enter Username" name="username" required>
                    </div>
                </div>
                <div class="row2">
                    <div class="col-25">
                        <label for="pass"><b>Password</b></label>
                    </div>
                    <div class="col-75">
                        <input id="pass" type="password" placeholder="Enter Password" name="password" required>
                    </div>
                </div>
                <input type="submit" value="Login">
                <input type="checkbox" checked="checked"> Remember me
                <p id="loginMessage">
                </p>
            </form>
        </div>
    </div>

    <!-- register -->
    <div class="myPage">
        <div class="full exchange">
            <form name="register" action="javascript:void(0)" method="POST">
                <div class="row2">
                    <div class="col-25">
                        <label for="users"><b>Username</b></label>
                    </div>
                    <div class="col-75">
                        <input id="users" type="text" placeholder="Enter Username" name="user" required>
                    </div>
                </div>
                <div class="row2">
                    <div class="col-25">	
                        <label for="email" ><b>Email</b></label>
                    </div>
                    <div class="col-75">
                        <input id="email" type="text" placeholder="Enter Email" name="email" required>
                    </div>
                </div>
                <div class="row2">
                    <div class="col-25">
                        <label for="passw" ><b>Password</b></label>
                    </div>
                    <div class="col-75">
                        <input id="passw" type="password" placeholder="Enter Password" name="psw" required>
                    </div>
                </div>
                <div class="row2">
                    <div class="col-25">
                        <label for="passwr" ><b>Repeat Password</b></label>
                    </div>
                    <div class="col-75">
                        <input id="passwr" type="password" placeholder="Repeat Password" name="psw-repeat" required>
                    </div>
                </div>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <input type="submit" value="Register">
                <p id="registerMessage">
                </p>
            </form>    
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
<script src="../js/urlinit.js"></script>
<script src="../js/indexAjax.js"></script>
<script src="../js/ajax.js"></script>

</body>
</html>