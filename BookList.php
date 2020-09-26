<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>書籍管理</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        
        <script type='text/javascript'>
            $(document).ready(function(){
	            $("#search_bt").click(function(event){
    		        //フォームが通常の動きをしないように
		            event.preventDefault();
		            //初期化
		            $("#ajax_result").empty();

		            searchBook();
	            });
            });

            function searchBook(){
              console.warn("SearchBook");
               var title_val=$("#title").val();
               var publisher_val=$("#publisherName").val();
               var room_val=$("#room_id").val();
               var tags_val=$("#tags").val();
 	
	            $.ajax({
		            type: 'POST',
		            url: './FilterBook.php',  // FIXME ここは書籍の絞り込みスクリプトに変更する
		            data:{
                  title:title_val,
                  publisherId:publisher_val,
                  roomId:room_val,
                  tags:tags_val
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
            書籍一覧
        </div>
        
        <div class="searchPublisher">
            <form name="search" method="POST" action="BookListController.php">
              <table>
                <tr>
                  <td>タイトル</td><td>出版社</td><td>保管場所</td><td>タグ</td>
                </tr>
                <tr>
                  <td><input type="text" name="title" id="title"></td>
                  <td>
                    <?php
                      require_once('/var/www/php_libs/class/PublisherCombobox.php');
                      print((new PublisherCombobox())->createPublisherCombobox());
                    ?>
                  </td>
                  <td>
                    <?php
                      require_once('/var/www/php_libs/class/RoomCombobox.php');
                      print((new RoomCombobox())->createRoomCombobox());
                    ?>
                  </td>
                  <td><input type="text" name="tags" id="tags"></td>
                </tr>
              </table>
              <input type="submit" value="検索" id="search_bt">

        </div>
        <br>
        <div class="list">
            <div class="listTitle">
                書籍一覧<br>
            </div>
            <div class="bookList">
              <div id="ajax_result">
                <?php
                    define('_ROOT_DIR',__DIR__.'/');
                    require_once('/var/www/php_libs/init.php');
                    $bookList = new BookListController();
                    $bookList->listBookAll();
                ?>
              </div>
            </div>
        </div>
        </form>
    </body>
</html>
