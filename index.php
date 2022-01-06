<?php
$json = file_get_contents('people.json');
$names = json_decode($json, true);
$messages = explode("\n", file_get_contents('messages.txt'));
$msg = "سوال خود را بپرس!";

$question = "";
if(isset($_POST['question'])){
    $question = $_POST['question'];
}

$en_name = array_rand($names);
if(isset($_POST['person'])){
    $en_name = $_POST['person'];
}

$fa_name = $names[$en_name];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/default.css">
    <title>مشاوره بزرگان</title>
</head>
<body>
<p id="copyright">تهیه شده برای درس کارگاه کامپیوتر،دانشکده کامییوتر، دانشگاه صنعتی شریف</p>
<div id="wrapper">
    <div id="title">
        <span id="label">پرسش:</span>
        <span id="question"><?php echo $question ?></span>
    </div>
    <div id="container">
        <div id="message">
            <p><?php echo $msg ?></p>
        </div>
        <div id="person">
            <div id="person">
                <img src="images/people/<?php echo "$en_name.jpg" ?>"/>
                <p id="person-name"><?php echo $fa_name ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post">
            سوال
            <input type="text" name="question" value="<?php echo $question ?>" maxlength="150" placeholder="..."/>
            را از
            <select name="person">
                <?php
                $json = file_get_contents('person.json');
                $names = json_decode($json,true);
                foreach($names as $name => $fname) {
                    if($name==$en_name) {
                        echo '<option value="' , $name , '" selected="selected">' , $fname , '</option>';
                    } else {
                        echo '<option value="' , $name , '">' , $fname , '</option>';
                    }
                }
                ?>
            </select>
            <input type="submit" value="بپرس"/>
        </form>
    </div>
</div>
</body>
</html>