<?php
error_reporting(0);
//$_SERVER(__DIR__);
$error = array(
);

if (!empty($_POST))
{
	$name = isset($_POST['name']) ? trim($_POST['name']) : null;
	$lastname = isset($_POST['last_name']) ? trim($_POST['last_name']) : null;
	$email = isset($_POST['email']) ? trim($_POST['email']) : null;
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
	$topic = isset($_POST['topic']) ? trim($_POST['topic']) : null;
	$pay = isset($_POST['pay']) ? trim($_POST['pay']) : null;

	foreach (['name', 'lastname', 'email', 'phone', 'topic', 'pay'] as $key) 
	{
		if(empty($$key))
		{
			$error[$key] = true;
		}
	}

	if ($error)
	{
		$contents = '<?php' . "\n"   
		    . 'return'
		    . var_export([
		        'name' => $name,
		        'lastname' => $lastname,
		        'email' => $email,
		        'topic' => $topic, 
		        'pay' => $pay, 
		    ], true);

		$filename = date('Y-m-d-H-i-s') . '-' . rand(010, 99) . '.txt';

		//mkdir($filename, 0777, true);

		file_put_contents("formfile\\".$filename, $contents);

		header('Location: form.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Форма регистрации</title>
</head>
<body>
	<h1 align="center">Форма регистрации</h1>
	<form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
		<p><input placeholder="Имя" name="name" value="<?= isset($_POST['name']) ? $_POST['name']:''?>" required><?php echo $error['name'] ?></p>

		<p><input placeholder="Фамилия" name="last_name" value="<?= isset($_POST['last_name']) ? $_POST['last_name']:''?>" required><?php echo $error['last_name'] ?></p>

		<p><input placeholder="Эл.адрес" name="email" value="<?= isset($_POST['email']) ? $_POST['email']:''?>" required><?php echo $error['email'] ?></p>

		<p><input placeholder="Телефон" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone']:''?>" required><?php echo $error['phone'] ?></p>
		
		<p>Выберете тематику конференции</p>
		<p>
		<select name="Topic"> 
			<optgroup label="Тема"> 
				<option value="bus" name="bus">Бизнес</option> 
				<option value="tex" name="tex">Технологии</option>
				<option value="RM" name="RM">Реклама и Маркетинг</option>
			</optgroup> 
		</select></p>

		<p>Выберете способ оплаты</p>
		<p>
		<select name="pay"> 
			<optgroup label="Оплата"> 
				<option value="WM" name="WM">WebMoney</option> 
				<option value="ya" name="ya">Yandex.money</option>
				<option value="PP" name="PP">PayPal</option>
				<option value="cc" name="cc">Credit card</option>
			</optgroup> 
		</select>

		<p>Хотите получать рассылку?<input type="checkbox" name="jel"></p>
	<p><input type="submit" value="Отправить"></p>
	</form>

	<form action="admin.php">
		<p><input type="submit" value="Админ"></p>
	</form>

</body>
</html>
