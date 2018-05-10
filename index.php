<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Compound Interest </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 clearfix">
                    <h4 class="display-4"> Compounded Continuous </h4>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Investment Amount </span>
                        </div>
                        <div>
                            <input type="number" class="form-control" step="0.01" id="principal" />
                        </div>
                        <div>
                            <p><i> Amount to be invest regularly. </i></p>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="compound_period"> Compounding Periods </label>
                        </div>
                        <select name="compound_period" id="compound_period" class="custom-select">
                            <option value="365"> Daily </option>
                            <option value="52"> Weekly </option>
                            <option value="12" selected> Monthly </option>
                            <option value="4"> Quarterly </option>
                            <option value="2"> Semi-Annually </option>
                            <option value="1"> Annually </option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Annual Interest % </span>
                        </div>
                        <div>
                            <input type="number" class="form-control input-xs" step="0.01" id="interest" >
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Terms ( Years of investment ) </span>
                        </div>
                        <div>
                            <input type="number" class="form-control" id="terms" >
                        </div>
                    </div>
                    <div class="clearfix">
                        <button type="button" class="btn btn-outline-primary btn-sm float-right" id="calculate">Caluclate</button>
                    </div>
                    
                    <div class="text-info p-res"> 
                        
                    </div>
                    <span> <b class="text-success sp-amount"></b>  </span>
                </div>
            </div>
        </div>


        <script>
            document.querySelector('#calculate').addEventListener('click', function(e){
                let compound_period = document.querySelector('#compound_period').value
                let present_value = document.querySelector('#principal').value
                let interest_rate = document.querySelector('#interest').value / 100
                let terms = document.querySelector('#terms').value
                calculate(compound_period, present_value, interest_rate, terms)
            })
            
            function calculate(period, amount, interest_rate, year ){
                console.log(period)
                let fv = 0;
                for( let i = 0; i < year; i++ ){
                    let interest = 0
                    let year_value = (amount * period)
                    if( fv > 0 ){
                        interest = (fv + year_value) * interest_rate
                        fv += (year_value + interest)
                    }else{
                        interest = year_value * interest_rate
                        fv += (year_value + interest)
                    }       
                }
                let termsTxt = ''
                switch ( parseInt(period)) {
                    case 365:
                        termsTxt = 'Daily'
                        break;
                    case 52:
                        termsTxt = 'Weekly'
                    break;
                    case 12:
                        termsTxt = 'Monthly'
                    break;
                    case 4:
                        termsTxt = 'Quarterly'
                    break;
                
                    default:
                        termsTxt = 'Annualy'
                        break;
                }
                document.querySelector('.p-res').innerHTML ="The future value of your money if you invest regulary after "+ year +" years and invest "+ termsTxt +" compounded by "+interest_rate+"% is"
                document.querySelector('.sp-amount').innerHTML = 'P ' + numberWithCommas(fv)
            }
            function numberWithCommas(n) {
                n = n.toFixed(2)
                var parts=n.toString().split(".");
                return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>
