<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
    <title>Hello, world!</title>    
    
  </head>
  <body>
    <p class="display-4 text-center">美食地圖</p>
    <div class="container">
        <!-- .table-responsive  響應式表格  -->
        <div class="table-responsive">
            <!-- .table-sm 儲存格 padding 縮減一半的方式讓表格更加精簡 -->
            <table class="table table-sm table-striped table-bordered table-hover ">
                <caption>List of foods...</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>編號</th>
                        <th>ID</th>
                        <th>店名</th>
                        <th>信用卡</th>
                        <th>縣市</th>
                        <th>地址</th>
                    </tr>
                </thead>
                <tbody id="foodbody">
                    
                    

                </tbody>
            </table>   
        </div>
      
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $.ajax({
                type: "GET",
                // url: "./json/food.php",
                url:"http://192.168.10.40/webdesign/json/food.php",
                dataType: "json",
                success: show,
                error: function(){
                    alert("error");
                }
            });

        }); 
        function show(data){
            // console.log(data);
            var $CreditCard
            for(i=0; i<data.length; i++){
                if(data[i].CreditCard=="True"){
                    $CreditCard='<input type ="checkbox" checked="" disabled>'
                }else{
                    $CreditCard="";
                }
                num = i+1;
                if(data[i].CreditCard=="True"){
                    strHTML ='<tr class="table-primary"><td>'+num+'</td><td>'+data[i].ID+'</td><td>'+data[i].Name+'</td><td>'+$CreditCard+'</td><td>'+data[i].City+data[i].Town+'</td><td>'+data[i].Address+'</td></tr>'; 
                }else{
                    strHTML ='<tr><td>'+num+'</td><td>'+data[i].ID+'</td><td>'+data[i].Name+'</td><td>'+$CreditCard+'</td><td>'+data[i].City+data[i].Town+'</td><td>'+data[i].Address+'</td></tr>'; 
                }
                              
                

                $("#foodbody").append(strHTML);
                }
        }
    </script>
  </body>
</html>