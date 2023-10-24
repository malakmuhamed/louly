<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="productDet.css">
    
    <title>cross bag</title>
</head>

<body>
    
   
        <div class="left-split">
            <div class="row">
                <div class="column">
                    <img class="demo cursor" src="rounded.JPG" style="width:50%">
                    <img class="demo cursor" src="handbag.jpg" style="width:50%">
                    <img src="waistbag.jpg" style="width:50%">
                </div>
                <div class="column2">
                    <img src="rounded.JPG" width="175%" height="80%">
                </div>
            </div>
            <div class="container">
                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                <img id="expandedImg" style="width:100%">
                <div id="imgtext"></div>
            </div>
        </div>
        <div class="right-split">
            <div class="centered">
               <p><a href="homee.php"> Home&nbsp</a> /LOULY  CRYSTAL  CROSSBAG  NEW!</p>
                <br>
                <div class="box" style="background-color:rgb(174, 168, 187 )">
                    <p>NEW</p>
                </div>
                <div class="heading">
                    <p>LOULY  CRYSTAL  CROSSBAG  NEW!</p>
                </div>
                <div class="price">
                    <p>£ 560</p>
                </div>
               
                <div class="header">
                    <p>order now from the many trendy colors of this crystal crossbag </p>
                </div>
                <div class="star-review">
                    <div class="fa fa-star checked"></div>
                    <div class="fa fa-star checked"></div>
                    <div class="fa fa-star checked"></div>
                    <div class="fa fa-star"></div>
                    <div class="fa fa-star"></div>
                    <br><br>
                    <div>
                    <a class="review" href=#>4 Reviews</a>
                    </div>
                </div>
                
                            <div class="counter">
                                <button id="minus" onclick=" count(this.id)">-</button>
                                <p id="value">1 </p>
                                <button id="add" onclick="count(this.id)">+</button>
                            </div>
                            <button class="addtocart">
                                <div class="pretext">
                                    <div class="addtocartclass">ADD TO CART</div>
                                    <div class="pretext done">
                                        <div class="posttext"> ADDED</div>
                                    </div>
                            </button>
            </div>
                
                    </div>
                </div>
            </div>
           
        <script>
            const button = document.querySelector(".addtocart");
            const done = document.querySelector(".done");
            console.log(button);
            let added = false;
            button.addEventListener('click', () => {
                if (added) {
                    done.style.transform = "translate(-110%) skew(-40deg)";
                    added = false;
                }
                else {
                    done.style.transform = "translate(0px)";
                    added = true;
                }
            });

            function count(meen) {
                let minus = document.getElementById("minus");
                let val = document.getElementById("value");
                let add = document.getElementById("add");
                let countNum = parseInt(val.innerHTML);
                if (meen == 'minus') {
                    if (countNum < 1) {
                        let valuee = countNum - 1;
                        val.innerHTML = valuee;
                    }
                }
                if (meen == 'add') {
                    let valuee = countNum + 1;
                    val.innerHTML = valuee;
                }
            }

        </script>
</body>

</html>