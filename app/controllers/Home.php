<?php

class Home extends Controller {

    protected $user;
    protected $currency;
    protected $wallet;
    protected $transaction;
    protected $dataTemplate;

    public function __construct() {
        $this->user = $this->model('User');
        $this->currency = $this->model('Currency');
        $this->wallet = $this->model('Wallet');
        $this->transaction = $this->model('Transaction');
        $this->dataTemplate = [
            'registerMessage' => '',
            'loginMessage' => '',
            'addCurrencyMessage' => '',
            'currencies' => Currency::get(),
            'transactionMessage' => '',
            'transactions' => [],
            'wallet' => []
        ];
    }

    public function index() {
        session_unset();
        $this->view('home/index');
    }

    public function register() {
        $username = $email = $password = "";
        $arr = $this->dataTemplate;
        if( $_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $this->test_input($_POST["user"]);
            $email = $this->test_input($_POST["email"]);
            $password = $this->test_input($_POST["psw"]);
            if( $password === "" || $username === "" || $email === "" ) {
                $arr['registerMessage'] = 'All fields requiered!';
            } else if( $password !== $this->test_input($_POST["psw-repeat"])) {
                $arr['registerMessage'] = 'Passwords do not match!';
            } else if( User::where('username',$username)->count() !== 0 ) {
                $arr['registerMessage'] = 'Username already exists!';
            } else {
                $this->user->create([
                    'username' => $username,
                    'email' => $email,
                    'password' => $password
                ]);
                echo User::select('id')->where('username',$username)->get()[0]->id;
                $this->wallet->create([
                    'userId' => User::select('id')->where('username',$username)->get()[0]->id,
                    'currencyId' => 6,
                    'amount' => 1000
                ]);
                $arr['registerMessage'] = 'Registration successful!';
            }
            $this->view('home/index',$arr);
        }
    }

    public function login() {
        $username = $password = "";
        $arr = $this->dataTemplate;
        if( $_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $this->test_input($_POST["username"]);
            $password = $this->test_input($_POST["password"]);
            if( $password === "" || $username === "" ) {
                $arr['loginMessage'] = 'All fields requiered!';
                $this->view('home/index',$arr);
            } else {
                $verif = User::where('username','=',$username)->where('password','=',$password)->get();
                if( sizeof($verif) === 0 ) {
                    $arr['loginMessage'] = 'Username or password is invalid !';
                    $this->view('home/index',$arr);
                } else {
                    if( session_start() ) {
                        $_SESSION['username'] = $username;
                        if( $verif[0]->is_admin === 1 ) {
                            $this->view('home/admin');   
                        } else {
                            $arr['transactions'] = $this->transaction->getTransactions(User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id);
                            $arr['wallet'] = $this->wallet->getWallet(User::select('id')->where('username','=',$_SESSION['username'])->get('id')[0]->id);
                            $this->view('home/exchange',$arr);
                        }
                    }
                }
            }
        }
    }

    public function addCurrency() {
        session_start();
        if( $_SESSION['username'] && 
            User::where('username','=',$_SESSION['username'])->first()->is_admin ) {
                $currencyName = "";
                $intervalBg = $intervalEnd = $validityTime = 0;
                if($_SERVER["REQUEST_METHOD"] == "POST" ) {
                    $currencyName = $this->test_input($_POST["currencyName"]);
                    $intervalBg = intval($this->test_input($_POST["intervalbg"]));
                    $intervalEnd = intval($this->test_input($_POST["intervalend"]));
                    $validityTime = intval($this->test_input($_POST["exchangevaliditytime"]));
                    if( !$currencyName || !$intervalBg || !$intervalEnd || !$validityTime ) {
                        echo 'All fields required!';
                    } else if( $intervalBg >= $intervalEnd ) {
                        echo 'Invalid interval : ' . $intervalBg . ' > ' . $intervalEnd . ' !';
                    } else if(  Currency::where('name',$currencyName)->count() !== 0 ) {
                        echo 'Currency ' . $currencyName .' already exists !';
                    } else {
                        Currency::create([
                            'name' => $currencyName,
                            'intervalbg' => $intervalBg,
                            'intervalend' => $intervalEnd,
                            'validitytime' => $validityTime
                        ]);
                        echo 'Succesful add!';
                    }
                }
        }
    }

    public function makeTransaction() {
        session_start();
        if( $_SESSION['username'] && 
            !User::where('username','=',$_SESSION['username'])->first()->is_admin ) {
                $firstcurrency = $secondcurrency = "";
                $firstamount = 0;
                $arr = $this->dataTemplate;
                if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                    $firstcurrency = $this->test_input($_POST["firstcurrency"]);
                    $secondcurrency = $this->test_input($_POST["secondcurrency"]);
                    $firstamount = intval($this->test_input($_POST["first"]));
                    if( !$firstcurrency || !$secondcurrency || !$firstamount ) {
                        $arr['transactionMessage'] = 'All fields required!';
        
                    } else if( !Currency::where('name','=',$firstcurrency)->count() ) {
                        echo '1';
                        $arr['transactionMessage'] = 'Currency ' . $firstcurrency . ' does not exist !';
                    } else if ( !Currency::where('name','=',$secondcurrency)->count() ) {
                        echo '2';
                        $arr['transactionMessage'] = 'Currency ' . $secondcurrency . ' does not exist !';
                    } else {
                        echo '3';
                        if(Wallet::where('userId','=',User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id)->where('currencyId','=',Currency::select('id')->where('name','=',$firstcurrency)->get()[0]->id)->count() ) {
                            echo '4';
                            $tuple = Wallet::where('userId','=',User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id)->where('currencyId','=',Currency::select('id')->where('name','=',$firstcurrency)->get()[0]->id)->first();
                            $walletamount = $tuple->amount;
                            if( $walletamount < $firstamount ) {
                                echo '5';
                                $arr['transactionMessage'] = 'You only have ' . $walletamount . ' ' . $firstcurrency . ' !';
                            } else {
                                echo '6';
                                if ($walletamount == $firstamount ) {
                                    echo '7';
                                    $tuple->delete();
                                } else {
                                    echo '8';
                                    $tuple->amount -= $firstamount;
                                    $tuple->save();
                                }
                                if( Wallet::where('userId','=',User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id)->where('currencyId','=',Currency::select('id')->where('name','=',$secondcurrency)->get()[0]->id)->count() ) {
                                    echo '9';
                                    $tuple2 = Wallet::where('userId','=',User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id)->where('currencyId','=',Currency::select('id')->where('name','=',$secondcurrency)->get()[0]->id)->first();
                                    $tuple2->amount += 0.3*$firstamount; 
                                    $tuple2->save();
                                } else {
                                    echo '\'10\'';
                                    Wallet::create([
                                        'userId' => User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id,
                                        'currencyId' => Currency::select('id')->where('name','=',$secondcurrency)->get()[0]->id,
                                        'amount' => 0.3 * $firstamount
                                    ]);
                                }
                                $this->transaction->create([
                                    'userId' => User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id,
                                    'soldamount' => $firstamount,
                                    'boughtamount' => 0.3 * $firstamount,
                                    'soldcurrencyId' => Currency::select('id')->where('name','=',$firstcurrency)->get()[0]->id,
                                    'boughtcurrencyId' => Currency::select('id')->where('name','=',$secondcurrency)->get()[0]->id
                                ]);
                                $boughtamount = 0.3 * $firstamount;
                                $arr['transactionMessage'] = 'Transaction succesfull . You obtained ' . $boughtamount . ' ' . $secondcurrency . ' !';
                            }
                        } else {
                            echo '0';
                            $arr['transactionMessage'] = 'You do not have any ' . $firstcurrency . ' !';
                        }
                    }
                    $arr['transactions'] = $this->transaction->getTransactions(User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id);
                    $arr['wallet'] = $this->wallet->getWallet(User::select('id')->where('username','=',$_SESSION['username'])->get()[0]->id);
                    $this->view('home/exchange',$arr);  
                }
            }
    }

    

    protected function test_input( $data ) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}