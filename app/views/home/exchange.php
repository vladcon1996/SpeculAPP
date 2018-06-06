<!DOCTYPE html>
<html>
<head>
<title> Users </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href="../css/exchangeform.css">
<link rel="stylesheet" type="text/css" href="../css/portofolio.css">

</head>
<body onload="showDivs(4,1)">

<div id="log">
    Signed in as, <br>
    <?php
        if( $_SESSION['username'] ) {
            echo $_SESSION['username'];
        }
    ?>
</div>    

<!-- header -->
<div class="header">
</div>

<!-- nav -->
<nav>

    <!-- echange -->
    <ul class="myPage">
        <li><a href="#how" onclick="showDivs(4,4)">How it works</a></li>
        <li><a class="active" href="#exchange">Exchange</a></li>
        <li><a href="#portofolio" onclick="showDivs(4,2)">Portofolio</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(4,3)">Currency</a>
            <div class="dropdown-content">
            
            </div>
        </li>
        <li><a href="index">Logout</a></li>
    </ul>

    <!-- portofolio -->
    <ul class="myPage">
        <li><a href="#how" onclick="showDivs(4,4)">How it works</a></li>
        <li><a href="#exchange" onclick="showDivs(4,1)">Exchange</a></li>
        <li><a class="active" href="#portofolio">Portofolio</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(4,3)">Currency</a>
            <div class="dropdown-content">
            
            </div>
        </li>
        <li><a href="index">Logout</a></li>
    </ul>

    <!-- currencies -->
    <ul class="myPage">
        <li><a href="#how" onclick="showDivs(4,4)">How it works</a></li>
        <li><a href="#exchange" onclick="showDivs(4,1)">Exchange</a></li>
        <li><a href="#portofolio" onclick="showDivs(4,2)">Portofolio</a></li>
        <li class="dropdown">
            <a class="dropbtn active">Currency</a>
            <div class="dropdown-content">
             
            </div>
        </li>
        <li><a href="index">Logout</a></li>
    </ul>
    
    <!-- How it works -->
    <ul class="myPage">
        <li><a class="active" href="#how">How it works</a></li>
        <li><a href="#exchange" onclick="showDivs(4,1)">Exchange</a></li>
        <li><a href="#portofolio" onclick="showDivs(4,2)">Portofolio</a></li>
        <li class="dropdown">
            <a class="dropbtn" onclick="showDivs(4,3)">Currency</a>
            <div class="dropdown-content">
            
            </div>
        </li>
        <li><a href="index">Logout</a></li>
    </ul>

</nav>

<div>

    <!-- exchange -->
    <div class="row myPage" >
        <div class="side1">
        </div>
        <div class="main1 exchange">
            <form name="exchange" action="javascript:void(0)" method="POST">
                <div class="row2">
                    <div class="col-25">
                        <label for="first"> You have </label>
                    </div>
                    <div class="col-75">
                        <select id="first" name="firstcurrency" size="1" required>
                            <option value="" disabled selected> Select curency </option>
                            <?php
                                if( sizeof($data['currencies']) ) {
                                    foreach( $data['currencies'] as $currency ) {
                                        echo '<option>' . $currency->name . '</option>'; 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-25"></div>
                    <div class="col-75">
                        <input type="number" id="firstamount" name="first" required min="1">
                    </div>
                </div>
                <div class="row2">
                    <div class="col-25">
                        <label for="second"> You get </label>
                    </div>
                    <div class="col-75">
                        <select id="second" name="secondcurrency" size="1" required>
                            <option value="" disabled selected> Select curency </option>
                            <?php
                                if( sizeof($data['currencies']) ) {
                                    foreach( $data['currencies'] as $currency ) {
                                        echo '<option>' . $currency->name . '</option>'; 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-25"></div>
                    <div class="col-75">
                        <input type="text" id ="secondamount" name="second" readonly>
                    </div>
                </div>
                <div class="row2">
                    <input type="submit" value="Trade">
                </div>
                <p>
                <?php
                    if( $data['transactionMessage'] ) {
                        echo $data['transactionMessage'];
                    }
                ?> 
                </p>
            </form>
        </div>
    </div>

    <!-- portofolio -->
    <div class="row myPage">

        <div class="side2">

            <p>Your Money</p><br>
            <table id="walletTable" class="table1">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col" >Currency</th>
                            <th scope="col" >Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row">Total</th>
                            <td> <select name="TotalCurrency" size="1">
                                    <option value="RON">RON</option>
                                    <option value="EURO">EURO</option>
                                    <option value="USD">USD</option>
                                    <option value="GBP">GBP</option>
                                </select> 
                            </td>
                            <td> 1500 </td>
                        </tr>
                    </tfoot>
                </table>
        </div>
        
        <div class="main2">
            <p>Echange History</p><br>
            <table id="historyTable" class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" > Amount sold </th>
                        <th scope="col" > Sold Currency </th>
                        <th scope="col" > Amount bought </th>
                        <th scope="col" > Bought Currency </th>
                        <th scope="col" > Transaction Date </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
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
                        <th scope="row" >Into</th>
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
                        <th scope="row" >Amount</th>
                        <td id="currentValue"> 4.45 </td>
                    </tr>
                    <tr>
                        <th scope="row" >Random Interval (RON) </th>
                        <td id="inter"> 12.1 - 18.6 </td>
                    </tr>
                    <tr>
                        <th scope="row">Change Time (s) </th>
                        <td id="time"> 5 </td>
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

    <!-- how it works -->
    <div class="full myPage">
        <h2>how does it work</h2>
        <p>Sa se creeze un joc Web simuland operatiuni de specula valutara. Administratorul va putea stabili valutele (EUR, USD, GBP etc.), marjele de randomizare a cursului (de exemplu, pentru o moneda intre valori fixe precum 4.10 si 6.50 RON), durata de valabilitate a cursului in secunde, suma de inceput in RON (e.g., 1000 RON), pragul de castig (e.g., peste 2000 RON) si pragul de pierdere (de pilda, sub 100 RON). Jucatorul va avea la dispozitie doua seturi de comenzi: afla curs pentru valuta V (daca precedentul curs generat e mai vechi decat durata de valabilitate setata va fi generat un nou curs, altfel va fi luat in considerare cel vechi) si schimba X unitati din valuta V in W (dupa fiecare operatiune de schimb valutar, se calculeaza valoarea totala a portofoliului in RON; daca aceasta valoare e mai mica decat pragul de pierdere, jucatorul a pierdut jocul, iar daca e mai mare decat cel de castig, atunci a castigat jocul, altfel poate continua cu alte operatiuni). Clasamentul celor mai "bogati" jucatori va fi generat dinamic si ca flux de stiri RSS sau drept raport disponibil in formatele HTML, JSON si PDF. Bonus: generarea de vizualizari edificatoare pentru un grup de persoane, in functie de valuta si sumele vehiculate.</p>
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="../js/chart.js?v=3"></script>
<script src="../js/formvalidation.js?v=7"></script>
<script src="../js/exchangeAjax.js?v=2"></script>
<script src="../js/ajax.js"></script>

</body>
</html>