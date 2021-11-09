<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            padding: 0;
            margin: 0;
            text-align: left;
            width: 100%;
            height: 100%;
            display: flex;
            /* overflow: hidden; */
            justify-content: center;
            align-items: center;
            flex-direction:column ;
            font-family: 'Roboto', sans-serif;
        }
        p,span{
            font-size: 13px;
        }
        .all-cont{
            width: 500px;
            height: 90%;
            box-shadow: 0px 0px 5px lightgray;
            padding: 10px;
            background-color: white;
            margin: 20px auto;
        }
        .header{
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }
        .header span{
            display: block;
            color: rgb(197, 195, 195);
        }
        .payments{
            margin: 10px auto;
            width: 100%;
            display: flex;
            justify-content: space-between !important;
        }
        .payments div{
            display: block;
            width: 33%;
            text-align: center;
        }
        .payments p{
            color: rgb(179, 179, 179);
            font-weight: 600;
            font-size: 14px;
        }
        .payments p.label{
            color: black !important;
        }
        .payments #typeofcard{
            font-size: 17px;
            font-weight: 600;
            color: rgb(61, 60, 60);
        }
        .summary{
            padding: 15px 20px;

        }
        .summary .sum-details{
            background:#fbfbfb;
            padding: 9px 10px;
            border-radius: 10px;
            /*text-transform: capitalize;*/

        }
        .summary .sum-details .date-d{

        }
        .summary .sum-details .items-bt{
            border-bottom: 1px solid #f4f4f4;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .summary .sum-details .fin-amount{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        a{
            text-decoration: none;
            font-size: 13px;
        }

        .more-info{
            padding: 5px 20px;
            margin: 7px 10px;
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            display: flex;
            align-items: center;
        }
        .db{
            padding:15px;
            font-size: 13px;

        }
        .footer{
            padding: 20px 20px;


        }
        @media  only screen and (max-width: 700px) {
            .all-cont{
                width: 90%;
            }
        }
    </style>
    <title>Order</title>
</head>
<body style="background-color: orange;padding: 20px">
<section style="background-color: white;padding: 20px" class="all-cont">

    <div class="header">
        <div class="header-contents">
            <h3 style="text-align: center">PDK</h3>
            <h1 style="margin: 0px">{{$subject}}</h1>
        </div>
    </div>
    <div class="summary">
        <div class="sum-details">
            <div class="items">
                {!! $content !!}
            </div>
        </div>
    </div>
    <div class="more-info">
        <p>if you have any questions, contact us at <a href="https://exodus.com">exodus.com</a></p>
    </div>
</section>
</body>
</html>
