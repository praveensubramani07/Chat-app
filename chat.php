<?php
$servername = "localhost"; 
$username = "id19678285_root"; 
$password = "_P~47[z]\KoyCL57";
$db="id19678285_message";
$conn = new mysqli($servername,$username, $password,$db);

if(isset($_POST['logout'])){

unset($_COOKIE["groupid"]);
setcookie("groupid", "", time() - 3600);
}

    if (!isset($_COOKIE['groupid'])) {
 header("Location: indeex.php");
}

?>
<head>

    <style>
html, body {
    height: 100%; width: 100%; margin: 0; padding: 0; font-family: sans-serif; background: #1c1e22; 
    
}
body
 { display: flex; align-items: center; justify-content: center; flex-direction: column; 
     
 } ::-webkit-scrollbar
 {
     width: 4px;
     }
    ::-webkit-scrollbar-thumb
 { 
     background-color: #4c4c6a; border-radius: 2px;
    }
 .chatbox { 
     width: 300px; height: 400px; max-height: 400px; display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 0 4px rgba(0,0,0,.14),0 4px 8px rgba(0,0,0,.28);
     }
   .chat-window { flex: auto; max-height: calc(100% ); background: #2f323b; overflow: auto; 
       
   }
   .chat-input 
  {
      flex: 0 0 auto; height: 60px; background: #40434e; border-top: 1px solid #2671ff; box-shadow: 0 0 4px rgba(0,0,0,.14),0 4px 8px rgba(0,0,0,.28);
      }
      .chat-input input { height: 59px; line-height: 60px; outline: 0 none; border: none; width: calc(100% - 60px); color: white; text-indent: 10px; font-size: 12pt; padding: 0; background: #40434e;
      }
      .chat-input button { float: right; outline: 0 none; border: none; background: rgba(255,255,255,.25); height: 40px; width: 40px; border-radius: 50%; padding: 2px 0 0 0; margin: 10px; transition: all 0.15s ease-in-out; 
          
      }
      .chat-input input[good] + button { box-shadow: 0 0 2px rgba(0,0,0,.12),0 2px 4px rgba(0,0,0,.24); background: #2671ff; 
          
      }
      .chat-input input[good] + button:hover { box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
      } .chat-input input[good] + button path { fill: white; 
          
      } 
      .msg-container { 
          position: relative; display: inline-block; width: 100%; margin: 0 0 10px 0; padding: 0; 
          
      } 
      .msg-box {
          position:relative;
          display: flex; background: #5b5e6c; padding: 10px 10px 0 10px; border-radius: 0 6px 6px 0; max-width: 80%; width: auto; float: left; box-shadow: 0 0 2px rgba(0,0,0,.12),0 2px 4px rgba(0,0,0,.24);
      }
      .user-img { display: inline-block; border-radius: 50%; height: 40px; width: 40px; background: #2671ff; margin: 0 10px 10px 0;
      }
      .flr { flex: 1 0 auto; display: flex; flex-direction: column; width: calc(100% - 50px);
      }
      .messages { 
          flex: 1 0 auto; 
          
      }
      .msg { 
          display: block; font-size: 11pt; line-height: 13pt; color: rgba(255,255,255,.7); margin: 0 0 4px 0; 
          
      }
      .msg:first-of-type { margin-top: 8px;
      } 
      .timestamp { 
          color: rgba(0,0,0,.38); font-size: 8pt; margin-bottom: 10px;
          }
        .username { 
              margin-right: 3px;
              } 
        .posttime { 
            margin-left: 3px; }
        .msg-self .msg-box { border-radius: 6px 0 0 6px; background: #2671ff; float: right;
        }
        .msg-self .user-img { margin: 0 0 10px 10px;
        } .msg-self .msg 
    { text-align: right; } .msg-self .timestamp { 
        text-align: |right; }
.header {
    text-decoration:none;
    color:white;
    position:relative;
    background:grey;
    padding:10px;
    
}
.header .logout{
    float:right;
}

.arrow{
    width:30px;
    float:right;
    position:fixed;
}
.darrow{
    float:right;
    position:relative;
margin-right:20px;
    padding-right:15px;
}
    </style>
  <script>
function bottom() {
    document.getElementById( 'bottom' ).scrollIntoView();
    window.setTimeout( function () { top(); }, 10000 );
};

bottom();
  </script>  
</head>
<body>
<section class="chatbox"> 
<section class="chat-window"> 
<div class="header">
    
<?php echo $_COOKIE["groupid"]; ?>

<form method="post" action="" class="logout">
    <input type="submit" value="leave" name="logout">
</form>
</div>
<article class="msg-container msg-remote" id="msg-0"> 

<div class="darrow">
 <a href="#bottom">
         <img class="arrow" src="arrow1.png">
 </a>
 </div>
<?php
$groupid=$_COOKIE["groupid"];
$sql2="SELECT * FROM  messaging";
$res2=mysqli_query($conn,$sql2);


$count= mysqli_num_rows($res2);
if( $count > 0)
{
while($row=mysqli_fetch_assoc($res2))
{
   
?>
<?php 
 if(($row['group']==$groupid)){
    ?>
    
 
<div class="msg-box"> 
<div class="flr"> 
<div class="messages">
 <p class="msg" id="msg-0">

<?php 

echo $row['message']; 

?>

</p>
 </div> 
</div>
<span class="timestamp">


<span class="username">unknown
</span>&bull;
<span class="posttime">!</span>
</span>

 </div> 

<?php
}
}
}
?>


 </article> 

 </article>
<h6 id="bottom"></h6>

 </section> 
</body>