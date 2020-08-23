<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        
        <script type='text/javascript'>
            $(document).ready(function(){
	            $("#submit_bt").click(function(event){
    		        //フォームが通常の動きをしないように
		            event.preventDefault();
		            //初期化
		            $("#ajax_result").empty();
		
		            sendIsbn();
	            });
            });
 
            function sendIsbn(){
 	            var isbn_val=$("#isbn_id").val();  
 	
	            $.ajax({
		            type: 'POST',
		            url: './SearchBookInformation.php',
		            data:{
			            isbn:isbn_val
		            },
		            dataType: 'html',
	            })
	            .done(function(data, status, jqXHR){
		            $("#ajax_result").html(data);
	            })
	            .fail(function(jqXHR, status, error){
		            $("#ajax_result").html("エラーです");
	            })
	            .always(function(jqXHR, status){
		            console.log(status);
	            });
 
            }
        </script>
    </head>

    <body>
        <div class="pageTitle">
            書籍登録
        </div>

        <div class="resisterBook">
            <form name="resister" method="POST" action="ResisterBook.php">
                <table>
                    <tr><th>ISBN : </th><td><input type="text" name="isbn" id="isbn_id"></td><td><input type="submit" value="検索" id="submit_bt" /></td></tr>
                </table>
                <div id="ajax_result">
                    <table>
                        <tr><th>タイトル : </th><td><input type="text"     name="title"></td></tr>
                        <tr><th>説明 :     </th><td><input type="textarea" name="description"></td></tr>
                        <tr><th>出版社 : </th>
                            <td>
                                <?php
                                    require_once('/var/www/php_libs/class/PublisherCombobox.php');
                                    print((new PublisherCombobox())->createPublisherCombobox());
                                ?>
                            </td>
                        </tr>
                        <tr><th>著者 : </th><td><input type="text" name="authors" id="authors"></td></tr>
                        <tr><th>サムネイル：</th><td><input type="text" name="thumbnail" id="thumbnail"></td></tr>
                        <tr><th>保管場所</th>
                            <td>
                                <?php
                                    require_once('/var/www/php_libs/class/RoomCombobox.php');//FWLOT3
                                    print((new RoomCombobox())->createRoomCombobox());
                                ?>
                            </td>
                        </tr>
                        <tr><th>タグ</th><td><input type="text" name="tags"></td></tr>
                    </table>
                </div>
              <input type="submit" value="登録">
            </form>
        </div>
    </body>
</html>


